<script setup lang="ts">
import { getProducts } from "@/fetch/product";
import { useQuery } from "@tanstack/vue-query";

const { data: products } = useQuery({
    queryKey: ["products"],
    queryFn: getProducts,
});
</script>

<template>
    <div>
        <ul class="flex flex-col gap-y-2">
            <li class="border p-4 rounded-md flex" v-for="product in products">
                <div class="w-[4rem] h-[4rem]">
                    <img :src="product.image" alt="" />
                </div>
                <div>
                    <p>{{ product.name }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>
