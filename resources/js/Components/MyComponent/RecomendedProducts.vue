<script setup>
import SingleProduct from './SingleProduct.vue';
</script>
<template>
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20 ">
        <div class=" px-4 md:px-0  container">
            <div class="py-2">
                <h2 class=" text-2xl font-bold sm:text-3xl uppercase">recomended for you</h2>
            </div>

            <div class="py-4 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4">
                <!-- product here -->
                <SingleProduct v-for="item in 8" :key="item" />

            </div>
        </div>
    </section>
</template>