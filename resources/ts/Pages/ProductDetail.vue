<script setup lang="ts">
import { Ref, ref } from "vue";
import EmailSection from "../components/EmailSection.vue";
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import RecomendationSection from "../components/RecomendationSection.vue";
import type { Product } from "./Home.vue";
import OrganizeOrderCard from "../components/OrganizeOrderCard.vue";

const props = defineProps<{ products: Product[]; product: Product }>();

const product: Ref<Product> = ref(props.product);

const activeImage = ref(product.value.image);

const images = ref(Array(4).fill(product.value.image));
</script>

<template>
    <Header />
    <main class="pt-16 md:pt-24 lg:pt-32">
        <section
            class="container flex flex-col lg:flex-row gap-x-6 gap-y-6 px-6 lg:px-0"
        >
            <div class="flex flex-col lg:max-w-[30rem]">
                <div
                    class="w-full h-full rounded-lg bg-slate-200 grid place-items-center"
                >
                    <img :src="activeImage" alt="" />
                </div>
                <div class="flex gap-x-2 mt-2">
                    <div
                        v-for="image in images"
                        class="rounded-md border bg-slate-200 p-1"
                    >
                        <img
                            class="w-full h-full object-contain"
                            :src="image"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <div class="">
                <h1 class="text-3xl font-bold mt-4 sm:mt-0">
                    {{ product.name }}
                </h1>
                <div class="flex justify-between items-center">
                    <div class="flex gap-x-1 mt-2 items-center">
                        <svg
                            class="text-yellow-500 w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <div class="text-slate-500 text-sm">
                            {{ product.score }}
                            ({{ product.reviews }} Reviews)
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="font-bold mt-4">Description</p>
                    <div class="mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Architecto numquam nam eligendi!
                    </div>
                </div>
            </div>
            <OrganizeOrderCard :product="product" />
        </section>
        <RecomendationSection class="mt-8" :products="props.products" />
        <EmailSection />
    </main>
    <Footer />
</template>
