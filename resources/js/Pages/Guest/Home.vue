<script setup>
import { ref, computed } from "vue";
import { Head } from "@inertiajs/vue3";
import CategoryCarousel from '../../Components/MyComponent/CategoryCarousel.vue'
import HeroBanner from '../../Components/MyComponent/HeroBanner.vue'
import Features from "@/Components/MyComponent/Features.vue";
import RecomendedProducts from '../../Components/MyComponent/RecomendedProducts.vue'
import NewArrivalProducts from "@/Components/MyComponent/NewArrivalProducts.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import BrandList from "@/Components/MyComponent/BrandList.vue";


const props = defineProps({ newArrivalProducts: Array });

const newProducts = computed(() => props.newArrivalProducts)



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
                <NewArrivalProducts :new-products="newProducts" />
                <div class="container pb-16">
                    <a href="#">
                        <img src="../../../assets/images-1/images/banner/offer.jpg" alt="ads" class="w-full">
                    </a>
                </div>
                <RecomendedProducts />
                <br>
                <BrandList />
                <br>
            </main>

        </div>
    </guest-layout>
</template>
