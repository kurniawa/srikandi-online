<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <Link :href="href"
        class="relative overflow-hidden rounded-xl
                bg-linear-to-tr from-amber-400 to-amber-500 px-3 py-1 font-bold text-white text-center
                transition-all duration-300 hover:scale-105
                after:absolute after:inset-0 after:bg-white/20
                after:-translate-x-full hover:after:translate-x-full
                after:transition-transform after:duration-500"
        >
        <slot />
    </Link>
</template>