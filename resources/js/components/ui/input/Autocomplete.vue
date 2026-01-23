<script setup>
import { ref, computed } from 'vue';
import Input from './Input.vue';
import axios from 'axios';

const emits = defineEmits([
    'update:modelValue',   // tampil di input (name)
    'update:selected',     // slug / id (hidden value)
    'search',
    'focus',
    'blur',
    'change',
]);

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    selected: {              // slug value invisible
        type: [String, Object, Number],
        default: null,
    },
    delay: {
        type: Number,
        default: 200,
    },
    table: {
        type: String,
        required: true,
    },
    column: {
        type: String,
        required: true,
    },
    parent: {
        type: String,
        default: null,
    },
    parentValue: {
        type: [String, Number],
        default: null,
    },
});

const suggestions = ref([]);

async function fetchSuggestions(text) {
    // console.log('fetching suggestions for', text);
    // console.log('table:', props.table, 'column:', props.column, 'parent:', props.parent, 'parentValue:',  props.parentValue);
    if (!text) {
        suggestions.value = [];
        return;
    }
    let res;
    if (props.parent) {
        res = await axios.get(`/api/autocomplete`, {
            // ?table=${props.table}&column=${props.column}&parent=${props.parent}&parent_slug=${props.parentValue}
            params: { 
                text: text,
                table: props.table,
                column: props.column,
                parent: props.parent,
                parent_slug: props.parentValue,
            }
        });
        
    } else {
        res = await axios.get(`/api/autocomplete`, {
            params: { 
                text: text,
                table: props.table,
                column: props.column,
            }
        });
    }
    // console.log(res.data);
    suggestions.value = res.data;
}

function clearSuggestions() {
    suggestions.value = [];
}

const open = ref(false);
const highlighted = ref(-1);
let timer = null;

const showSuggestions = computed(() =>
    open.value && suggestions.value.length > 0
);

function handleInput(e) {
    const value = e.target.value;

    emits('update:modelValue', value);     // update text
    emits('update:selected', null);        // clear slug

    open.value = true;

    clearTimeout(timer);
    timer = setTimeout(() => {
        emits('search', value);
        fetchSuggestions(value);
    }, props.delay);
}

function select(item) {
    emits('update:modelValue', item.name);
    emits('update:selected', item.slug);

    emits('change', item);
    open.value = false;
    highlighted.value = -1;
}

function handleKeydown(e) {
    if (!open.value) open.value = true;

    switch (e.key) {
        case 'ArrowDown':
            e.preventDefault();
            if (highlighted.value < suggestions.value.length - 1)
                highlighted.value++;
            break;

        case 'ArrowUp':
            e.preventDefault();
            if (highlighted.value > 0)
                highlighted.value--;
            break;

        case 'Enter':
            e.preventDefault();
            if (highlighted.value >= 0)
                select(suggestions.value[highlighted.value]);
            break;

        case 'Escape':
            open.value = false;
            highlighted.value = -1;
            break;
    }
}

function handleBlur(e) {
    emits('blur', e);

    setTimeout(() => {
        open.value = false;
        highlighted.value = -1;
    }, 150);
}
</script>



<template>
    <div class="relative w-full">
        <Input
            v-bind="$attrs"
            :modelValue="modelValue"
            @input="handleInput"
            @keydown="handleKeydown"
            @focus="open = true"
            @blur="handleBlur"
            @change="clearSuggestions"
        />

        <div
            v-if="showSuggestions"
            class="absolute left-0 right-0 mt-1 rounded-xl border bg-white shadow z-10"
        >
            <div
                v-for="(item, index) in suggestions"
                :key="item.slug"
                class="px-3 py-2 cursor-pointer"
                :class="{
                    'bg-blue-500 text-white': index === highlighted,
                    'hover:bg-gray-200': index !== highlighted
                }"
                @mousedown.prevent="select(item)"
                @mouseover="highlighted = index"
            >
                {{ item.name }}
            </div>
        </div>
    </div>
</template>
