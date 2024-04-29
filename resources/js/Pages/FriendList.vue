<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Hamburger from '../Components/Hamburger.vue';

defineProps({
    userName: String,
    friends: Array,
});
</script>

<template>
    <div class="min-h-screen bg-white">
        <div class="max-w-lg mx-auto pt-10">
            <div class="mb-8">
                <Hamburger/>
            </div>
            <div class="w-full rounded-lg shadow-md font-bold flex justify-between px-6 py-5">
                <div class="text-3xl">
                {{ userName }}
                </div>
                <div class="rounded-full bg-gray-200 h-16 w-16 flex justify-center items-center">
                    <div class="">
                        <img src="/images/fukidashi03.png" alt="icon">
                    </div>
                </div>
            </div>

            <h1 class="font-bold text-2xl mt-16 mb-4 ml-4 text-left text-[#00BFFF]">
            友だちリスト
            </h1>
            <ul>
                <li v-for="friend in friends" :key="friend.id" class="bg-white py-4 px-4 rounded-lg mb-2 shadow-md border-l-4 border-[#00BFFF] text-lg font-bold hover:bg-gray-100">
                    <a :href="route('talk.get',{friend_id: friend.id})">
                        {{ friend.name }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>
