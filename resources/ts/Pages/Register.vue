<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import Button from "../components/Button.vue";
import Input from "../components/Input.vue";

const form = useForm({
    username: "",
    password: "",
});
</script>

<template>
    <main class="container flex justify-center">
        <div
            class="border border-slate-200 rounded-lg px-12 py-8 w-full mt-24 max-w-[30rem]"
        >
            <h1 class="text-3xl font-bold text-center">Register Account</h1>
            <form class="w-full flex flex-col gap-y-4 mt-8" @submit.prevent="">
                <Input label="Username" v-model="form.username" />
                <Input label="Password" v-model="form.password" />
                <Button class="mt-4" variant="primary">Register</Button>
            </form>
            <div class="mt-6">
                <p class="text-slate-700 text-center">
                    <span>Already have an account? </span>
                    <a
                        class="font-semibold text-black hover:underline"
                        href="/login"
                        >Login</a
                    >
                </p>
            </div>
        </div>
    </main>
</template>
