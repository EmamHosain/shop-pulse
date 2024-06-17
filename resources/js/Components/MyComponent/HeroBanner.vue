<script setup>
import { defineComponent } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'



</script>
  
<template>
    <div class="container ">
        <Carousel :autoplay="2000" :wrap-around="true" :pauseAutoplayOnHover="true">
            <Slide v-for="slide in 4" :key="slide">
                <div class="carousel__item relative">
                    <img src="../../../assets/images-1/banner2.jpg" class="image w-full" alt="">
                </div>
            </Slide>

            <template #addons>
                <Pagination />
            </template>
        </Carousel>
    </div>
</template>

<style scoped>
.carousel__pagination {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
    gap: 8px;
}

.carousel__item {
    width: 100%;
    max-height: 300px;
}

.image {
    /* width: 100%; */
    /* max-width: 100%; */
    /* height: 100%; */
    max-height: 300px;
    object-position: center;
    object-fit: cover;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 10px;

}
.carousel__pagination .carousel__item  .carousel__pagination-button .carousel__pagination-button--active{
    background-color: red;
}
</style>
  
