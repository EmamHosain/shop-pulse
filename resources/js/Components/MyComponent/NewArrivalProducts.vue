<script setup>
import { Carousel, Navigation, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'
import WishListIcon from '../../Components/Icons/WishListIcon.vue'
import useProduct from '../../Composables/useProduct'
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({ newProducts: Array })
const { addToCart, addToWishList } = useProduct();

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

                <Slide class="" v-for="product in newProducts" :key="product.id">
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
                                    <!-- discount price -->
                                    <p class="mr-3 text-sm font-semibold">{{ product.discount_price ?? product.price }}</p>

                                    <!-- price -->
                                    <del v-if="product.discount_price" class="text-xs text-gray-400"> {{ product.price }}
                                    </del>
                                </div>
                                <Link as="button" :href="`${route('page.productDetails')}?product=${product.slug}`"
                                    class="mb-2 text-sm text-gray-400 cursor-pointer">{{
                                        product.title
                                    }} {{ product.id }}</Link>
                            </div>

                            <div class="mx-auto mb-2  h-10 w-10/12 flex items-start">
                                <button @click.prevent="addToCart(product.id)" type="button"
                                    class=" w-4/5 custom-gradient flex justify-center items-center font-bold  uppercase text-sm    overflow-hidden cart-btn text-white p-2">
                                    add to cart
                                </button>
                                <button @click.prevent="addToWishList(product.id)"
                                    class=" text-white flex justify-center items-center w-1/5 wishlist-btn p-2"
                                    type="button">
                                    <WishListIcon class=" font-semibold" :size="20" />
                                </button>
                            </div>


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

.custom-gradient {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);
    transition: 0.3s all;
}

.cart-btn {
    border-radius: 3px 0px 0px 3px;
}

.wishlist-btn {
    transition: 0.3s all;
    background: linear-gradient(90deg, #1d61ad, #4d99d6);
    border-radius: 0px 3px 3px 0px;
}

.wishlist-btn:hover {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);

}

.cart-btn:hover {
    background: linear-gradient(90deg, #1d61ad, #4d99d6);

}
</style>