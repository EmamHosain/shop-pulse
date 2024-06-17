<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Category from '@/Components/MyComponent/Category.vue';
import BreadcrumbSection from '@/Components/MyComponent/BreadcrumbSection.vue';
import PlusIcon from '@/Components/Icons/PlusIcon.vue';
import MinusIcon from '@/Components/Icons/MinusIcon.vue';


import RemoveIcon from '../../Components/Icons/RemoveIcon.vue'
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
                        <div class="relative mb-4">
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
                                    <th scope="col" class="px-6 py-3 ">
                                        Product
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3">
                                        name
                                    </th> -->
                                    <th scope="col" class="px-6 py-3">
                                        quantity
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
                                <tr v-for="item in 2" :key="item" class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                                        <div class="w-24 h-24 shrink-0 bg-white p-2 rounded-md">
                                            <img src='https://readymadeui.com/images/product14.webp'
                                                class="w-full h-full object-contain" />
                                        </div>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, adipisci.
                                    </th>



                                    <!-- quantity -->
                                    <td class="px-6 py-4">
                                        <div class="flex divide-x border w-max mt-4 rounded overflow-hidden">
                                            <button type="button"
                                                class="bg-gray-100 w-10 h-9 font-semibold flex items-center justify-center">


                                                <MinusIcon class="w-5 h-5" />
                                            </button>
                                            <button type="button"
                                                class="bg-transparent w-10 h-9 font-semibold flex items-center justify-center text-gray-800 text-lg">
                                                1
                                            </button>
                                            <button type="button"
                                                class="bg-gray-800 text-white w-10 h-9 font-semibold flex items-center justify-center">
                                                <PlusIcon class="w-5 h-5" />
                                            </button>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap capitalize">
                                        tk 345.00
                                    </td>

                                    <td class="px-6 py-4">

                                        <button class="px-6 py-3  rounded-md">
                                            <RemoveIcon class="size-6 text-red-500 font-semibold" />
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- table end here -->
                </div>
            </div>









        </div>
    </guest-layout>
</template>