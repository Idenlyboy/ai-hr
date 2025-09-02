<template>
    <label class="input-wrapper">
        <h5 v-if="label" class="input-label">{{ label }}</h5>

        <div class="input-container">
            <input :class="['input-field', props.class,
                { 'input-error': errors && errors[name] },
                { 'input-disabled': disabled }]" type="text" :name="name" :placeholder="placeholder"
                :required="required" :disabled="disabled" :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)">

            <span v-if="errors && errors[name]" class="error-message">
                {{ errors[name][0] }}
            </span>
        </div>
    </label>
</template>
<script setup>
const props = defineProps({
    label: String,
    name: String,
    placeholder: String,
    disabled: Boolean,
    required: Boolean,
    class: String,
    errors: Object,
    modelValue: String,
});
</script>
<style></style>