<script setup>
import Input from './Input.vue';

const emit = defineEmits(['update:modelValue', 'search']);

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    suggestions: {
        type: Array,
        default: () => [],
    },
    /**
     * opsi timeout agar tidak terlalu sering memanggil API
     */
    delay: {
        type: Number,
        default: 300,
    }
});

let timer = null;

function handleInput(e) {
    const value = e.target.value;

    emit('update:modelValue', value);

    // debounce memanggil API
    clearTimeout(timer);
    timer = setTimeout(() => {
        emit('search', value);
    }, props.delay);
}
</script>

<template>
    <Input
        v-bind="$attrs"
        :modelValue="modelValue"
        @input="handleInput"
        @change="$emit('change', $event)"
        @focus="$emit('focus', $event)"
        @blur="$emit('blur', $event)"
        list="autocomplete-options"
    />

    <datalist id="autocomplete-options">
        <option
            v-for="(suggestion, index) in suggestions"
            :key="index"
            :value="suggestion"
        />
    </datalist>
</template>
