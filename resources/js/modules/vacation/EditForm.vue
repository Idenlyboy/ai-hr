<template>
    <form @submit.prevent="submit" class="vacation-form">
        <!-- Title -->
        <div class="form-group">
            <label for="title">Название</label>
            <input id="title" v-model="form.title" type="text" placeholder="Введите название" required />
        </div>

        <!-- Question Count -->
        <div class="form-group">
            <label for="question_count">Количество вопросов</label>
            <input id="question_count" v-model.number="form.question_count" type="number" min="1" placeholder="3" />
            <small>По умолчанию: 3</small>
        </div>

        <!-- Difficulty (Stars) -->
        <div class="form-group">
            <label>Сложность (1–5)</label>
            <div class="star-rating">
                <span v-for="star in 5" :key="star" @click="form.difficulty = star"
                    :class="{ active: star <= form.difficulty }" class="star" role="button"
                    aria-label="Оценка {{ star }}">
                    ★
                </span>
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" v-model="form.description" rows="4" placeholder="Введите описание"></textarea>
        </div>

        <!-- Speech Kit -->
        <div class="form-group">
            <label for="speach_kit">Speech Kit</label>
            <select id="speach_kit" v-model="form.speach_kit" required>
                <option value="" disabled>Выберите сервис</option>
                <option value="SberGPT">SberGPT</option>
                <option value="YandexGPT">YandexGPT</option>
                <option value="ChatGPT">ChatGPT</option>
                <option value="DeepSeek">DeepSeek</option>
                <option value="QwenAI">QwenAI</option>
            </select>
        </div>

        <!-- File Upload -->
        <div class="form-group">
            <label for="file">Файл (PDF, DOC, TXT)</label>
            <input id="file" type="file" accept=".pdf,.doc,.docx,.txt" @change="handleFileUpload" />
            <small v-if="form.file">Выбрано: {{ form.file.name }}</small>
        </div>

        <!-- Status (read-only) -->
        <div v-if="isEditMode" class="form-group">
            <label>Статус</label>
            <div class="form-value">{{ form.status }}</div>
        </div>

        <!-- Submit -->
        <button type="submit" :disabled="processing">
            {{ isEditMode ? 'Обновить' : 'Создать' }}
        </button>

        <!-- Success Message -->
        <div v-if="success" class="success-message">
            {{ isEditMode ? 'Обновлено!' : 'Создано!' }}
        </div>
    </form>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import actionService from './services/actionService';

// Предположим, что actionService возвращает { sendForm, notify, endpoints }
const { sendForm, notify, endpoints } = actionService();

const { vacation } = defineProps(['vacation']);
const isEditMode = !!vacation;

const form = ref({
    title: '',
    question_count: 3,
    difficulty: 1,
    description: '',
    speach_kit: '',
    file: null,
    status: 'draft',
});

const handleFileUpload = (e) => {
    const file = e.target.files[0];
    const allowedTypes = ['application/pdf', 'application/msword', 'text/plain'];
    if (file && allowedTypes.includes(file.type)) {
        form.value.file = file;
    } else if (file) {
        notify?.error('Разрешены только PDF, DOC, DOCX, TXT');
        e.target.value = '';
    }
};

const processing = ref(false);
const success = ref(false);

const submit = async () => {
    processing.value = true;
    success.value = false;

    // Создаём объект данных
    const data = { ...form.value };

    const success = await sendForm(vacation?.id, data);

    if (success) {
        success.value = true;
        if (!isEditMode) {
            // Сброс формы
            form.value = {
                title: '',
                question_count: 3,
                difficulty: 1,
                description: '',
                speach_kit: '',
                file: null,
                status: 'draft',
            };
        }
    }

    processing.value = false;
};

onMounted(() => {
    if (vacation) {
        Object.assign(form.value, vacation);
    }
});
</script>
<style></style>