<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Button from "../components/Button.vue";
import Error from "../components/Error.vue";
import Input from "../components/Input.vue";

const form = useForm({
    username: "",
    password: "",
});

const errors = ref<{
    username?: string;
    password?: string;
    general?: string;
}>({});

const submit = () => {
    form.post("/register", {
        onError(error) {
            errors.value = error;
        },
    });
};
</script>

<template>
    <main class="container flex justify-center">
        <div
            class="border border-slate-200 rounded-lg px-12 pb-8 py-12 w-full mt-24 max-w-[30rem]"
        >
            <h1 class="text-3xl font-bold text-center">Register Account</h1>

            <form
                class="w-full flex flex-col gap-y-4 mt-10"
                @submit.prevent="submit"
            >
                <Error
                    class="mt-1 mb-2"
                    :message="errors.general"
                    v-if="errors.general"
                />
                <div>
                    <Input
                        id="register-username"
                        label="Username"
                        v-model="form.username"
                    />
                    <Error
                        class="mt-1 mb-2"
                        :message="errors.username"
                        v-if="errors.username"
                    />
                </div>
                <div>
                    <Input
                        id="register-password"
                        label="Password"
                        v-model="form.password"
                    />
                    <Error
                        class="mt-1 mb-2"
                        :message="errors.password"
                        v-if="errors.password"
                    />
                </div>
                <Button
                    :disabled="form.processing"
                    :loading="form.processing"
                    class="mt-4"
                    variant="primary"
                    >Register</Button
                >
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
