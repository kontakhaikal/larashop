<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Button from "../components/Button.vue";
import Error from "../components/Error.vue";
import Input from "../components/Input.vue";

const form = useForm({
    username: "",
    password: "",
    remember: false,
});

const error = ref<{ general?: string }>({});

const submit = () => {
    form.post("/login", {
        onError(errors) {
            error.value = errors;
        },
    });
};
</script>

<template>
    <main class="container flex justify-center">
        <div
            class="border border-slate-200 rounded-lg px-12 py-8 w-full mt-24 max-w-[30rem]"
        >
            <h1 class="text-3xl font-bold text-center">Login</h1>
            <form
                class="w-full flex flex-col gap-y-4 mt-8"
                @submit.prevent="submit"
            >
                <Error v-if="error.general" :message="error.general" />
                <Input
                    id="login-username"
                    label="Username"
                    v-model="form.username"
                />
                <Input
                    id="login-password"
                    label="Password"
                    v-model="form.password"
                />
                <Button
                    :disabled="form.processing"
                    :loading="form.processing"
                    class="mt-4"
                    variant="primary"
                    >Login</Button
                >
            </form>
            <div class="mt-6">
                <p class="text-slate-700 text-center">
                    <span>Don't have an account? </span>
                    <a
                        class="font-semibold text-black hover:underline"
                        href="/register"
                        >Register</a
                    >
                </p>
            </div>
        </div>
    </main>
</template>
