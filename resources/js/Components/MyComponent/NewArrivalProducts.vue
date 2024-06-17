<script setup>
import { Carousel, Navigation, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'


const settings = {
    itemsToShow: 1,
    snapAlign: 'center',
}


const breakpoints = {
    400: {
        itemsToShow: 2,
        snapAlign: 'start',
    },
    // 700px and up
    768: {
        itemsToShow: 3,
        snapAlign: 'center',
    },
    // 1024 and up
    1024: {
        itemsToShow: 4,
        snapAlign: 'start',
    },
}



</script>
<template>
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20 ">
        <div class=" px-4 md:px-0  new-arrival-products-container">
            <div class="p-2">
                <h2 class=" text-2xl font-bold sm:text-3xl uppercase">top new arrival products</h2>
            </div>





            <!-- <div class=" grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 mt-4"> -->
            <Carousel class="flex gap-x-4" v-bind="settings" :breakpoints="breakpoints">

                <Slide class="" v-for="slide in 10" :key="slide">
                    <div class="carousel__item p-2">

                        <article
                            class="relative flex flex-col overflow-hidden rounded-lg border cursor-pointer hover:-translate-y-2 transition-all">
                            <div class="aspect-square overflow-hidden">
                                <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-125"
                                    src="../../../assets/images-1/el_img8.jpg" alt="" />
                            </div>
                            <div class="absolute top-0 m-2 rounded-full bg-white">
                                <p
                                    class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3">
                                    Sale</p>
                            </div>
                            <div class="my-4 mx-auto flex w-10/12 flex-col items-start justify-between">
                                <div class="mb-2 flex">
                                    <p class="mr-3 text-sm font-semibold">$99.00</p>
                                    <del class="text-xs text-gray-400"> $79.00 </del>
                                </div>
                                <h3 class="mb-2 text-sm text-gray-400">Fresh Apples</h3>
                            </div>
                            <button
                                class="group mx-auto mb-2 flex h-10 w-10/12 items-stretch overflow-hidden rounded-md text-gray-600">
                                <div
                                    class="flex w-full items-center justify-center bg-gray-100 text-xs uppercase transition group-hover:bg-emerald-600 group-hover:text-white">
                                    Add</div>
                                <div
                                    class="flex items-center justify-center bg-gray-200 px-5 transition group-hover:bg-emerald-500 group-hover:text-white">
                                    +</div>
                            </button>
                        </article>




                    </div>
                </Slide>


                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
            <!-- </div> -->










        </div>
    </section>
</template>


<style scoped>
.new-arrival-products-container {
    max-width: 1420px;
    margin: auto;
}
</style>