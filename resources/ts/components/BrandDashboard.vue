<script setup lang="ts">
import { getBrands } from "@/fetch/brand";
import { useForm } from "@inertiajs/vue3";
import { useQuery } from "@tanstack/vue-query";
import BrandCard from "./BrandCard.vue";
import Button from "./Button.vue";
import Input from "./Input.vue";

const {
    data: brands,
    isSuccess,
    refetch,
} = useQuery({
    queryKey: ["brands"],
    queryFn: getBrands,
});

const addBrandForm = useForm({ name: "" });

const adBrand = () => {
    addBrandForm.post("/brands", {
        onSuccess() {
            refetch();
        },
    });
};
</script>

<template>
    <h1 class="font-semibold text-2xl whitespace-nowrap">Brand</h1>
    <div class="mt-6 flex gap-x-4">
        <ul class="flex flex-wrap gap-2 h-fit">
            <li
                class="border p-4 rounded-md h-fit w-fit flex-[1_1_auto]"
                v-if="isSuccess"
                v-for="brand in brands"
            >
                <BrandCard :brand="brand" :on-delete="refetch" />
            </li>
        </ul>
        <div class="border py-6 px-8 rounded-md min-w-[32rem]">
            <h2 class="font-semibold text-xl whitespace-nowrap">Add Brand</h2>
            <form class="mt-8" @submit.prevent="adBrand">
                <Input
                    id="brand-name"
                    label="Name"
                    v-model="addBrandForm.name"
                    active
                />
                <Button
                    type="submit"
                    class="w-full mt-6"
                    @click=""
                    variant="primary"
                    :loading="addBrandForm.processing"
                    >Add</Button
                >
            </form>
        </div>
    </div>
</template>
