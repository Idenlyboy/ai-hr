<template>
    <section class="container flex items-center justify-center flex-grow">
        <div class="w-full md:max-w-md card dark:bg-black">
            <div class="px-4 pt-10 pb-6 sm:px-6 lg:px-8 sm:pt-14 lg:pt-16 sm:pb-8 lg:pb-10 card-content">
                <h1 class="text-3xl font-semibold text-center sm:text-4xl font-alt mb-7 sm:mb-10 lg:mb-14">
                    Регистрация</h1>
                <form @submit.prevent="onSubmit" class="flex flex-col gap-5">
                    <InputText v-model="formData.name" name="name" label="Имя" :errors="errors" :required="true">
                    </InputText>
                    <InputEmail v-model="formData.email" name="email" label="E-mail" :errors="errors" :required="true">
                    </InputEmail>
                    <InputPass v-model="formData.lastname" name="lastname" label="Фамилия" :errors="errors"
                        :required="true">
                    </InputPass>
                    <button class="btn btn-primary btn-lg btn-fill font-alt" type="submit">Зарегистрироваться</button>
                </form>
                <div class="flex items-center justify-center gap-2 mt-6">
                    <span class="font-normal text-base/none opacity-60 font-alt">Уже есть аккаунт?</span>
                    <a class="text-black border-b border-dashed rounded dark:text-white btn font-alt btn-gray border-black/30 dark:border-white/30"
                        draggable="false" :href="endpoints.auth.loginPage">Войти</a>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import { ref } from 'vue';
import InputText from '@ui/InputText';
import InputEmail from '@ui/InputText';
import InputPass from '@ui/InputText';
import regService from './services/regService';
import { endpoints } from '@storage/endpoints';

const { regHandler, errors } = regService(imageState);

const formData = ref({
    name: '',
    email: '',
    password: '',
});

const onSubmit = async () => {
    await regHandler(formData.value);
}
</script>
<style></style>