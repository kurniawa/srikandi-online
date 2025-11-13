<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    user: Object | null,
});
console.log(props.user);
</script>
<template>
    <MainLayout :user="user">
        <div class="py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Welcome to Srikandi Online!</h1>
                <p class="mt-4 text-lg text-gray-700">
                    This is the home page of your application.
                </p>
            </div>
        </div>
    </MainLayout>
</template>