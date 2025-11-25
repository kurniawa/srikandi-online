<script setup>
import ProductController from '@/actions/App/Http/Controllers/ProductController';
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';
import Autocomplete from '@/components/ui/input/Autocomplete.vue';
import Input from '@/components/ui/input/Input.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Form } from '@inertiajs/vue3';
import axios from 'axios';
import { LoaderCircle } from 'lucide-vue-next';
import { ref } from 'vue';
const props = defineProps({
    user: Object | null,
    category: String | null,
});

const keyword = ref('');
const suggestions = ref([]);

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
                        <Input
                            v-model="form.product_category"
                            type="text"
                            name="product_category"
                            placeholder="Kategori Produk"
                        />
                        <InputError :message="errors.product_category" />
                    </div>
                    <div class="grid gap-2">
                        <Autocomplete
                            v-model="form.ornament_type"
                            :suggestions="suggestions"
                            @search="fetchSuggestions('ornament_types', 'localname', $event)"
                            placeholder="Tipe Ornamen"
                        />
                        <InputError :message="errors.ornament_type" />
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