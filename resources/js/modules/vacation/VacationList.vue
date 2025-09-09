<template>
    <div class="vacation-list">
        <div class="list-header">
            <h2 class="list-title">Вакансии</h2>
            <button v-if="userRole === 'hr'" class="add-button">
                <a :href="endpoints.vacation.edit">
                    Создать вакансию
                </a>
            </button>
        </div>

        <div class="vacations-rows">
            <div v-for="vacation in vacations?.data" :key="vacation.id" class="vacation-card">
                <div class="card-header">
                    <h3 class="vacation-title">{{ vacation.title }}</h3>
                    <div class="card-actions">
                        <a v-if="['hr', 'admin'].includes(userRole)" :href="endpoints.vacation.edit + vacation.id"
                            class="edit-btn" title="Редактировать">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="vacation-details">
                    <div class="detail-item">
                        <span class="detail-label">Сложность:</span>
                        <span class="detail-value difficulty" :class="'difficulty-' + vacation.difficulty">
                            {{ getDifficultyLabel(vacation.difficulty) }}
                        </span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Вопросов:</span>
                        <span class="detail-value">{{ vacation.question_count }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Статус:</span>
                        <span class="detail-value status" :class="'status-' + vacation.status">
                            {{ getStatusLabel(vacation.status) }}
                        </span>
                    </div>

                    <div v-if="vacation.speach_kit" class="detail-item">
                        <span class="detail-label">Речевой набор:</span>
                        <span class="detail-value">{{ vacation.speach_kit }}</span>
                    </div>
                </div>

                <div v-if="vacation.file" class="file-section">
                    <span class="file-label">Файл:</span>
                    <a :href="UPLOADS_PATH + vacation.file" target="_blank" class="file-link">
                        📎 Скачать
                    </a>
                </div>

                <div v-if="userRole === 'hunter'" class="action-section">
                    <button @click="toggleApplyModal(vacation)" class="apply-btn">
                        🎯 Откликнуться
                    </button>
                </div>

                <div v-if="userRole === 'hr' && vacation.user_id === auth.user_id" class="action-section">
                    <button @click="applyAiProcess(vacation.id)" class="apply-btn">
                        🎯 Обработать ИИ
                    </button>
                </div>

                <div v-if="userRole === 'guest'" class="guest-message">
                    <p class="text-sm text-gray-500">
                        🔒 Войдите в систему, чтобы откликнуться на вакансию
                    </p>
                </div>
            </div>
        </div>

        <div v-if="vacations?.data?.length === 0" class="empty-state">
            <div class="empty-icon">📋</div>
            <p class="empty-text">Доступных вакансий пока нет!</p>
        </div>
    </div>
    <ApplyModal v-if="vacations?.data?.length > 0" :modal="modals.apply" :methods="methods"></ApplyModal>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { endpoints } from '@storage/endpoints';
import { UPLOADS_PATH } from '@storage/constants';
import actionService from './services/actionService';
import ApplyModal from './ApplyModal';

const { aiProcess, hunterApply } = actionService();

const { vacations } = defineProps(['vacations']);

const selectedVacation = ref({});

const modals = ref({
    apply: {
        show: false,
    },
})

const auth = ref(null);
const userRole = ref('guest');

onMounted(() => {
    const authData = localStorage.getItem('auth');

    if (authData) {
        try {
            auth.value = JSON.parse(authData);
            userRole.value = auth.value?.role || 'guest';
        } catch (e) {
            userRole.value = 'guest';
        }
    }
})

const applyForVacation = async (resumeId) => {
    const data = {
        vacation_id: selectedVacation.value?.id,
        resume_id: resumeId
    };

    await hunterApply(data);
}

const methods = {
    applyForVacation: applyForVacation,
}

const applyAiProcess = async (vacationId) => {
    aiProcess(vacationId);
}

const toggleApplyModal = (vacation) => {
    selectedVacation.value = vacation;

    modals.value.apply.show = modals.value.apply.show ? false : true;
}

const getDifficultyLabel = (difficulty) => {
    const labels = {
        1: '⭐ Очень легко',
        2: '⭐⭐ Легко',
        3: '⭐⭐⭐ Средне',
        4: '⭐⭐⭐⭐ Сложно',
        5: '⭐⭐⭐⭐⭐ Очень сложно'
    }
    return labels[difficulty] || `Уровень ${difficulty}`
}

const getStatusLabel = (status) => {
    const labels = {
        edited: 'На редактировании',
        published: 'Опубликовано',
        archived: 'В архиве'
    }
    return labels[status] || status
}
</script>
<style></style>