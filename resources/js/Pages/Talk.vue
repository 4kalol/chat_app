<script setup>
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    userId: Number,
    friendId: Number,
    friendName: String,
    messages: Array,
});

const userId = ref(props.userId);
const friendId = ref(props.friendId);
const messageLists = ref([]);
const newMessage = ref('');

const sendMessage = async() => {
    try{
        messageLists.value.push({
            sender_id: userId.value,
            receiver_id: friendId.value,
            message: newMessage.value,
        });
        const res = await axios.post('/api/insert_message', {
            userId: userId.value,
            friendId: friendId.value,
            message: newMessage.value,
        });
        console.log(res.data);
        newMessage.value = '';
    }catch(e){
        console.log(e);
    }
};

// TODO 受信する側の処理も必要。監視して相手からのメッセージがあった際にmessageListsにpush

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

                <!-- send comment, receive comment -->
                <div v-for="(message, i) in messageLists" :key="i">
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
                            {{ message.message }}
                        </div>
                    </div>
                </div>

                <!-- controller -->
                <form @submit.prevent="sendMessage">
                    <div class="absolute bottom-0 my-2 flex w-full justify-between">
                        <input type="text" v-model="newMessage" class="ml-3 h-[35px] w-full rounded-md border-2 border-gray-400 focus:ring-4 focus:ring-blue-400" placeholder="  Input text here.." />
                        <button type="submit" class="ml-2 mr-3 h-[35px] min-w-[60px] rounded-lg border-2 border-gray-400 bg-slate-400 text-white hover:bg-slate-600">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
