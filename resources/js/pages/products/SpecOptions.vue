<script setup>
import { ref } from 'vue';

const props = defineProps({
    modelValue: {
        type: Array,
        default: () => []
    }
});

const emits = defineEmits(['update:modelValue']);

const specs = ref([
    {name: 'checkbox_gems',  label: 'mata'},
    {name: 'checkbox_toys',  label: 'mainan'},
    {name: 'checkbox_size',  label: 'ukuran'},
    {name: 'checkbox_brand', label: 'merk'},
    {name: 'checkbox_plate', label: 'plat'},
]);

function toggle(specName, event) {
    let newValue = [...props.modelValue];

    if (event.target.checked) {
        // tambah jika checked
        if (!newValue.includes(specName)) {
            newValue.push(specName);
        }
    } else {
        // hapus jika un-checked
        newValue = newValue.filter(v => v !== specName);
    }

    emits('update:modelValue', newValue);
    console.log(newValue);
}
</script>

<template>
    <div class="bg-violet-200 rounded w-4/5 px-2">
        <div class="grid grid-cols-3 gap-2">
            <div v-for="spec in specs" :key="spec.name" class="flex gap-1 items-center">
                
                <input type="checkbox"
                       :id="spec.name"
                       :checked="modelValue.includes(spec.name)"
                       @change="toggle(spec.name, $event)"
                />

                <label :for="spec.name">{{ spec.label }}</label>
            </div>
        </div>
    </div>
</template>
