<script setup>
defineProps({
    userId: Number,
    friendId: Number,
    friendName: String,
    messages: Array,
});

</script>

<template>
    <div class="min-h-screen bg-white">
        <div class="max-w-lg mx-auto pt-10 mt-20">
            <div class="relative h-[500px] w-full rounded-md border-2 border-slate-400 bg-slate-100">

                <!-- header -->
                <div class="flex h-20 items-center justify-between bg-slate-400 p-6">
                    <div class="text-xl text-white font-bold">{{ friendName }}</div>
                    <a :href="route('friends')" class="text-sm text-white hover:text-base">戻る</a>
                </div>

                <!-- comment -->
                <div v-for="message in messages" :key="message.id">
                    <div
                    :class="{
                        'm-2 flex min-h-16 justify-end': message.sender_id === userId,
                        'm-2 flex min-h-16 justify-start': message.sender_id === friendId
                    }"
                    >
                        <div
                        :class="{
                            'relative max-w-[80%] rounded-2xl bg-sky-400 p-2 text-white shadow-xl': message.sender_id === userId,
                            'relative max-w-[80%] rounded-2xl bg-gray-500 p-2 text-white shadow-xl': message.sender_id === friendId
                        }"
                        >
                            <div
                            :class="{
                                'absolute right-0 top-1/3 -mt-2 h-3 w-1 rotate-45 transform bg-sky-400': message.sender_id === userId,
                                'absolute left-0 top-1/3 -mt-2 h-3 w-1 rotate-45 transform bg-gray-500': message.sender_id === friendId
                            }"
                            ></div>
                            {{ message.content }}
                        </div>
                    </div>
                </div>

                <!-- controller -->
                <div class="absolute bottom-0 my-2 flex w-full justify-between">
                    <input type="text" class="ml-3 h-[35px] w-full rounded-md border-2 border-gray-400 focus:ring-4 focus:ring-blue-400" placeholder="  Input text here.." />
                    <button class="ml-2 mr-3 h-[35px] min-w-[60px] rounded-lg border-2 border-gray-400 bg-slate-400 text-white hover:bg-slate-600">送信</button>
                </div>
            </div>
        </div>
    </div>
</template>
