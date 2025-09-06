<template>
    <ModalWrap v-if="modal?.show" @click.self="modal.show = false" :methods="methods">
        <div :open="modal?.show" class="modal-dialog">
            <div class="modal-content">
                <h2 class="modal-title">Выберите резюме для отклика</h2>

                <div class="resumes-list">
                    <div v-for="resume in resumes" :key="resume.id" class="resume-item"
                        :class="{ 'resume-item--selected': selectedResume?.id === resume.id }"
                        @click="selectResume(resume)">
                        <div class="resume-header">
                            <h3 class="resume-title">{{ resume.title }}</h3>
                            <span class="resume-status" :class="'status-' + resume.status">
                                {{ getStatusLabel(resume.status) }}
                            </span>
                        </div>

                        <p class="resume-description">{{ resume.description }}</p>

                        <div v-if="resume.file" class="resume-file">
                            <a :href="UPLOADS_PATH + resume.file" target="_blank" class="file-link" @click.stop>
                                📎 {{ resume.file }}
                            </a>
                        </div>
                    </div>
                </div>

                <div v-if="!resumes || resumes.length === 0" class="empty-resumes">
                    <p class="empty-text">У вас нет резюме</p>
                    <a class="modal-button" :href="endpoints.resume.edit">
                        Создать резюме
                    </a>
                </div>

                <div v-if="resumes && resumes.length > 0" class="modal-actions">
                    <button class="confirm-button" :disabled="!selectedResume" @click="confirmSelection">
                        Подтвердить
                    </button>
                    <button class="cancel-button" @click="modal.show = false">
                        Отмена
                    </button>
                </div>
            </div>
        </div>
    </ModalWrap>
</template>

<script setup>
import { endpoints } from '@storage/endpoints';
import ModalWrap from '@components/ModalWrap';
import notify from '@composables/notifyService';
import { UPLOADS_PATH } from '@storage/constants';
import { onMounted, ref } from 'vue';

const { modal, methods } = defineProps(['modal', 'methods']);
const selectedResume = ref(null);

const resumes = ref([]);

const selectResume = (resume) => {
    selectedResume.value = resume;
};

const confirmSelection = async () => {
    if (selectedResume.value) {
        methods.applyForVacation(selectedResume.value.id);
        modal.show = false;
        return true;
    }
};

const getStatusLabel = (status) => {
    const statusLabels = {
        draft: 'Черновик',
        published: 'Опубликовано',
        archived: 'В архиве'
    };
    return statusLabels[status] || status;
};

onMounted(async () => {
    const url = endpoints.resume.get;

    try {
        const response = await axios.post(url);

        if (response.status == 200) {
            resumes.value = response.data.data ?? [];

            return true;
        }

        notify.error(error?.response?.data?.message ?? 'Произошла ошибка при получении ваших резюме!');

        return false;
    } catch (error) {
        notify.error(error?.response?.data?.message ?? 'Произошла ошибка при получении ваших резюме!');

        return false;
    }
})
</script>
<style></style>