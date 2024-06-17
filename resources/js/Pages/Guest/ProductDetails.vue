<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import ProductDetailsSection from '../../Components/MyComponent/ProductDetailsSection.vue'

</script>



<template>
    <Head title="Product details" />
    <guest-layout>
        <ProductDetailsSection />
    </guest-layout>
</template>