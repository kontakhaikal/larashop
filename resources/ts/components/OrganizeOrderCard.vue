<script setup lang="ts">
import { ref } from "vue";
import type { Product } from "../Pages/Home.vue";

const props = defineProps<{ product: Product }>();

const count = ref(1);

const add = () => count.value++;

const substract = () => count.value--;
</script>

<template>
    <div
        class="flex flex-col gap-y-6 border border-slate-200 rounded-md py-5 px-8 h-min"
    >
        <p class="font-semibold whitespace-nowrap text-xl">Organize order</p>
        <div class="flex items-center gap-x-4">
            <img
                class="w-[4rem] h-[4rem] bg-slate-200 rounded-sm"
                :src="props.product.image"
                :alt="props.product.name"
            />
            <div>
                <p class="font-semibold">{{ props.product.name }}</p>
                <p class="font-semibold text-2xl">${{ props.product.price }}</p>
            </div>
        </div>
        <div class="flex gap-x-12 items-center">
            <div class="flex border border-slate-200 rounded-md">
                <button
                    :disabled="count <= 0"
                    @click="substract"
                    class="px-3 hover:bg-slate-200 py-1 rounded-l-md"
                >
                    -
                </button>
                <input
                    v-model="count"
                    class="text-center w-full"
                    type="number"
                />
                <button
                    :disabled="product.stock <= count"
                    @click="add"
                    class="px-3 hover:bg-slate-200 py-1 rounded-r-md"
                >
                    +
                </button>
            </div>
            <p class="whitespace-nowrap">Stock: {{ props.product.stock }}</p>
        </div>
        <div class="flex justify-between">
            <p>Subtotal:</p>
            <p>${{ product.price * count }}</p>
        </div>

        <div class="flex flex-col gap-y-2">
            <button
                class="bg-slate-100 rounded-full border border-slate-200 py-2 font-semibold text-sm"
            >
                Add to Chart
            </button>
            <button
                class="bg-slate-950 text-white rounded-full py-2 font-semibold text-sm"
            >
                Buy Now
            </button>
        </div>
    </div>
</template>
