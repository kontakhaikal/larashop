<script setup lang="ts">
import emblaCarouselVue from "embla-carousel-vue";

import type { Product } from "../Pages/Home.vue";
import ProductCard from "./ProductCard.vue";

const props = defineProps<{ products: Product[] }>();

const [emblaNode, emblaApi] = emblaCarouselVue();

const handleNext = () => {
    if (emblaApi.value.canScrollNext()) {
        emblaApi.value.scrollNext();
    }
};

const handlePrev = () => {
    if (emblaApi.value.canScrollPrev()) {
        emblaApi.value.scrollPrev();
    }
};
</script>

<template>
    <section>
        <div class="flex container justify-between px-6 lg:px-0">
            <p class="font-bold text-4xl">Explore our recomendations</p>
            <div class="hidden md:flex gap-x-4">
                <button
                    @click="handlePrev"
                    class="hover:bg-slate-100 p-2 rounded-lg"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                        />
                    </svg>
                </button>
                <button
                    @click="handleNext"
                    class="hover:bg-slate-100 p-2 rounded-lg"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <div class="embla overflow-hidden mt-12">
            <div class="embla__viewport" ref="emblaNode">
                <ul
                    class="embla__container container flex gap-x-12 px-6 lg:px-0"
                >
                    <ProductCard
                        class="embla__item min-w-[280px]"
                        :key="product.id"
                        v-for="product in props.products"
                        :product="product"
                    />
                </ul>
            </div>
        </div>
    </section>
</template>
