<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";
import CategoryCarousel from '../../Components/MyComponent/CategoryCarousel.vue'
import HeroBanner from '../../Components/MyComponent/HeroBanner.vue'
import Features from "@/Components/MyComponent/Features.vue";
import RecomendedProducts from '../../Components/MyComponent/RecomendedProducts.vue'
import NewArrivalProducts from "@/Components/MyComponent/NewArrivalProducts.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";



</script>
<template>
    <Head title="Home" />

    <guest-layout>
        <div>
            <main>
                <CategoryCarousel />
                <br>
                <HeroBanner />
                <Features />
                <NewArrivalProducts />
                <div class="container pb-16">
                    <a href="#">
                        <img src="../../../assets/images-1/images/banner/offer.jpg" alt="ads" class="w-full">
                    </a>
                </div>
                <RecomendedProducts />

            </main>

        </div>
    </guest-layout>
</template>
