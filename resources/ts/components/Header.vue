<script setup lang="ts">
import { computed, onMounted, onUnmounted, ref } from "vue";

const state = ref(false);

const screenSize = ref<number>(window.innerWidth);

const watchScreenSize = () => {
    screenSize.value = window.innerWidth;
};

onMounted(() => {
    window.addEventListener("resize", watchScreenSize);
});

onUnmounted(() => {
    window.removeEventListener("resize", watchScreenSize);
});

const active = computed(() => {
    if (screenSize.value >= 768) {
        return true;
    }
    return state.value;
});
</script>

<template>
    <header class="fixed w-full z-20">
        <div
            class="container px-6 flex flex-col md:flex-row bg-white items-center py-3 md:rounded-b-lg shadow"
        >
            <div class="flex items-center justify-between w-full md:w-fit">
                <div class="md:block text-2xl font-bold">LARASHOP</div>
                <button @click="state = !state" class="burger">
                    <div :class="{ active }"></div>
                    <div :class="{ active }"></div>
                    <div :class="{ active }"></div>
                </button>
            </div>

            <div
                class="mx-auto md:ml-auto md:mr-0 mt-8 md:mt-0 flex flex-col md:flex-row justify-center md:justify-between md:items-center w-full md:w-[65%] lg:w-[60%]"
                :class="{ hidden: !active }"
            >
                <nav
                    class="order-2 md:order-1 flex flex-col md:flex-row gap-x-12 font-semibold gap-y-6 text-center p-6 md:p-0"
                >
                    <a class="active" href="">Home</a>
                    <a href="">Blog</a>
                    <a href="">Shop</a>
                </nav>
                <div
                    class="order-1 md:order-2 flex items-center gap-x-6 mx-auto md:m-0"
                >
                    <button class="rounded-full border border-slate-200 p-2">
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
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                            />
                        </svg>
                    </button>
                    <button class="rounded-full border border-slate-200 p-2">
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
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                            />
                        </svg>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full bg-slate-500"
                    ></button>
                </div>
            </div>
        </div>
    </header>
</template>

<style>
button.burger {
    @apply flex md:hidden flex-col gap-y-1;
}
button.burger > div {
    @apply transition-all h-[4px] w-[28px] bg-slate-950 rounded-full;
}

button.burger > div:nth-child(2) {
    @apply w-[20px];
}
button.burger > div:first-child.active {
    @apply rotate-45 origin-[3px];
}
button.burger > div:nth-child(2).active {
    @apply scale-0;
}
button.burger > div:last-child.active {
    @apply -rotate-45 origin-[3px] -translate-y-[0.5px];
}
</style>
