<script setup>
import { computed } from 'vue';
import Teliphone from '../Icons/Teliphone.vue';
import MainLogo from './MainLogo.vue';
import SearchIcon from '../Icons/SearchIcon.vue';
import WishListIcon from '../Icons/WishListIcon.vue';
import CartIcon from '../Icons/CartIcon.vue';
import { router, usePage } from '@inertiajs/vue3';

const cartCount = computed(() => usePage().props.cart.data.count);
const wishlistCount = computed(() => usePage().props.wishlist.data.count);







const goToWishlist = () => {
    router.get(route('page.wishlist'), '', {
        onError: (errors) => {
            console.log('error', errors)
        }
    })
}
const goToCheckout = () => {
    router.get(route('page.checkout'), '', {
        onError: (errors) => {
            console.log('error', errors)
        }
    })
}







</script>
<template>
    <header class="">
        <!-- top first srart -->
        <div style="background-color: #f5f6f8">
            <div class="container px-4 md:px-0 flex justify-between py-4 items-center">
                <p class="uppercase text-xs font-bold" style="color: rgb(51, 51, 51)">
                    welcome to othoba.com
                </p>
                <p class="flex gap-x-2 items-center text-xs font-bold">
                    <span>
                        <Teliphone />
                    </span>
                    +880 1626691836
                </p>
            </div>
        </div>
        <!-- top first end -->

        <!-- top second start -->
        <div class="custom-gradient">
            <div class="container mx-auto py-6 flex flex-col md:flex-row md:justify-between items-center">
                <!-- Logo Section -->
                <div class="md:w-1/3 sm:w-full mb-4 md:mb-0 flex justify-center md:justify-start">
                    <MainLogo class="text-white" />
                </div>

                <!-- Search Form Section -->
                <div class="lg:w-1/3 sm:w-full mb-4 md:mb-0 flex justify-center md:justify-center">
                    <form class="w-full max-w-md">
                        <div class="flex">
                            <input class="w-full ring-0 outline-none p-2" type="text" placeholder="search" />
                            <button style="background-color: #0d70d1" type="submit"
                                class="px-6 py-2 flex items-center justify-center border outline-none text-white hover:scale-95 transition-transform">
                                <SearchIcon class="text-white" :size="22" />
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Wishlist and Cart Section -->
                <div class="lg:w-1/3 sm:w-full flex justify-center md:justify-end gap-x-4">
                    <!-- Wishlist -->
                    <div @click="goToWishlist()" class="flex flex-col justify-center items-center relative cursor-pointer">
                        <div class="absolute -top-1 left-6">
                            <p style="background-color: #439ddf"
                                class="flex h-2 w-2 items-center justify-center rounded-full p-2.5 text-xs text-white">
                                {{ wishlistCount }}
                            </p>
                        </div>
                        <WishListIcon class="text-white" :weight="2" :size="30" />
                        <span class="capitalize text-white text-xs font-semibold text-center">wishlist</span>
                    </div>

                    <!-- Cart -->
                    <div @click="goToCheckout()" class="flex flex-col justify-center items-center relative cursor-pointer">
                        <div class="absolute -top-1 left-4">
                            <p style="background-color: #439ddf"
                                class="flex h-2 w-2 items-center justify-center rounded-full p-2.5 text-xs text-white">
                                {{ cartCount }}
                            </p>
                        </div>
                        <CartIcon class="text-white" :weight="2" :size="30" />
                        <span class="capitalize text-white text-xs font-semibold text-center">cart</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- top second end -->
    </header>
</template>

<style scoped>
.custom-gradient {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);
}

.border {
    border-width: 1px 1px 1px 0px;
}
</style>