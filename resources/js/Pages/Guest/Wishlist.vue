<script setup>
import { Head, router, usePage,Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref, onMounted, computed } from "vue";
import Category from '@/Components/MyComponent/Category.vue';
import BreadcrumbSection from '@/Components/MyComponent/BreadcrumbSection.vue';

const products = computed(() => usePage().props.wishlist.data.products);
const successMessage = computed(() => usePage().props.flash.success);

const removeWishlist = (id) => {

    router.delete(route('wishlist.delete', id), {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        // onBefore: () => confirm('Are you sure?'),
        onSuccess: () => {
            console.log(id, successMessage.value);
        }
    })
}



const addToCart = (id) => {
    router.post(route('checkout.store'), {
        productId: id
    }, {
        preserveScroll: true,
        replace: true,
        preserveState: true,
        onSuccess: () => {
            console.log('product add to cart successfully');
            removeWishlist(id)
        }
    })
}

</script>
<template>
    <Head title="wishlist" />
    <guest-layout>
        <div class="container">
            <Category />
            <div class="mb-6">
                <BreadcrumbSection :link="'wishlist'" />
            </div>
            <!-- table start here -->
            <div class=" overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 ">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <template v-if="products.length > 0">
                            <tr v-for="product in products" :key="product.id" class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <div class="w-24 h-24 shrink-0 bg-white p-2 rounded-md">
                                        <img src='https://readymadeui.com/images/product14.webp'
                                            class="w-full h-full object-contain" />
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ product.title }}
                                </td>
                                <td class="px-6 py-4">
                                    Tk {{ product.discount_price ?? product.price }}
                                </td>
                                <td class="px-6 py-4">
                                    <button @click.prevent="addToCart(product.id)"
                                        class="px-6 py-3 bg-green-500 text-white rounded-md mr-2">add to cart</button>
                                    <button @click.prevent="removeWishlist(product.id)"
                                        class="px-6 py-3 bg-red-500 text-white rounded-md">delete</button>

                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr class="border-b">
                                <td class="text-center py-4" colspan="4"><span class="mr-2">Empty product</span>
                                    <Link class="font-bold underline text-black hover:text-blue-400" as="button"
                                        :href="route('page.home')">Back to shopping </Link>
                                </td>
                            </tr>
                        </template>


                    </tbody>
                </table>
            </div>

            <!-- table end here -->

        </div>
    </guest-layout>
</template>