<script setup>
import { ref } from 'vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hamburger -->
        <div class="flex items-center">
            <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
            >
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path
                        :class="{
                            hidden: showingNavigationDropdown,
                            'inline-flex': !showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                        :class="{
                            hidden: !showingNavigationDropdown,
                            'inline-flex': showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
    >
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 bßg-gray-100">
            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                    ログアウト
                </ResponsiveNavLink>
            </div>
        </div>
    </div>
</template>
