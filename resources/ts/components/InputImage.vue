<script setup lang="ts">
import { computed } from "vue";
import { Pencil, PlusCircle } from "./icons";

const model = defineModel<File>();

const img = computed(() => {
    if (model.value !== null) {
        return URL.createObjectURL(model.value);
    }
    return null;
});
</script>

<template>
    <div
        class="group border w-[22rem] h-[22rem] rounded-md relative grid place-items-center cursor-pointer"
    >
        <img class="pointer-events-none rounded-md z-0" :src="img" />
        <div
            class="absolute bg-white p-2 rounded-full group-hover:opacity-50 opacity-0 transition-all"
            :class="{ 'opacity-100': img == null }"
        >
            <PlusCircle v-if="img == null" class="w-6 h-6" />
            <Pencil v-else class="w-6 h-6" />
        </div>
        <input
            class="absolute w-full h-full top-0 cursor-pointer z-10 opacity-0"
            @change="model = ($event.target as HTMLInputElement).files[0]"
            accept="image/*"
            type="file"
        />
    </div>
</template>
