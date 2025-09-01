import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const toast = useToast();

const notify = {
    success(message) {
        toast.success(message);
    },
    error(message) {
        toast.error(message);
    },
    info(message) {
        toast.info(message);
    },
    warning(message) {
        toast.warning(message);
    }
};

export default notify;