<script setup lang="ts">
import { computed, reactive, ref } from "vue";
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import ItemCard from "../components/ItemCard.vue";
import { Product } from "./Home.vue";
import RecomendationSection from "../components/RecomendationSection.vue";
import EmailSection from "../components/EmailSection.vue";

export type Cart = {
    id: string;
    items: Item[];
};

export type Item = {
    id: string;
    product: Product;
    quantity: number;
    selected: boolean;
};

const props = defineProps<{ cart: Cart; recommendedProducts: Product[] }>();

const items = ref(props.cart.items);

const selectedItems = computed(() =>
    items.value.filter((item) => item.selected),
);

const totalPrice = computed(() => {
    return selectedItems.value.reduce(
        (total, item) => total + item.product.price * item.quantity,
        0,
    );
});
</script>

<template>
    <Header />
    <main class="pt-16 md:pt-24 lg:pt-32">
        <section class="container px-6 lg:px-0">
            <h1 class="font-semibold text-2xl">My Cart</h1>
            <div class="mt-4 grid md:grid-cols-4 gap-x-4 gap-y-4">
                <ul class="md:col-span-3 flex flex-col gap-y-4 w-full">
                    <li :key="item.id" v-for="item in items">
                        <ItemCard
                            :item="item"
                            v-model:selected="item.selected"
                            v-model:quantity="item.quantity"
                        />
                    </li>
                </ul>
                <div
                    class="sticky top-20 md:col-span-1 flex flex-col gap-y-4 border border-slate-200 rounded-md py-4 px-6 h-fit w-full"
                >
                    <p class="text-xl font-semibold">Order Summary</p>
                    <div class="flex gap-x-4">
                        <p>Total:</p>
                        <p class="font-semibold">${{ totalPrice }}</p>
                    </div>
                    <button
                        class="font-semibold py-2 text-white bg-slate-950 rounded-full w-full"
                    >
                        Checkout ({{ selectedItems.length }})
                    </button>
                </div>
            </div>
        </section>
        <RecomendationSection
            class="mt-6 lg:mt-12"
            :products="props.recommendedProducts"
        />
        <EmailSection />
    </main>
    <Footer />
</template>
