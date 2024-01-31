<script setup lang="ts">
import { getBrands } from "@/fetch/brand";
import { getCategories } from "@/fetch/category";
import { useForm } from "@inertiajs/vue3";
import { useQuery } from "@tanstack/vue-query";
import Button from "./Button.vue";
import InputImage from "./InputImage.vue";

type FormSchema = {
    name: string;
    description: string;
    category_id: string;
    brand_id: string;
    image: File;
    stock: number;
    price: number;
};

const form = useForm<FormSchema>({
    name: "",
    description: "",
    category_id: "",
    brand_id: "",
    image: null,
    stock: 1,
    price: 0,
});

const submit = () => {
    // form.post("/products");
    console.log({ data: form.data() });
};

const { data: brands } = useQuery({
    queryKey: ["brands"],
    queryFn: getBrands,
});

const { data: categories } = useQuery({
    queryKey: ["categories"],
    queryFn: getCategories,
});
</script>

<template>
    <h1 class="font-semibold text-2xl whitespace-nowrap">Add Product</h1>
    <form
        class="mt-4 w-full grid grid-cols-2 gap-x-4 gap-y-3"
        @submit.prevent="submit"
    >
        <div class="flex flex-col gap-y-4">
            <div class="flex flex-col">
                <label for="product-name">Name</label>
                <input
                    v-model="form.name"
                    id="product-name"
                    class="border rounded-md px-2 py-1"
                    type="text"
                />
            </div>
            <div class="flex gap-x-4">
                <div class="flex flex-col">
                    <label for="product-brand">Brand</label>
                    <select
                        class="bg-white border px-3 py-2 rounded-md"
                        name="brand_id"
                        id="product-brand"
                        v-model="form.brand_id"
                    >
                        <option v-for="brand in brands" :value="brand.id">
                            {{ brand.name }}
                        </option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="product-category">Category</label>
                    <select
                        id="product-category"
                        name="category_id"
                        v-model="form.category_id"
                        class="bg-white border px-3 py-2 rounded-md"
                    >
                        <option
                            v-for="category in categories"
                            :value="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="product-price">Price</label>
                <input
                    v-model="form.price"
                    id="product-price"
                    class="border rounded-md px-2 py-1"
                    type="text"
                />
            </div>
            <div class="flex flex-col">
                <label for="product-stock">Stock</label>
                <input
                    v-model="form.stock"
                    id="product-stock"
                    class="border rounded-md px-2 py-1"
                    type="text"
                />
            </div>
            <div class="flex flex-col">
                <label for="product-description">Description</label>
                <textarea
                    id="product-description"
                    name="description"
                    v-model="form.description"
                    class="border rounded-md px-2 py-1"
                ></textarea>
            </div>

            <Button
                type="submit"
                class="mt-4"
                variant="primary"
                :loading="form.processing"
                >Add</Button
            >
        </div>
        <InputImage v-model="form.image" />
    </form>
</template>
