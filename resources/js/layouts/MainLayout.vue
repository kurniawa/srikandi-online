<script setup>
// import AppLogoIcon from '@/components/AppLogoIcon.vue';
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue';
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue';
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue';
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue';
import { Link, router } from '@inertiajs/vue3';
import { ShoppingCart } from 'lucide-vue-next';
const props = defineProps({
    user: Object | null,
    cart: Object | null,
});

console.log(props.user);
function goTo(path) {
    router.visit(path);
}
</script>

<template>
    <nav class="bg-linear-to-tr from-amber-200 to-amber-500 no-print py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex gap-1 items-center justify-between">
                <div class="w-9">
                    <Link :href="route('home')" class="loading-spinner">
                        <img src="/images/icons/icon-96x96.png" alt="" srcset="" class="size-8 rounded-full overflow-hidden">
                    </Link>
                </div>

                <!-- PENCARIAN ITEM -->
                <form action="{{ route('home') }}" method="GET" class="flex-auto">
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
                    <!-- <a v-if="user" href="{{ route('choose_action') }}" class="loading-spinner size-7 rounded-full bg-amber-500 flex justify-center items-center font-bold text-white text-xl">T</a>
                    <button type="button"
                        class="rounded-full bg-rose-200 p-1 text-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button> -->
                    
                    <Link v-if="user" class="loading-spinner" href="{{ route('carts.index', Auth::user()->id) }}">
                        <div class="relative">
                            <component :is="ShoppingCart" class="text-white"/>
                            <div v-if="cart"
                                class="flex absolute left-4 -top-2 size-4 rounded-full bg-red-400 text-white justify-center items-center text-xs">
                                {{ count($cart.cart_items) }}</div>
                        </div>
                    </Link>

                    <!-- Profile dropdown -->
                    <!-- <div class="relative">
                        <div>
                            
                        </div>
                        <div id="profile-menu"
                            class="hidden absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <template v-if="user">
                                <a href="{{ route('users.show', $user->id) }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Profile</a>
                                <a href="{{ route('transactions.rincian_transaksi', $user->id) }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Rincian Transaksi</a>
                            </template>
                            <a href="{{ route('users.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Daftar User</a>
                            <a href="{{ route('pelanggans.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Daftar Pelanggan</a>
                            <a href="{{ route('surat_pembelian.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Surat Pembelian</a>
                            <a href="{{ route('cashflow.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Cash Flow</a>
                            <a v-if="!user" href="{{ route('login') }}" class="loading-spinner" role="menuitem" tabindex="-1">
                                <button class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 flex gap-2 items-center">
                                    <span>Log In</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                </button>
                            </a>

                            <template v-if="user">
                                <a v-if="user.clearance_level >= 5" href="{{ route('artisans.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Artisan Commands</a>
                                <a href="{{ route('attributes.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Attribute Setting</a>
                                <form action="{{ route('logout') }}" method="POST" class="loading-spinner block">
                                    <button type="submit" class="py-2 text-sm text-left pl-4 text-gray-600 hover:bg-gray-200 w-full flex">
                                        <span>Log Out</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                        </svg>
                                    </button>
                                </form>
                            </template>
                        </div>
                    </div> -->
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
                                    class="text-white bg-amber-500 rounded-full overflow-hidden w-8 h-8 flex justify-center items-center hover:cursor-pointer"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <img v-if="user.profile_picture_path" src="{{ asset('storage/' . Auth::user()->profile_picture_path) }}" alt="">
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
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
    <slot />
</template>