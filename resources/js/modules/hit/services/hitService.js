import axios from "axios";
import { endpoints } from '@storage/endpoints';
import notify from '@composables/notifyService';

const hitService = () => {
    const setStatus = async (id, formData) => {
        const url = endpoints.hit.updateStatus + id;

        try {
            const response = await axios.post(url, formData);

            if (response.status == 200) {
                notify.success('Отправлено!');
                return true;
            }

            notify.error(error?.response?.data?.message ?? 'Что-то пошло не так!');

            return false;
        } catch (error) {

            notify.error(error?.response?.data?.message ?? 'Произошла ошибка при отправке!');

            return false;
        }
    }

    return { setStatus };
};

export default hitService;