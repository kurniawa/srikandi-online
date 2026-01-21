<script setup>
import ProductController from '@/actions/App/Http/Controllers/ProductController';
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';
import Autocomplete from '@/components/ui/input/Autocomplete.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { cn } from '@/lib/utils';
import { Form } from '@inertiajs/vue3';
import axios from 'axios';
import { LoaderCircle } from 'lucide-vue-next';
import { ref, watch } from 'vue';
import SpecOptions from './SpecOptions.vue';
import MoneyInput from '@/components/MoneyInput.vue';
const props = defineProps({
    user: Array | null,
    category: String | null,
    gold_colors: Array | null,
    accessories: Array | null,
});
// console.log(props);
const selectedSuggestions = ref([
    {table: 'ornament_types', slug: ''},
    {table: 'ornament_varian', slug: ''},
    {table: 'gold_standard', slug: ''},
]);

const form = ref({
    product_category: props.category || '',
    ornament_type: '',
    description: '',
    gold_color: '',
    gold_ratio: '',
    weight: 0,
    price_per_gram: 0,
    total_price: 0,
});

watch(
  () => [form.value.price_per_gram, form.value.weight],
  ([price, weight]) => {
    if (!price || !weight) {
      form.value.total_price = 0
      return
    }

    form.value.total_price = price * weight
  }
)

/**
 * Fitur Spec Options
 * @param params 
 */
const selectedSpecs = ref([]);
</script>

<template>
    <MainLayout :user="user">
        <div class="m-2 p-2 border rounded shadow drop-shadow">
            <Form v-bind="ProductController.store.form()"
                :reset-on-success="['password']"
                v-slot="{ errors, processing }"
                class="flex flex-col gap-6 relative">
                <div class="grid grid-cols-2 gap-x-2 gap-y-4">
                    <div class="grid gap-2">
                        <Label>Kategori Produk:</Label>
                        <Input
                            v-model="form.product_category"
                            type="text"
                            name="product_category"
                            placeholder="Kategori Produk"
                            class="bg-gray-50 font-bold"
                            disabled
                        />
                        <InputError :message="errors.product_category" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Tipe Ornament:</Label>
                        <Autocomplete
                            v-model="form.ornament_type"
                            v-model:selected="selectedSuggestions[0].slug"
                            table="ornament_types"
                            column="localname"
                            parent="category"
                            parent-value="jewelry"
                            placeholder="Tipe Ornament"
                        />
                        <InputError :message="errors.ornament_type" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Varian Ornament:</Label>
                        <Autocomplete
                            v-model="form.ornament_varian"
                            v-model:selected="selectedSuggestions[1].slug"
                            table="ornaments"
                            column="varian"
                            parent="type"
                            :parent-value="selectedSuggestions[0].slug"
                            placeholder="Varian Ornament"
                        />
                        <InputError :message="errors.ornament_varian" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Deskripsi (opt.):</Label>
                        <Input
                            v-model="form.description"
                            type="text"
                            name="description"
                            placeholder="Deskripsi (opt.)"
                        />
                        <InputError :message="errors.description" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Warna Emas:</Label>
                        <select
                            v-model="form.gold_color"
                            name="gold_color"
                            :class="cn(
                                'file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
                                'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
                                'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive'
                                )"
                        >
                            <option
                                v-for="color in gold_colors"
                                :key="color.id"
                                :value="color.slug"
                            >
                                {{ color.localname }}
                            </option>
                        </select>
                        <InputError :message="errors.gold_color" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Kadar:</Label>
                        <Autocomplete
                            v-model="form.gold_ratio"
                            v-model:selected="selectedSuggestions[2].slug"
                            table="gold_standards"
                            column="purity"
                            :parent="null"
                            :parent-value="null"
                            placeholder="Kadar"
                        />
                        <InputError :message="errors.kadar" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Berat (g):</Label>
                        <Input
                            v-model="form.weight"
                            type="number" step="0.01"
                            name="weight"
                            placeholder="Berat"
                        />
                        <InputError :message="errors.weight" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Harga per gram:</Label>
                        <MoneyInput
                            v-model="form.price_per_gram"
                            placeholder="Harga total"
                            class="border rounded-md px-3 py-1 w-full"
                        />
                        <InputError :message="errors.price_per_gram" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Harga total:</Label>
                        <MoneyInput
                            v-model="form.total_price"
                            placeholder="Harga total"
                            class="border rounded-md px-3 py-1 w-full"
                        />
                        <InputError :message="errors.total_price" />
                    </div>
                    <!-- <ComponentGems  v-if="selectedSpecs.includes('checkbox_gems')" />
                    <ComponentToys  v-if="selectedSpecs.includes('checkbox_toys')" />
                    <ComponentSize  v-if="selectedSpecs.includes('checkbox_size')" />
                    <ComponentBrand v-if="selectedSpecs.includes('checkbox_brand')" />
                    <ComponentPlate v-if="selectedSpecs.includes('checkbox_plate')" /> -->
                </div>

                <SpecOptions v-model="selectedSpecs" />
                <Button
                    type="submit"
                    class="mt-4 w-full"
                    :tabindex="4"
                    :disabled="processing"
                    data-test="login-button"
                >
                    <LoaderCircle
                        v-if="processing"
                        class="h-4 w-4 animate-spin"
                    />
                    Submit
                </Button>
            </Form>
        </div>
    </MainLayout>
</template>