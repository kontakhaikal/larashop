<script setup lang="ts">
const props = defineProps<{
    variant: "primary" | "secondary";
    loading: boolean;
}>();
</script>

<template>
    <button
        :class="{
            'bg-slate-50 text-slate-950 border border-slate-200 hover:bg-slate-100':
                props.variant === 'secondary',
            'bg-slate-950 hover:bg-slate-900 text-white':
                props.variant === 'primary',
        }"
        class="rounded-full py-2 px-3 font-semibold flex justify-center"
        v-bind="props"
    >
        <slot v-if="!props.loading"></slot>
        <svg
            v-if="props.loading"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="animate-spin"
        >
            <path d="M21 12a9 9 0 1 1-6.219-8.56" />
        </svg>
    </button>
</template>
