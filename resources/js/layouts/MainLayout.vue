<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    user: Object,
});
</script>
<template>
    <nav class="bg-linear-to-br from-amber-500 to-amber-200 no-print py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex gap-1 items-center justify-between">
                <div class="w-9">
                    <Link :href="route('home')" class="loading-spinner">
                        <!-- <img src="{{ asset('images/icons/icon-96x96.png') }}" alt="" srcset="" class="size-8 rounded-full overflow-hidden"> -->
                    </Link>
                </div>

                <!-- {{-- PENCARIAN ITEM --}}
                <form action="{{ route('home') }}" method="GET" class="flex-auto">
                    <div class="flex gap-1 items-center bg-white text-xs text-slate-400 rounded-lg border-slate-300 border-2 pl-1">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                        <div class="grow">
                            <input type="text" name="longname" id="search-longname" class="border-none w-full p-1 rounded" placeholder="nama barang/item...">
                        </div>
                    </div>
                </form>
                {{-- END - PENCARIAN ITEM --}} -->

                <div class="flex gap-2 items-center">
                    @auth
                        <a href="{{ route('choose_action') }}" class="loading-spinner size-7 rounded-full bg-amber-500 flex justify-center items-center font-bold text-white text-xl">T</a>
                    @endauth

                    @if (Auth::user())
                        <a class="loading-spinner" href="{{ route('carts.index', Auth::user()->id) }}">
                            <div class="text-amber-700 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <!-- @if ($cart)
                                    <div
                                        class="flex absolute left-4 -top-2 size-4 rounded-full bg-red-400 text-white justify-center items-center text-xs">
                                        {{ count($cart->cart_items) }}</div>
                                @endif -->
                            </div>
                        </a>
                    @endif

                    <!-- Profile dropdown -->
                    <div class="relative">
                        <div>
                            <template v-if="user">
                                <button v-if="user.profile_picture" type="button"
                                    class="flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    onclick="toggleMenu('profile-menu', 'menu-close-layer')">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                        alt="Profile Picture">
                                </button>
                                <button v-else type="button"
                                    class="text-white bg-amber-500 rounded-full overflow-hidden w-8 h-8 flex justify-center items-center"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    onclick="toggleMenu('profile-menu', 'menu-close-layer')">
                                        <img v-if="user.profile_picture_path" src="{{ asset('storage/' . Auth::user()->profile_picture_path) }}" alt="">
                                        <svg v-esle xmlns="http://www.w3.org/2000/svg" fill="none"
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
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                            </button>
                            <!-- <button v-else type="button"
                                class="text-amber-100 bg-amber-300 border-2 border-amber-100 rounded-full w-8 h-8 flex justify-center items-center"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                onclick="toggleMenu('profile-menu', 'menu-close-layer')"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                            </button> -->
                        </div>
                        <!-- <div id="profile-menu"
                            class="hidden absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            
                            @auth
                            <a href="{{ route('users.show', $user->id) }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Profile</a>
                            <a href="{{ route('transactions.rincian_transaksi', $user->id) }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Rincian Transaksi</a>
                            @endauth
                            <a href="{{ route('users.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Daftar User</a>
                            <a href="{{ route('pelanggans.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Daftar Pelanggan</a>
                            <a href="{{ route('surat_pembelian.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Surat Pembelian</a>
                            <a href="{{ route('cashflow.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Cash Flow</a>
                            @if (!isset($user) || !$user)
                                <a href="{{ route('login') }}" class="loading-spinner" role="menuitem" tabindex="-1">
                                    <button class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 flex gap-2 items-center">
                                        <span>Log In</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                        </svg>
                                    </button>
                                </a>
                            @endif

                            @auth
                            @if ($user->clearance_level >= 5)
                            <a href="{{ route('artisans.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Artisan Commands</a>
                            @endif
                            <a href="{{ route('attributes.index') }}" class="loading-spinner block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">Attribute Setting</a>
                            <form action="{{ route('logout') }}" method="POST" class="loading-spinner block">
                                @csrf
                                <button type="submit" class="py-2 text-sm text-left pl-4 text-gray-600 hover:bg-gray-200 w-full flex">
                                    <span>Log Out</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                </button>
                            </form>
                            @endauth

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>