<template>
    <label class="input-wrapper">
        <h5 v-if="label" class="input-label">{{ label }}</h5>

        <div class="input-container">
            <input :class="['input-field', props.class,
                { 'input-error': errors && errors[name] },
                { 'input-disabled': disabled }]" :type="type" autocomplete="new-password" :name="name"
                :required="required" :disabled="disabled" :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder">

            <span v-if="errors && errors[name]" class="error-message">
                {{ errors[name][0] }}
            </span>

            <button class="password-toggle" type="button" @click="showPass" :disabled="disabled">
                <svg class="toggle-icon">
                    <use v-if="type === 'password'" xlink:href="/images/icons.svg#eye-visible"></use>
                    <use v-else xlink:href="/images/icons.svg#eye-hidden"></use>
                </svg>
            </button>
        </div>
    </label>
</template>

<script setup>
import { ref } from 'vue';

const type = ref('password');

const props = defineProps({
    label: String,
    name: String,
    disabled: Boolean,
    required: Boolean,
    class: String,
    errors: Object,
    modelValue: String,
});

const showPass = () => {
    type.value = type.value === 'password' ? 'text' : 'password';
}
</script>

<style></style>