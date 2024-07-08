<script setup>

import { Carousel, Pagination, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'
import useProduct from '../../Composables/useProduct'
import { router } from '@inertiajs/vue3'
const porps = defineProps({ catSliders: Array })
// const { getProductsByCategory } = useProduct();


const getProductsByCategory = (slug) => {
    router.get(`${route('page.productsByCategory')}?category=${slug}`, '', {
        preserveState: true,
        // preserveScroll: true,
        onError: (errors) => {
            console.log('carousel category errors', errors)
        }
    });
}

</script>
  
<template>
    <div class="container ">
        <Carousel :autoplay="2000" :wrap-around="true" :pauseAutoplayOnHover="true">
            <Slide v-for="slider in catSliders" :key="slider">
                <div class="carousel__item relative">
                    <img @click="getProductsByCategory(slider.slug)" :src="`/storage/${slider.cat_slider}`"
                        class="image w-full max-h-36 md:max-h-96 cursor-pointer " :alt="slider.cat_name">
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
    /* max-height: 300px; */
    object-fit: fill;
    object-position: center;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 10px;

}

.carousel__pagination .carousel__item .carousel__pagination-button .carousel__pagination-button--active {
    background-color: red;
}
</style>
  
