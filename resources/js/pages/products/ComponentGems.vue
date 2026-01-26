<script setup>
import Autocomplete from '@/components/ui/input/Autocomplete.vue';

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    selected: {              // slug value invisible
        type: [String, Object, Number],
        default: null,
    },
});

const emits = defineEmits(['update:modelValue', 'update:selected']);
</script>

<template>
    <div class="grid gap-2">
        <Label>Mata:</Label>
        <Autocomplete
            v-model="emits('update:modelValue', modelValue)"
            v-model:selected="selected"
            table="accessories"
            column="color"
            parent="category"
            parent-value="gems"
            placeholder="Warna Mata"
        />
        <InputError :message="form.errors.ornament_variant" />
    </div>
</template>