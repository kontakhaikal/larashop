<script setup lang="ts">
import AddProductDashboard from "@/components/AddProductDashboard.vue";
import BrandDashboard from "@/components/BrandDashboard.vue";
import Button from "@/components/Button.vue";
import CategoryDashboard from "@/components/CategoryDashboard.vue";
import ProductListDashboard from "@/components/ProductListDashboard.vue";
import { ref } from "vue";

enum Tab {
    Add_Product,
    List_Product,
    Brand,
    Category,
}

const tab = ref<Tab>(Tab.List_Product);
const show = ref(true);
</script>

<template>
    <main class="grid grid-cols-8">
        <section
            class="col-span-1 min-h-screen flex justify-center pt-12 border bg-slate-100"
        >
            <ul class="flex flex-col gap-y-4 w-full px-2 items-start">
                <li class="w-full">
                    <button
                        class="text-start bg-slate-100 w-full font-semibold py-1 rounded-md px-2"
                        @click="show = !show"
                    >
                        Product
                    </button>
                    <ul v-if="show" class="ml-4 flex flex-col gap-y-1 mt-1">
                        <button
                            @click="tab = Tab.Add_Product"
                            class="border py-0.5 px-2 rounded-md"
                        >
                            Add Product
                        </button>
                        <button
                            @click="tab = Tab.List_Product"
                            class="border py-0.5 px-2 rounded-md"
                        >
                            Product List
                        </button>
                    </ul>
                </li>
                <li class="w-full">
                    <button
                        class="text-start bg-slate-100 w-full font-semibold py-1 rounded-md px-2"
                        @click="tab = Tab.Brand"
                    >
                        Brand
                    </button>
                </li>
                <li class="w-full">
                    <button
                        class="text-start bg-slate-100 w-full font-semibold py-1 rounded-md px-2"
                        @click="tab = Tab.Category"
                    >
                        Category
                    </button>
                </li>
            </ul>
        </section>
        <section class="py-12 px-6 col-span-7">
            <ProductListDashboard v-if="tab === Tab.List_Product" />
            <AddProductDashboard v-if="tab === Tab.Add_Product" />
            <BrandDashboard v-if="tab === Tab.Brand" />
            <CategoryDashboard v-if="tab === Tab.Category" />
        </section>
    </main>
</template>
