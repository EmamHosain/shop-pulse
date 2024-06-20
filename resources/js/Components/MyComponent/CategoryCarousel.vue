<script setup>
import { Link, usePage, router } from '@inertiajs/vue3'
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


const categories = usePage().props.categories.data;

const getProductsByCategory = (slug) => {
    router.get(route('page.productsByCategory', slug), '', {
        preserveState: true,
        preserveScroll: true,
        replace: true,
        onError: (errors) => {
            console.log('carousel category errors', errors)
        }
    });
}



</script>
<template>
    <div class="container">

        <Carousel v-bind="settings" :autoplay="2000" :breakpoints="breakpoints" :wrap-around="true">

            <!-- item start -->
            <Slide v-for="category in categories" :key="category.id" class="flex flex-col">
                <div class="carousel__item flex flex-col items-center justify-center">

                    <Link class=" block w-full item " :href="route('page.productsByCategory', category.slug)">
                    <img src="../../../assets/images-1/blog_img4.jpg" class="image" alt="">
                    </Link>

                </div>
                <a @click="getProductsByCategory(category.slug)" href="#"
                    class="block text-center text-xs uppercase font-bold hover:text-blue-500"> {{
                        category.cat_name }}
                </a>
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

.image:hover {
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
  

  