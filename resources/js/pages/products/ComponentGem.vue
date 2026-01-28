<script setup>
import Autocomplete from '@/components/ui/input/Autocomplete.vue';

const props = defineProps({
  colorName: String,
  colorSlug: String,
  quantity: Number,
  transparency: String,
})

const emit = defineEmits([
  'update:colorName',
  'update:colorSlug',
  'update:quantity',
  'update:transparency',
  'remove',
])
</script>

<template>
  <div class="grid grid-cols-4 gap-2">
    <Autocomplete
      :modelValue="props.colorName"
      :selected="props.colorSlug"
      table="accessories"
      column="warna"
      parent="category"
      parent-value="gems"
      placeholder="Warna"
      @update:modelValue="emit('update:colorName', $event)"
      @update:selected="emit('update:colorSlug', $event)"
    />

    <input
      type="number"
      :value="quantity"
      @input="emit('update:quantity', Number($event.target.value))"
    />

    <input
      type="text"
      :value="transparency"
      @input="emit('update:transparency', $event.target.value)"
    />

    <button type="button" @click="emit('remove')">
      Hapus
    </button>
  </div>
</template>
