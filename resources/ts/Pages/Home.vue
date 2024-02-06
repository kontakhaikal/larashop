<script setup lang="ts">
import BannerSection from "../components/BannerSection.vue";
import EmailSection from "../components/EmailSection.vue";
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import ProductListSection from "../components/ProductListSection.vue";
import RecomendationSection from "../components/RecomendationSection.vue";

export type Product = {
    id: string;
    name: string;
    price: number;
    image: string;
    description: string;
    score: number;
    reviews: number;
    stock: number;
};

const props = defineProps<{
    products: Product[];
    recommendedProducts: Product[];
}>();
</script>

<template>
    <Header />
    <main>
        <main>
            <BannerSection />
            <section
                class="container z-10 bg-white -translate-y-[5rem] rounded-t-lg"
            >
                <ProductListSection :products="props.products" />
            </section>
            <RecomendationSection :products="props.recommendedProducts" />
            <EmailSection />
        </main>
    </main>
    <Footer />
</template>
