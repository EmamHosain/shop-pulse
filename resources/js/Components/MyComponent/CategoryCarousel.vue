<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import { defineComponent } from 'vue'
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

const settings = {
    itemsToShow: 1,
    snapAlign: 'center',
}
const breakpoints = {

    400: {
        itemsToShow: 6,
        snapAlign: 'start',
    },
    // 768px and up
    768: {
        itemsToShow: 6,
        snapAlign: 'start',
    },
    // 1024 and up
    1024: {
        itemsToShow: 10,
        snapAlign: 'start',
    },
}




</script>
<template>
    <div class="container">
       
        <Carousel v-bind="settings" :autoplay="2000" :breakpoints="breakpoints" :wrap-around="true">

            <!-- item start -->
            <Slide v-for="slide in 20" :key="slide" class="flex flex-col">
                <div class="carousel__item flex flex-col items-center justify-center">

                    <Link class=" block w-full item " href="#">
                        <img src="../../../assets/images-1/blog_img4.jpg" class="image" alt="">
                    </Link>

                </div>
                <Link href="#" class="block text-center text-xs uppercase font-bold hover:text-blue-500">product {{ slide }}</Link>
            </Slide>
            <!-- item end -->

            <template #addons>
                <!-- <Pagination /> -->
            </template>
        </Carousel>
    </div>
</template>


<style scoped>
.carousel__item {
    /* width: 100%;
    height: 100%; */
    /* background-color: aqua; */
}


.item {
    /* border: 1px solid black; */
    width: 100%;
    height: 140px;
    padding: 1rem;

}

.image {
    width: 100%;
    height: 100%;
    object-position: center;
    object-fit: cover;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 50%;
    transition: 0.3s all;
}
.image:hover{
    scale: 0.9;
}

@media only screen and (max-width: 600px) {
    .item {
        height: 80px;
        padding: 0.4rem;

    }

    .image {}
}
</style>
  

  