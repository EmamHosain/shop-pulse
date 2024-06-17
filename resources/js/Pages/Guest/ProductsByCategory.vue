<script setup>
import { Head } from "@inertiajs/vue3";
import GuestLayout from '@/Layouts/GuestLayout.vue';
import BreadcrumbSection from "@/Components/MyComponent/BreadcrumbSection.vue";
import SortProducts from '../../Components/MyComponent/SortProducts.vue'
import Category from "@/Components/MyComponent/Category.vue";




</script>

<template>
    <Head title="products by category" />
    <guest-layout>
        <div>
            <div class="container">

                <Category />




            </div>







            <br>

            <div class="container flex justify-end">
                <BreadcrumbSection :link="'category'" />
            </div>


            <br>


            <div class="container my-16">
                <a href="#">
                    <img src="../../../assets/images-1/images/banner/offer.jpg" alt="ads" class="w-full rounded-lg">
                </a>
            </div>
            <br>
            <SortProducts />

        </div>

    </guest-layout>
</template>
