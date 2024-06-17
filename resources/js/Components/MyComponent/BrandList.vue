<script setup>
import { Carousel, Navigation, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'


const settings = {
    itemsToShow: 1,
    snapAlign: 'center',
}


const breakpoints = {
    300: {
        itemsToShow: 3,
        snapAlign: 'center',
    },
    // 700px and up
    700: {
        itemsToShow: 5,
        snapAlign: 'center',
    },
    // 1024 and up
    1024: {
        itemsToShow: 7,
        snapAlign: 'start',
    },
}


</script>
<template>
    <div class="container mb-4 px-3 md:px-0">



        <h3 class=" capitalize mb-4 text-xl">most popular brand</h3>
        <Carousel class="py-6 brand-container" v-bind="settings" :autoplay="2000" :wrap-around="true"
            :pauseAutoplayOnHover="true" :breakpoints="breakpoints">

            <Slide v-for="slide in 10" :key="slide">
                <div class="carousel__item">
                    <div class="brand">
                        <img src="../../../assets/images-1/about_img.jpg" alt="Brand 1"
                            class="max-h-16 max-w-xs mx-auto hover:scale-110 transition-transform duration-300" />
                    </div>
                </div>
            </Slide>


            <template #addons>
                <!-- <Navigation /> -->
            </template>
        </Carousel>




    </div>
</template>
<style scoped>
.brand-container {
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 5px;

}
</style>