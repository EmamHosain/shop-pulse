<script setup>
import { computed } from 'vue';
import { router, usePage, Link } from '@inertiajs/vue3';
import WishListIcon from '../Icons/WishListIcon.vue';
import useProduct from '@/Composables/useProduct';

const props = defineProps({
    productItems: Array,
})
const { addToCart, addToWishList } = useProduct();
const getProductDetails = (slug) => {
    router.get(`${route('page.productDetails')}?product=${slug}`, '', {
        preserveState: true
    })
}

</script>
<template>
    <article v-for="product, index in productItems" :key="index"
        class="relative flex flex-col justify-between overflow-hidden rounded-lg border hover:-translate-y-2 transition-all">
        <div @click="getProductDetails(product.slug)" class="aspect-square overflow-hidden cursor-pointer">
            <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-125"
                src="../../../assets/images-1/el_img12.jpg" alt="" />
        </div>

        <div class="absolute top-0 m-2 rounded-full bg-white">
            <p
                class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3">
                Sale</p>
        </div>

        <div class="my-4 mx-auto flex w-10/12 flex-col items-start justify-between">
            <div class="mb-2 flex">
                <!-- discount price -->
                <p class="mr-3 text-sm font-semibold">{{ product.discount_price == 0 ? product.price : product.discount_price }} Tk</p>

                <!-- price -->
                <del v-if="product.discount_price" class="text-xs text-gray-400"> {{ product.price }} Tk</del>
            </div>
            <Link as="button" :href="`${route('page.productDetails')}?product=${product.slug}`"
                class="mb-2 text-sm text-gray-400 cursor-pointer text-left">{{
                    product.title
                }} {{ product.id }}</Link>
        </div>

        <div class="mx-auto mb-2  h-10 w-10/12 flex items-start">
            <button @click.prevent="addToCart(product.id)" type="button"
                class=" w-4/5 custom-gradient flex justify-center items-center font-bold  uppercase text-sm    overflow-hidden cart-btn text-white p-2">
                add to cart
            </button>
            <button @click.prevent="addToWishList(product.id)"
                class=" text-white flex justify-center items-center w-1/5 wishlist-btn p-2" type="button">
                <WishListIcon class=" font-semibold" :size="20" />
            </button>
        </div>



    </article>
</template>

<style scoped>
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