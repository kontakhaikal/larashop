<script setup lang="ts">
import { getCategories } from "@/fetch/category";
import { useForm } from "@inertiajs/vue3";
import { useQuery } from "@tanstack/vue-query";
import Button from "./Button.vue";
import Input from "./Input.vue";

const {
    data: categories,
    isSuccess,
    refetch,
} = useQuery({
    queryKey: ["categories"],
    queryFn: getCategories,
});

const form = useForm({ name: "" });

const submit = () => {
    form.post("/categories", {
        onSuccess() {
            refetch();
        },
    });
};
</script>

<template>
    <h1 class="font-semibold text-2xl whitespace-nowrap">Category</h1>
    <div class="mt-6 grid grid-cols-3 pr-24">
        <ul class="col-span-2 flex gap-4">
            <li
                class="border py-2 px-4 rounded-md h-fit w-fit"
                v-if="isSuccess"
                v-for="brand in categories"
            >
                {{ brand.name }}
            </li>
        </ul>
        <div class="border py-6 px-8 rounded-md">
            <h2 class="font-semibold text-xl whitespace-nowrap">
                Add Category
            </h2>
            <form class="mt-8" @submit.prevent="submit">
                <Input
                    id="category-name"
                    label="Name"
                    v-model="form.name"
                    active
                />
                <Button
                    class="w-full mt-6"
                    @click=""
                    variant="primary"
                    :loading="form.processing"
                    >Add</Button
                >
            </form>
        </div>
    </div>
</template>
