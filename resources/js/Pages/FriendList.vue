<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    userName: String,
    friends: Array,
});
</script>

<template>
    <div class="min-h-screen bg-white">
      <div class="max-w-lg mx-auto pt-10">
        <div class="w-full rounded-lg shadow-md font-bold flex justify-between px-6 py-5">
            <div class="text-3xl">{{ userName }}</div>
            <div class="rounded-full bg-gray-200 h-16 w-16 flex justify-center items-center">
                <div class="">
                    <img src="/images/fukidashi03.png" alt="icon">
                </div>
            </div>
        </div>

        <h1 class="font-bold text-2xl mt-16 mb-4 text-center text-[#00BFFF]">
          友だちリスト
        </h1>
        <ul>
            <li v-for="friend in friends" :key="friend.id" class="bg-white py-2 px-4 rounded-lg mb-2 shadow-md border-l-4 border-[#00BFFF] font-bold">
                {{ friend.name }}
            </li>
        </ul>
      </div>
    </div>
</template>
