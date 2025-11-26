<script setup>
import ProductController from '@/actions/App/Http/Controllers/ProductController';
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';
import Autocomplete from '@/components/ui/input/Autocomplete.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Form } from '@inertiajs/vue3';
import axios from 'axios';
import { LoaderCircle } from 'lucide-vue-next';
import { ref } from 'vue';
const props = defineProps({
    user: Object | null,
    category: String | null,
});

const suggestions = ref([]);
const selectedSuggestions = ref([
    {table: 'ornament_types', slug: ''},
    {table: 'ornament_varian', slug: ''},
]);

const form = ref({
    product_category: props.category || '',
    ornament_type: '',
});
async function fetchSuggestions(table, column, text) {
    if (!text) {
        suggestions.value = [];
        return;
    }

    const res = await axios.get(`/api/autocomplete?table=${table}&column=${column}&text=${text}`, {
        params: { q: text }
    });
    console.log(res.data);
    suggestions.value = res.data;
}

function clearSuggestions() {
    suggestions.value = [];
}
</script>

<template>
    <MainLayout :user="user">
        <div class="m-2 p-2 border rounded shadow drop-shadow">
            <Form v-bind="ProductController.store.form()"
                :reset-on-success="['password']"
                v-slot="{ errors, processing }"
                class="flex flex-col gap-6">
                <div class="grid grid-cols-2 gap-2">
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
                            @change="clearSuggestions"
                            :suggestions="suggestions"
                            @search="fetchSuggestions('ornament_types', 'localname', $event)"
                            placeholder="Tipe Ornament"
                        />
                        <InputError :message="errors.ornament_type" />
                    </div>
                    <div class="grid gap-2">
                        <Label>Varian Ornament:</Label>
                        <Autocomplete
                            v-model="form.ornament_varian"
                            v-model:selected="selectedSuggestions[1].slug"
                            :suggestions="suggestions"
                            @search="fetchSuggestions('ornaments', 'varian', $event)"
                            placeholder="Varian Ornament"
                        />
                        <InputError :message="errors.ornament_varian" />
                    </div>
                </div>
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