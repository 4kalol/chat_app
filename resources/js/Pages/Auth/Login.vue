<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="メールアドレス" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 rounded-3xl block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="パスワード" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 rounded-3xl block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-500 font-bold">ログインのままにする</span>
                </label>
            </div>

            <div class="flex mt-4">
                <button type="submit" class="mx-auto bg-sky-300 text-white w-1/2 py-2 rounded-3xl font-bold hover:bg-sky-200">
                    ログイン
                </button>
            </div>

            <div class="flex mt-4">
                <a :href="route('login.google')" class="mx-auto bg-sky-300 text-white w-1/2 py-2 rounded-3xl font-bold hover:bg-sky-200 text-center">
                    Googleでログイン
                </a>
            </div>

            <div class="flex mt-4">
                <a
                    :href="route('register')"
                    class="mx-auto bg-sky-300 text-white w-1/2 py-2 rounded-3xl font-bold hover:bg-sky-200 text-center"
                    >アカウント作成</a
                >
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-bold"
                >
                    パスワードを忘れましたか？
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
