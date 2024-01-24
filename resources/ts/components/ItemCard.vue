<script setup lang="ts">
import { ref } from "vue";
import type { Item } from "../Pages/Cart.vue";
const props = defineProps<{ item: Item }>();

const quantity = defineModel<number>("quantity", { required: true });
const selected = defineModel<boolean>("selected", { required: true });

const add = () => quantity.value++;

const substract = () => quantity.value--;
</script>

<template>
    <div
        class="border border-slate-200 rounded-lg p-6 flex flex-col justify-between gap-x-4 gap-y-6"
    >
        <div class="flex gap-x-4">
            <input
                class="border border-slate-900 w-4 h-4 bg-white checked:bg-slate-950 checked:text-white"
                type="checkbox"
                :value="selected"
                @click="selected = !selected"
            />

            <div class="flex gap-x-4 w-full">
                <div
                    class="w-[6rem] h-[6rem] rounded-md grid place-items-center bg-slate-200"
                >
                    <img
                        class="w-full h-full"
                        :src="props.item.product.image"
                        alt=""
                    />
                </div>
                <div>
                    <p class="font-semibold text-2xl">
                        {{ props.item.product.name }}
                    </p>
                    <p class="font-semibold text-lg">
                        ${{ props.item.product.price }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-y-2">
            <div class="ml-auto text-slate-500 flex gap-x-4 items-center w-fit">
                <p class="text-sm">Subtotal:</p>
                <p class="text-lg font-semibold text-black">
                    ${{ props.item.product.price * quantity }}
                </p>
            </div>
            <div class="flex gap-x-4 items-center justify-end">
                <button
                    class="rounded-full font-semibold text-sm py-1.5 px-4 bg-red-100 border border-red-500"
                >
                    Delete
                </button>

                <div class="flex border border-slate-200 rounded-md">
                    <button
                        :disabled="quantity <= 0"
                        @click="substract"
                        class="px-3 hover:bg-slate-200 py-1 rounded-l-md"
                    >
                        -
                    </button>
                    <input
                        v-model="quantity"
                        class="text-center max-w-[4rem]"
                        type="number"
                    />
                    <button
                        :disabled="props.item.product.stock <= quantity"
                        @click="add"
                        class="px-3 hover:bg-slate-200 py-1 rounded-r-md"
                    >
                        +
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
