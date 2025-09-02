import { ref } from "vue";
import axios from "axios";
import { endpoints } from '@storage/endpoints';
import notify from "@composables/notifyService";

const regService = () => {
    const errors = ref({});

    const regHandler = async (formData) => {
        errors.value = {};

        const url = endpoints.auth.register;

        try {
            const response = await axios.post(url, formData);

            if (response.data.success) {
                notify.success('Успешно!');

                return true;
            }
            notify.error(response.data.message ?? 'Произошла ошибка при регистрации!');

            return false;
        } catch (error) {
            if (error.response) {
                errors.value = error.response.data.errors;
            }

            notify.error(error?.response?.data?.message ?? 'Произошла ошибка при регистрации!');

            return false;
        }
    }

    return { regHandler, step, errors };
};

export default regService;