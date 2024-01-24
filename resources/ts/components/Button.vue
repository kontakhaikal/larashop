<script setup lang="ts">
const props = defineProps<{ variant: "primary" | "secondary" }>();
</script>

<template>
    <button
        :class="{
            'bg-slate-50 text-slate-950 border border-slate-200 hover:bg-slate-100':
                props.variant === 'secondary',
            'bg-slate-950 hover:bg-slate-900 text-white':
                props.variant === 'primary',
        }"
        class="rounded-full py-2 px-3 font-semibold"
        v-bind="props"
    >
        <slot></slot>
    </button>
</template>
