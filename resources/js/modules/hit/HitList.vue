<template>
    <div class="hits-list-container">
        <h3 class="hits-list-title">Список откликов</h3>

        <ul class="hits-list">
            <li v-for="hit in hits?.data" :key="hit.id" class="hit-item">
                <div class="hit-header">
                    <div class="hit-main-info">
                        <h3 class="hit-title">{{ hit.vacation?.title || 'Без названия' }}</h3>
                        <p class="hit-subtitle">Резюме: {{ hit.resume?.title || 'Без названия' }}</p>
                    </div>
                    <span class="hit-status" :class="'status-' + hit.status">
                        {{ formatStatus(hit.status) }}
                    </span>
                </div>

                <div class="hit-details">
                    <div class="hit-detail">
                        <span class="detail-label">Процент успеха</span>
                        <span class="detail-value strength-value" :class="getStrengthClass(hit.strength)">
                            {{ hit.strength ? hit.strength * 100 + '%' : '-' }}
                        </span>
                    </div>
                    <div class="hit-detail">
                        <span class="detail-label">Статус HR</span>
                        <span class="detail-value">{{ formatStatus(hit.hr_status) }}</span>
                    </div>
                    <div class="hit-detail">
                        <span class="detail-label">Статус Hunter</span>
                        <span class="detail-value">{{ formatStatus(hit.hunter_status) }}</span>
                    </div>
                </div>

                <div class="hit-actions" v-if="userRole">
                    <button @click="onSetStatus(hit.id, 'approved')" class="action-btn btn-primary"
                        v-if="userRole === 'hr' && hit.status === 'new' && hit.hr_status !== 'approved' && hit.hunter_status === 'approved'">
                        Пригласить
                    </button>
                    <button @click="onSetStatus(hit.id, 'rejected')" class="action-btn btn-secondary"
                        v-if="userRole === 'hr' && hit.status === 'new' && hit.hr_status !== 'rejected' && hit.hunter_status === 'approved'">
                        Отклонить
                    </button>
                    <button @click="onSetStatus(hit.id, 'approved')" class="action-btn btn-primary"
                        v-if="userRole === 'hunter' && hit.status === 'new' && hit.hunter_status !== 'approved' && hit.hr_status === 'approved'">
                        Принять
                    </button>
                    <button @click="onSetStatus(hit.id, 'rejected')" class="action-btn btn-secondary"
                        v-if="userRole === 'hunter' && hit.status === 'new' && hit.hunter_status !== 'rejected' && hit.hr_status === 'approved'">
                        Отказаться
                    </button>
                    <a :href="endpoints.hit.interviewPage + hit.id" target="_blank" class="action-btn btn-primary"
                        v-if="userRole === 'hunter' && hit.status === 'interview'">
                        Перейти к собеседованию
                    </a>
                </div>
            </li>
        </ul>

        <div class="empty-state" v-if="!hits?.data || hits.data.length === 0">
            <div class="empty-icon">📋</div>
            <p class="empty-text">У вас ещё нет откликов!</p>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { endpoints } from '@storage/endpoints';
import hitService from './services/hitService';

const { hits } = defineProps(['hits']);

const { setStatus } = hitService();

const userRole = ref(null);

onMounted(() => {
    const auth = localStorage.getItem('auth');
    if (auth) {
        try {
            const authData = JSON.parse(auth);
            userRole.value = authData?.role || 'guest';
        } catch (e) {
            console.error('Failed to parse auth data from localStorage', e);
            userRole.value = 'guest';
        }
    }
});

const formatStatus = (status) => {
    const labels = {
        new: 'В ожидании',
        approved: 'Одобрено',
        rejected: 'Отклонено',
        archived: 'В архиве',
        interview: 'Этап собеседования',
    };
    return labels[status] || status;
};

const getStrengthClass = (strength) => {
    if (!strength) {
        return '';
    }

    if (strength >= 70) return 'strength-high';
    if (strength >= 40) return 'strength-medium';
    return 'strength-low';
};

const onSetStatus = async (id, status) => {
    if (userRole.value === 'hr') {
        return await setStatus(id, {
            hr_status: status,
        });
    }
    if (userRole.value === 'hunter') {
        return await setStatus(id, {
            hunter_status: status,
        });
    }
}
</script>
<style></style>