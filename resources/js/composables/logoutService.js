import axios from "axios";
import { endpoints } from '@storage/endpoints';
import notify from "@composables/notifyService";

const logoutService = () => {
    const logoutHandler = async () => {
        const url = endpoints.auth.logout;

        localStorage.removeItem('auth');

        try {
            const response = await axios.post(url);
            if (response.status == 200) {

                window.location.href = endpoints.auth.loginPage;

                return true;
            }
        } catch (error) {
            notify.error('Произошла ошибка при выходе из аккаунта!');

            return false;
        }
    }

    return { logoutHandler };
};

export default logoutService;