<script setup>
import { Head, usePage, Link, router } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Category from '@/Components/MyComponent/Category.vue';
import BreadcrumbSection from '@/Components/MyComponent/BreadcrumbSection.vue';
import PlusIcon from '@/Components/Icons/PlusIcon.vue';
import MinusIcon from '@/Components/Icons/MinusIcon.vue';
import RemoveIcon from '../../Components/Icons/RemoveIcon.vue'
import { computed, ref } from 'vue';


const products = computed(() => usePage().props.cart.data.products);
const cartItems = computed(() => usePage().props.cart.data.items);
const subTotal = computed(() => usePage().props.cart.data.total);



const getProductQuantity = (productId) => {
    const product = cartItems.value.find((item) => item.product_id === productId);
    return product ? product.quantity : 0;
}



const getCartItemId = (id) => cartItems.value.findIndex((item, index, array) => {
    return item.product_id === id

})



const updateProductQuantity = (product, quantity) => {


    router.put(route('checkout.update'),
        {
            productId: product.id,
            quantity: quantity
        },
        {

            onSuccess: (page) => {
                console.log('quantity updated successfully')
            },
            preserveScroll: true,
            preserveState: true,
            replace: true
        })

}

const decrementProductQuantity = (product, quantity) => {
    if (quantity < 1) {
        return;
    } else {
        updateProductQuantity(product, quantity)
    }
}

const removeProductQuantity = (product) => {

    try {
        router.delete(route('checkout.delete', { id: product.id }), {
            preserveState: true,
            preserveScroll: true,
            replace: true,
            onBefore: () => confirm('Are you sure'),
            onSuccess: (page) => {
                console.log('quantity deleted successfully')
            }
        })
    } catch (error) {
        console.log(error);

    }
}






</script>
<template>
    <Head title="checkout" />
    <guest-layout>
        <div class="container">

            <Category />
            <div class="mb-6">
                <BreadcrumbSection :link="'checkout'" />
            </div>



            <div class="flex flex-col md:flex-row gap-y-10 md:gap-x-6 px-3 md:px-0">
                <div class=" w-full md:w-1/3">
                    <!-- user info -->
                    <div class="text-center p-4 bg-green-300 text-white">
                        <p>আপনার অর্ডারটি কনফার্ম করতে আপনার নাম, মোবাইল নাম্বার, ঠিকানা, লিখে অর্ডার কনফার্ম করুন বাটনে
                            ক্লিক করুন</p>
                    </div>
                    <div class=" bg-white flex flex-col w-full">


                        <div class=" mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class=" mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class=" mb-4">
                            <label for="message" class="leading-7 text-sm text-gray-600">Address</label>
                            <textarea id="message" name="message"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>

                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>


                    </div>
                    <!-- user form end here -->
                </div>
                <div class="w-full md:w-2/3">
                    <!-- table start here -->
                    <div class=" overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Product</th>
                                    <th scope="col" class="px-6 py-3">Quantity</th>
                                    <th scope="col" class="px-6 py-3">Total</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="products.length > 0">
                                    <tr v-for="product in products" :key="product.id" class="bg-white border-b">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                            <div class="w-24 h-24 shrink-0 bg-white p-2 rounded-md">
                                                <img :src="product.imageUrl || 'https://readymadeui.com/images/product14.webp'"
                                                    class="w-full h-full object-contain" :alt="product.title" />
                                            </div>
                                            {{ product.title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex divide-x border w-max mt-4 rounded overflow-hidden">
                                                <!-- decrement button -->
                                                <button
                                                    @click.prevent="decrementProductQuantity(product, cartItems[getCartItemId(product.id)].quantity - 1)"
                                                    type="button"
                                                    class="bg-gray-100 w-10 h-9 font-semibold flex items-center justify-center">
                                                    <MinusIcon class="w-5 h-5" />
                                                </button>

                                                <!-- view quantity -->
                                                <button type="button" class="text-black px-4">
                                                    {{ getProductQuantity(product.id) }}
                                                </button>


                                                <!-- increment button -->
                                                <button
                                                    @click.prevent="updateProductQuantity(product, cartItems[getCartItemId(product.id)].quantity + 1)"
                                                    type="button"
                                                    class="bg-gray-800 text-white w-10 h-9 font-semibold flex items-center justify-center">
                                                    <PlusIcon class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap capitalize">
                                            Tk {{ product.discount_price || product.price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button @click.prevent="removeProductQuantity(product)"
                                                class="px-6 py-3 rounded-md">
                                                <RemoveIcon class="size-6 text-red-500 font-semibold" />
                                            </button>
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

                    <div class=" border-2 border-gray-400 p-4">
                        <h3 class=" uppercase text-xl">cart totals</h3>
                        <p class="py-1 capitalize border-b-2">sub totals <span class=" font-semibold">Tk {{ subTotal ?? 0
                        }}</span></p>
                        <p class="py-1 capitalize border-b-2">delivery charge : <span class=" font-semibold">Tk 34</span>
                        </p>
                        <p class=" capitalize pt-1 pb-4">total : <span class=" font-semibold">Tk 345</span></p>

                    </div>
                </div>
            </div>









        </div>
    </guest-layout>
</template>