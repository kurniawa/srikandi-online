<script setup>
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue';
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue';
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue';
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue';
import { Link, router } from '@inertiajs/vue3';
import { ShoppingCart, CircleUserRound } from 'lucide-vue-next';
const props = defineProps({
    user: Array | null,
    cart: Array | null,
    breadcrumbs: {
        type: Array,
        default: () => [],
    },
    icon: {
        type: Function,
        default: null,
    },
});

// console.log(props.user);
function goTo(path) {
    router.visit(path);
}
</script>

<template>
    <nav class="bg-linear-to-tr from-amber-200 to-amber-500 no-print py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex gap-1 items-center justify-between">
                <div class="w-9">
                    <Link href="/" class="loading-spinner">
                        <img src="/images/icons/icon-96x96.png" alt="" srcset="" class="size-8 rounded-full overflow-hidden">
                    </Link>
                </div>

                <!-- PENCARIAN ITEM -->
                <form action="/" method="GET" class="flex-auto">
                    <div class="flex gap-1 items-center bg-white text-xs text-slate-400 rounded-lg border-slate-300 border-2 pl-1">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                        <div class="grow">
                            <input type="text" name="longname" id="search-longname" oninput="searchItem(this, 'search-result')" class="border-none w-full p-1 rounded" placeholder="nama barang/item...">
                        </div>
                    </div>
                </form>
                <!-- END - PENCARIAN ITEM -->

                <div class="flex gap-2 items-center">
                    
                    <Link v-if="user" class="loading-spinner" href="/">
                        <div class="relative">
                            <component :is="ShoppingCart" class="text-white"/>
                            <div v-if="cart"
                                class="flex absolute left-4 -top-2 size-4 rounded-full bg-red-400 text-white justify-center items-center text-xs">
                                {{ count($cart.cart_items) }}</div>
                        </div>
                    </Link>
                    <DropdownMenu>
                        <DropdownMenuTrigger>
                            <template v-if="user">
                                <button v-if="user.profile_picture" type="button"
                                    class="flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 hover:cursor-pointer"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                        alt="Profile Picture">
                                </button>
                                <button v-else type="button"
                                    class="rounded-full overflow-hidden size-8 flex justify-center items-center hover:cursor-pointer"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <img v-if="user.profile_picture_path" src="{{ asset('storage/' . Auth::user()->profile_picture_path) }}" alt="">
                                    <component v-else :is="CircleUserRound" class="text-white"/>
                                </button>

                            </template>
                            <button v-else type="button"
                                class="text-amber-100 bg-amber-300 border-2 border-amber-100 rounded-full w-8 h-8 flex justify-center items-center"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                            </button>
                        </DropdownMenuTrigger>

                        <DropdownMenuContent class="bg-white border rounded-md shadow-md p-1">
                            <DropdownMenuItem class="px-3 py-1 bg-emerald-300 font-bold text-white rounded hover:bg-emerald-400 hover:cursor-pointer" @select="goTo('/products/choose-category')">
                            New Product
                            </DropdownMenuItem>
                            <DropdownMenuItem class="px-3 py-1 rounded hover:bg-gray-400 hover:cursor-pointer" @select="goTo('/dashboard')">
                            Dashboard
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>
        </div>
    </nav>

    <div v-if="breadcrumbs?.length" class="bg-white border-b px-6 py-3">
        <Breadcrumbs :breadcrumbs="breadcrumbs" :icon="icon"/>
    </div>

    <slot />
</template>