<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import ProductDetailsSection from '../../Components/MyComponent/ProductDetailsSection.vue'

// console.log(usePage().props.slug)
</script>



<template>
    <Head title="Product details" />
    <guest-layout>
        <ProductDetailsSection />
    </guest-layout>
</template>