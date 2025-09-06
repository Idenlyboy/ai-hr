import { ref, computed } from "vue";
import axios from "axios";
import { endpoints } from '@storage/endpoints';
import notify from "@composables/notifyService";

const loginService = () => {
    const errors = ref({});

    const loginHandler = async (formData) => {
        errors.value = {};

        const url = endpoints.auth.login;

        try {
            const response = await axios.post(url, formData);

            localStorage.setItem('auth', JSON.stringify(response.data.data));

            window.location.href = '/';

            return true;
        } catch (error) {
            if (error?.response?.data?.errors) {
                errors.value = error.response.data.errors;
            }

            notify.error(error?.response?.data?.message ?? 'Произошла ошибка при входе!');

            return false;
        }
    }

    return { loginHandler, errors };
};

export default loginService;