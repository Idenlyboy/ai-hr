import { ref } from "vue";
import axios from "axios";
import { endpoints } from '@storage/endpoints';
import notify from '@composables/notifyService';

const actionService = () => {
    const errors = ref({});

    const aiProcess = async (id) => {
        const url = endpoints.vacation.aiProcess + id;

        try {
            const response = await axios.post(url);

            if (response.status == 200) {
                notify.success('ИИ начал обработку!');
                return true;
            }

            notify.error(error?.response?.data?.message ?? 'Что-то пошло не так!');

            return false;
        } catch (error) {

            notify.error(error?.response?.data?.message ?? 'Произошла ошибка при обработке ИИ!');

            return false;
        }
    }

    const hunterApply = async (formData) => {
        const url = endpoints.vacation.hunterApply;

        try {
            const response = await axios.post(url, formData);

            if (response.status == 200) {
                notify.success('Отклик отправлен!');
                return true;
            }

            notify.error(error?.response?.data?.message ?? 'Что-то пошло не так!');

            return false;
        } catch (error) {

            notify.error(error?.response?.data?.message ?? 'Произошла ошибка при отклике!');

            return false;
        }
    }

    const sendForm = async (id, data) => {
        const url = id
            ? `${endpoints.vacation.crud}${id}/`
            : endpoints.vacation.crud;

        const formData = new FormData();
        Object.entries(data).forEach(([key, value]) => {
            if (value !== null && value !== undefined) {
                formData.append(key, value);
            }
        });

        if (id) {
            formData.append('_method', 'PUT');
        }

        try {
            const response = await axios.post(url, formData);
            if (response.status === 200 || response.status === 201) {
                notify.success('Успешно!');
                return true;
            }
            notify.error('Ошибка сервера');
            return false;
        } catch (error) {
            notify.error(error?.response?.data?.message ?? 'Ошибка отправки');
            return false;
        }
    };

    return { aiProcess, hunterApply, sendForm };
};

export default actionService;