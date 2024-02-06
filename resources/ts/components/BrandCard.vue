<script setup lang="ts">
import { router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { Brand } from "../fetch/brand";
import Button from "./Button.vue";
import { Pencil, XMark } from "./icons";

const props = defineProps<{
    brand: Brand;
    onDelete?: () => void;
}>();

const updateForm = useForm({
    name: props.brand.name,
});

const isOpen = ref(false);

const inputRef = ref<HTMLInputElement | null>(null);

const change = () => {
    isOpen.value = !isOpen.value;
    if (isOpen.value) {
        inputRef.value?.focus();
    }
};

const updateBrand = () => {
    updateForm.put(`/brands/${props.brand.id}`);
};

const isPending = ref(false);

const deleteBrand = () => {
    router.delete(`/brands/${props.brand.id}`, {
        onStart() {
            isPending.value = true;
        },
        onSuccess() {
            isPending.value = false;
            props.onDelete();
        },
        onError() {
            isPending.value = false;
        },
    });
};
</script>

<template>
    <form class="w-full" @submit.prevent="updateBrand">
        <div class="flex gap-1 justify-between">
            <input
                class="px-2 py-1 rounded-full"
                type="text"
                v-model="updateForm.name"
            />
            <button
                type="button"
                @click="change"
                class="w-8 h-8 rounded-full flex justify-center items-center border border-slate-600 p-1 bg-slate-200"
            >
                <XMark v-if="isOpen" class="w-4 h-4" />
                <Pencil v-else class="w-4 h-4" />
            </button>
        </div>
        <div v-if="isOpen" class="flex justify-end mt-4 gap-x-2">
            <Button
                type="button"
                @click="deleteBrand"
                class="min-w-[6rem]"
                :loading="isPending"
                :disabled="isPending"
                variant="secondary"
                >Delete</Button
            >
            <Button
                type="submit"
                class="min-w-[6rem]"
                :loading="updateForm.processing"
                :disabled="updateForm.processing"
                variant="primary"
                >Save</Button
            >
        </div>
    </form>
</template>
