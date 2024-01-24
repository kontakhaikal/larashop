<script setup lang="ts">
import { ExclamationCircle } from "./icons";

const props = defineProps<{ message: string }>();
</script>

<template>
    <div class="flex gap-x-1 bg-red-50 p-3 rounded-md text-red-500">
        <div>
            <ExclamationCircle class="w-5 h-5" />
        </div>
        <p class="text-sm">{{ props.message }}</p>
    </div>
</template>
