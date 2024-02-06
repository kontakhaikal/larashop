<script setup lang="ts">
import { router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { Category } from "../fetch/category";
import Button from "./Button.vue";
import { Pencil, XMark } from "./icons";

const props = defineProps<{
    category: Category;
    onDelete: () => void;
}>();

const isOpen = ref(false);

const inputRef = ref<HTMLInputElement | null>(null);

const change = () => {
    isOpen.value = !isOpen.value;
    if (isOpen.value) {
        inputRef.value?.focus();
    }
};

const updateForm = useForm({
    name: props.category.name,
});

const updateCategory = () => {
    updateForm.put(`/categories/${props.category.id}`, {
        onSuccess() {
            isOpen.value = false;
        },
        onError() {
            updateForm.reset();
        },
    });
};

const isPending = ref(false);

const deleteCategory = () => {
    router.delete(`/categories/${props.category.id}`, {
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
    <form class="w-full" @submit.prevent="updateCategory">
        <div class="flex gap-1 justify-between">
            <input
                ref="inputRef"
                class="px-3 py-1 rounded-full"
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
                @click="deleteCategory"
                type="button"
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
