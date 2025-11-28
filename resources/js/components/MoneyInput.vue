<script setup>
import { ref, watch, toRefs } from "vue";

const props = defineProps({
  modelValue: {
    type: Number,
    default: null,
  },
  placeholder: {
    type: String,
    default: "",
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  class: {
    type: String,
    default: "",
  },
});

const emits = defineEmits(["update:modelValue"]);

// tampilan terformat
const display = ref("");

// format angka indonesia
const formatNumber = (value) => {
  if (!value && value !== 0) return "";
  return new Intl.NumberFormat("id-ID").format(value);
};

// parse "1.234.567" -> 1234567
const parseNumber = (value) => {
  if (!value) return null;
  return Number(value.replace(/\./g, ""));
};

// sinkronisasi ketika modelValue datang dari luar
watch(
  () => props.modelValue,
  (val) => {
    display.value = formatNumber(val);
  },
  { immediate: true }
);

// ketika user mengetik
const onInput = (event) => {
  let val = event.target.value;

  const numeric = parseNumber(val);

  // emit numeric (angka asli ke parent)
  emits("update:modelValue", numeric);

  // update display dengan format
  display.value = formatNumber(numeric);
};
</script>

<template>
  <input
    :value="display"
    @input="onInput"
    :placeholder="placeholder"
    :disabled="disabled"
    :class="class"
    type="text"
    autocomplete="off"
  />
</template>
