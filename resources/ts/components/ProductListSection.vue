<script setup lang="ts">
import emblaCarouselVue from "embla-carousel-vue";
import type { Product } from "../Pages/Home.vue";
import CategorySection from "./CategorySection.vue";
import ProductCard from "./ProductCard.vue";

const props = defineProps<{ products: Product[] }>();

const [emblaNode] = emblaCarouselVue();
</script>

<template>
    <section
        class="rounded-t-lg flex flex-col lg:flex-row lg:justify-between pt-6 shadow-[0_-26px_20px] shadow-slate-900/30 px-6"
    >
        <h2
            class="font-bold text-4xl md:text-3xl whitespace-nowrap text-center"
        >
            Get All You Need
        </h2>
        <div
            class="border rounded-full border-slate-200 flex items-center w-full mt-6 lg:mt-0 max-w-[42rem]"
        >
            <div class="p-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
            </div>
            <input class="h-full w-full focus:outline-none" type="text" />
            <button
                class="font-semibold py-1.5 px-6 bg-slate-900 text-white m-1 rounded-full"
            >
                Search
            </button>
        </div>
    </section>
    <section class="md:grid grid-cols-4 gap-x-2 md:mt-8 lg:mt-12">
        <CategorySection class="px-4 md:px-0 md:pl-4" />
        <section class="col-span-3 mt-6 md:mt-0">
            <div class="embla overflow-hidden" ref="emblaNode">
                <ul
                    class="embla__container flex gap-x-6 gap-y-12 px-6 md:flex-wrap md:justify-around"
                >
                    <a
                        class="embla__slide"
                        :href="`/products/${product.id}`"
                        v-for="product in props.products"
                    >
                        <ProductCard
                            class="w-full min-w-[240px] md:max-w-[240px]"
                            :product="product"
                        />
                    </a>
                </ul>
            </div>
        </section>
    </section>
    <div class="w-full h-[1px] bg-slate-300 mt-8"></div>
</template>
