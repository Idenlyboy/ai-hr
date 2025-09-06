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

    return { aiProcess, hunterApply };
};

export default actionService;