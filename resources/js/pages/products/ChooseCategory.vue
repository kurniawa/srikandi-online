<script setup>
import GoldButton from '@/components/my-ui/GoldButton.vue';
import Badge from '@/components/ui/badge/Badge.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Gem } from 'lucide-vue-next';

const props = defineProps({
    user: Object | null,
});

const breadcrumbs = [
    { title: 'Products', href: '/products' },
    { title: 'Choose Category' },
];

</script>

<template>
    <MainLayout :user="user" :breadcrumbs="breadcrumbs" :icon="Gem">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                     <div class="flex gap-2">
                        <GoldButton href="#">Gold Bullion</GoldButton>
                        <GoldButton href="/products/create?category=jewelry">Jewelry</GoldButton>
                        <!-- <Link href="#" class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center transition-all duration-200 hover:brightness-110">Gold Bullion</Link>
                        <Link href="#" class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center transition-all duration-200 hover:scale-105">Jewelry</Link>
                        <Link href="#" class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center transition-all duration-200 hover:shadow-md hover:shadow-amber-400/50">Jewelry</Link>
                        <Link href="#" class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center transition-all duration-300 hover:from-amber-300 hover:to-amber-500">Jewelry</Link>
                        <Link href="#" class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center transition-all duration-200 hover:ring-2 hover:ring-amber-400/70">Jewelry</Link>
                        <Link 
                            href="#" 
                            class="rounded-xl bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center
                                    transition-all duration-300 
                                    hover:scale-105 
                                    hover:brightness-110
                                    hover:shadow-lg hover:shadow-amber-400/40"
                            >
                            Gold Bullion
                        </Link>
                        <Link 
                            href="#"
                            class="relative overflow-hidden rounded-xl
                                    bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center
                                    transition-all duration-300 hover:scale-105
                                    after:absolute after:inset-0 after:bg-white/20
                                    after:-translate-x-full hover:after:translate-x-full
                                    after:transition-transform after:duration-500"
                            >
                            Gold Bullion
                        </Link>

                         <Link href="#"><Badge variant="default">Gold Bullion</Badge></Link>
                         <Link href="#"><Badge variant="destructive">Gold Bullion</Badge></Link>
                         <Link href="#"><Badge variant="outline">Gold Bullion</Badge></Link>
                         <Link href="#"><Badge variant="secondary">Gold Bullion</Badge></Link> -->
                     </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>