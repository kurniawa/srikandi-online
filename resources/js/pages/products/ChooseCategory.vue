<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
const props = defineProps({
    user: Object | null,
});

</script>

<template>
    <MainLayout :user="user">
        <template #header>
            <h1 class="text-2xl font-semibold text-gray-900">Choose Product Category</h1>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700">Select a category for your new product.</p>
                    <!-- Additional content for choosing category can be added here -->
                </div>
            </div>
        </div>
    </MainLayout>
</template>