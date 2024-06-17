<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref, onMounted } from "vue";
import Category from '@/Components/MyComponent/Category.vue';
import BreadcrumbSection from '@/Components/MyComponent/BreadcrumbSection.vue';

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
                        <tr v-for="item in 5" :key="item" class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <div class="w-24 h-24 shrink-0 bg-white p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/product14.webp'
                                        class="w-full h-full object-contain" />
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, adipisci.
                            </td>
                            <td class="px-6 py-4">
                                Tk 345
                            </td>
                            <td class="px-6 py-4">
                                <button class="px-6 py-3 bg-green-500 text-white rounded-md mr-2">add to cart</button>
                                <button class="px-6 py-3 bg-red-500 text-white rounded-md">delete</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- table end here -->

        </div>
    </guest-layout>
</template>