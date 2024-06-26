<script setup>
const props = defineProps({
    errorMessage: String
})
</script>
<template>
    <div>
        <p class="text-red-500 text-xs mt-0.5 font-bold">{{ errorMessage }}</p>
    </div>
</template>