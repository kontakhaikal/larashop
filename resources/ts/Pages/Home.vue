<script setup lang="ts">
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import ProductListSection from "../components/ProductListSection.vue";
import EmailSection from "../components/EmailSection.vue";
import CategorySection from "../components/CategorySection.vue";
import BannerSection from "../components/BannerSection.vue";
import RecomendationSection from "../components/RecomendationSection.vue";

export type Product = {
    id: string;
    name: string;
    price: number;
    image: string;
    score: number;
    reviews: number;
};

const props = defineProps<{ products: Product[] }>();
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
            <RecomendationSection :products="props.products" />
            <EmailSection />
        </main>
    </main>
    <Footer />
</template>
