<template>
    <section class="auth-section">
        <div class="auth-card">
            <div class="auth-content">
                <h1 class="auth-title">
                    Авторизация
                </h1>

                <form class="auth-form" @submit.prevent="onSubmit">
                    <div class="role-selector">
                        <label class="role-option" @click="setUserEntity('hunter')">
                            <input type="radio" value="hunter" name="status"
                                :checked="formData.userEntity === 'hunter'">
                            <span class="role-button">Соискатель</span>
                        </label>

                        <label class="role-option" @click="setUserEntity('hr')">
                            <input type="radio" value="hr" name="status" :checked="formData.userEntity === 'hr'">
                            <span class="role-button">HR-Специалист</span>
                        </label>
                    </div>

                    <div class="form-fields">
                        <InputEmail v-model="formData.email" name="email" label="Почта" :errors="errors"
                            :required="true"></InputEmail>
                        <InputPass v-model="formData.password" name="password" label="Пароль" :errors="errors"
                            :required="true"></InputPass>

                        <div class="forgot-password">
                            <a class="link-button" href="#">
                                Забыли пароль?
                            </a>
                        </div>

                        <button class="submit-button" type="submit">
                            Войти
                        </button>
                    </div>
                </form>

                <div class="auth-footer">
                    <span class="footer-text">Нет аккаунта?</span>
                    <a class="link-button" :href="endpoints.auth.registration">
                        Зарегистрироваться
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import { ref } from 'vue';
import InputEmail from '@ui/InputEmail';
import InputPass from '@ui/InputPass';
import loginService from './services/loginService';
import { endpoints } from '@storage/endpoints';

const { loginHandler, errors } = loginService();

const formData = ref({
    email: '',
    password: '',
    userEntity: 'hunter',
});

const setUserEntity = (value) => {
    formData.value.userEntity = value;
}

const onSubmit = async () => {
    loginHandler(formData.value);
}
</script>
<style></style>