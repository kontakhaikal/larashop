<script setup lang="ts">
import { computed, ref } from "vue";

const props = defineProps<{ id: string; label: string }>();

const model = defineModel<string, string>({ required: true });

const focus = ref(false);

const show = computed(() => model.value.trim().length > 0 || focus.value);
</script>

<template>
    <div
        :class="{ 'border-2 border-slate-950': focus }"
        class="relative border border-slate-200 rounded-lg py-3 px-2"
    >
        <label
            :class="{ '-translate-y-6 text-sm': show }"
            class="absolute bg-white px-1 transition-all text-slate-700 pointer-events-none"
            :for="props.id"
            >{{ props.label }}</label
        >
        <input
            :id="props.id"
            @focus="focus = true"
            @blur="focus = false"
            class="w-full h-full focus:outline-none"
            type="text"
            v-model="model"
        />
    </div>
</template>
