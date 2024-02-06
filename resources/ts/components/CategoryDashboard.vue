<script setup lang="ts">
import { getCategories } from "@/fetch/category";
import { useForm } from "@inertiajs/vue3";
import { useQuery } from "@tanstack/vue-query";
import Button from "./Button.vue";
import CategoryCard from "./CategoryCard.vue";
import Input from "./Input.vue";

const { data: categories, refetch } = useQuery({
    queryKey: ["categories"],
    queryFn: getCategories,
});

const addForm = useForm({ name: "" });

const addCategory = () => {
    addForm.post("/categories", {
        onSuccess() {
            refetch();
        },
    });
};
</script>

<template>
    <h1 class="font-semibold text-2xl whitespace-nowrap">Category</h1>
    <div class="mt-6 flex gap-x-4">
        <ul class="flex flex-wrap gap-2 h-fit">
            <li
                class="border p-4 h-fit rounded-md flex-[1_1_auto]"
                v-for="category in categories"
            >
                <CategoryCard :category="category" :on-delete="refetch" />
            </li>
        </ul>
        <div class="border py-6 px-8 rounded-md min-w-[32rem]">
            <h2 class="font-semibold text-xl whitespace-nowrap">
                Add Category
            </h2>
            <form class="mt-8" @submit.prevent="addCategory">
                <Input
                    id="category-name"
                    label="Name"
                    v-model="addForm.name"
                    active
                />
                <Button
                    class="w-full mt-6"
                    @click=""
                    variant="primary"
                    :loading="addForm.processing"
                    >Add</Button
                >
            </form>
        </div>
    </div>
</template>
