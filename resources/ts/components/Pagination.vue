<script setup lang="ts">
import { computed } from "vue";

const props = defineProps<{ currentPage: number; totalPage: number }>();

const pages = computed<(number | string)[]>(() => {
    return [1, 2, 3, "•••", 8, 9, 10];
});
</script>

<template>
    <div class="flex justify-between items-center">
        <div class="flex gap-x-2">
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        fill-rule="evenodd"
                        d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <p class="font-semibold">Previous</p>
        </div>
        <div class="flex font-semibold">
            <button
                v-for="page in pages"
                class="py-2 px-4 rounded-lg"
                :class="{ 'bg-slate-200': page === props.currentPage }"
            >
                {{ page }}
            </button>
        </div>
        <div class="flex gap-x-2">
            <p class="font-semibold">Next</p>
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
        </div>
    </div>
</template>
