<script setup>
import { ref } from 'vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';



import PlusIcon from '../Icons/PlusIcon.vue';
import MinusIcon from '../Icons/MinusIcon.vue';

import WishListIcon from '../Icons/WishListIcon.vue';
import CartIcon from '../Icons/CartIcon.vue';
import Teliphone from '../Icons/Teliphone.vue';

import SingleProduct from './SingleProduct.vue';






const active = ref(0);

</script>
<template>
    <div class="font-sans">
        <div class="p-4 container">
            <!-- cart start here -->
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">


                <!-- images start here -->
                <div
                    class="min-h-[500px] lg:col-span-3 bg-gradient-to-tr  from-[#F8C794] via-[#FFE0B5] to-[#FFF2D7] rounded-lg w-full lg:sticky top-0 text-center p-6">
                    <img src="../../../assets/images-1/blog_img4.jpg" alt="Product"
                        class="w-3/5 rounded object-cover mx-auto py-6" />

                    <hr class="border-white border my-6" />

                    <div class="flex flex-wrap gap-x-4 gap-y-6 justify-center mx-auto">
                        <div class="w-20 h-20 max-lg:w-16 max-lg:h-16 bg-[#fff2c9] p-3 rounded-lg">
                            <img src="../../../assets/images-1/blog_img6.jpg" alt="Product1"
                                class="w-full h-full cursor-pointer" />
                        </div>
                        <div class="w-20 h-20 max-lg:w-16 max-lg:h-16 bg-[#fff2c9] p-3 rounded-lg">
                            <img src="../../../assets/images-1/blog_img6.jpg" alt="Product1"
                                class="w-full h-full cursor-pointer" />
                        </div>
                        <div class="w-20 h-20 max-lg:w-16 max-lg:h-16 bg-[#fff2c9] p-3 rounded-lg">
                            <img src="../../../assets/images-1/blog_img6.jpg" alt="Product1"
                                class="w-full h-full cursor-pointer" />
                        </div>
                        <div class="w-20 h-20 max-lg:w-16 max-lg:h-16 bg-[#fff2c9] p-3 rounded-lg">
                            <img src="../../../assets/images-1/blog_img6.jpg" alt="Product1"
                                class="w-full h-full cursor-pointer" />
                        </div>
                    </div>
                </div>
                <!-- images end here -->




                <div class="lg:col-span-2">
                    <!-- heading -->
                    <h2 class="text-2xl font-bold text-gray-800">Espresso Elegante | Coffee</h2>
                    <!-- stock -->
                    <div>
                        <span>stock</span>
                        <span class="bg-red-500 text-white px-4 py-1.5">1123</span>
                    </div>
                    <div>
                        <span>category : </span> <span class="font-bold">Health Care</span>
                    </div>
                    <div>
                        <span class=" text-2xl font-bold">Tk 1,990</span> <del class="text-gray-400 text-sm">Tk 2,560</del>
                        <span class="text-blue-400 font-semibold">30 TK OFF</span>
                    </div>





                    <hr />
                    <!-- short description -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">ডায়াবেটিস রোগী এবং যারা হাটার সুযোগ পায় না তাদের জন্য
                            অত্যন্ত কার্যকরী একটি যন্ত্র।</h3>


                    </div>

                    <!-- product quantity -->
                    <div class="mt-8">
                        <h3 class="text-lg font-bold text-gray-800">Quantity</h3>
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
                    </div>

                    <div class="flex gap-4 mb-4">
                        <button type="button"
                            class=" mt-8 px-6 py-3 bg-orange-400 hover:bg-orange-500 text-white text-sm font-semibold rounded-md">Buy
                            Now</button>

                        <button type="button"
                            class=" mt-8 px-6 py-3 bg-orange-400 hover:bg-orange-500 text-white text-sm font-semibold rounded-md">
                            <WishListIcon :size="20" />
                            <!-- <span> Add to wishlist</span> -->
                        </button>

                        <button type="button"
                            class=" mt-8 px-6 py-3 flex justify-center items-center gap-2 bg-orange-400 hover:bg-orange-500 text-white text-sm font-semibold rounded-md">
                            <CartIcon :size="18" />
                            <span> Add to cart</span>
                        </button>
                    </div>


                    <hr>
                    <div class="py-4">
                        <p class="flex items-center gap-2">
                            <span>
                                <Teliphone class="w-7 h-7" />
                            </span>
                            <span class="text-2xl font-semibold capitalize">call for order 01626691836</span>



                        </p>
                    </div>
                    <hr>


                    <!-- <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">Reviews(10)</h3>
                        <div class="space-y-3 mt-4">
                            <div class="flex items-center">
                                <p class="text-sm text-gray-800 font-bold">5.0</p>
                                <svg class="w-5 fill-orange-400 ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-300 rounded w-full h-2 ml-3">
                                    <div class="w-2/3 h-full rounded bg-orange-400"></div>
                                </div>
                                <p class="text-sm text-gray-800 font-bold ml-3">66%</p>
                            </div>

                            <div class="flex items-center">
                                <p class="text-sm text-gray-800 font-bold">4.0</p>
                                <svg class="w-5 fill-orange-400 ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-300 rounded w-full h-2 ml-3">
                                    <div class="w-1/3 h-full rounded bg-orange-400"></div>
                                </div>
                                <p class="text-sm text-gray-800 font-bold ml-3">33%</p>
                            </div>

                            <div class="flex items-center">
                                <p class="text-sm text-gray-800 font-bold">3.0</p>
                                <svg class="w-5 fill-orange-400 ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-300 rounded w-full h-2 ml-3">
                                    <div class="w-1/6 h-full rounded bg-orange-400"></div>
                                </div>
                                <p class="text-sm text-gray-800 font-bold ml-3">16%</p>
                            </div>

                            <div class="flex items-center">
                                <p class="text-sm text-gray-800 font-bold">2.0</p>
                                <svg class="w-5 fill-orange-400 ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-300 rounded w-full h-2 ml-3">
                                    <div class="w-1/12 h-full rounded bg-orange-400"></div>
                                </div>
                                <p class="text-sm text-gray-800 font-bold ml-3">8%</p>
                            </div>

                            <div class="flex items-center">
                                <p class="text-sm text-gray-800 font-bold">1.0</p>
                                <svg class="w-5 fill-orange-400 ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-300 rounded w-full h-2 ml-3">
                                    <div class="w-[6%] h-full rounded bg-orange-400"></div>
                                </div>
                                <p class="text-sm text-gray-800 font-bold ml-3">6%</p>
                            </div>
                        </div>

                        <div class="flex items-start mt-8">
                            <img src="https://readymadeui.com/team-2.webp"
                                class="w-12 h-12 rounded-full border-2 border-white" />
                            <div class="ml-3">
                                <h4 class="text-sm font-bold">John Doe</h4>
                                <div class="flex space-x-1 mt-1">
                                    <svg class="w-4 fill-orange-400" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-orange-400" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-orange-400" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <p class="text-xs !ml-2 font-semibold">2 mins ago</p>
                                </div>
                                <p class="text-xs mt-4">The service was amazing. I never had to wait that long for my food.
                                    The staff was friendly and attentive, and the delivery was impressively prompt.</p>
                            </div>
                        </div>
                        <button type="button"
                            class="w-full mt-8 px-4 py-2.5 bg-transparent border border-orange-400 text-gray-800 font-semibold rounded-lg">Read
                            all reviews</button>
                    </div> -->








                </div>




            </div>




            <!-- cart long description start here -->


            <div class="mt-4">

                <TabView v-model:activeIndex="active">

                    <TabPanel header="Description">
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </p>
                    </TabPanel>
                    <TabPanel header="How to order">
                        <p class="m-0">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo. Nemo enim
                            ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                            magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed
                            quia non numquam eius modi.
                        </p>
                    </TabPanel>
                    <TabPanel header="Order Policy">
                        <p class="m-0">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                            cupiditate non provident, similique sunt in culpa qui
                            officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum
                            facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
                            cumque nihil impedit quo minus.
                        </p>
                    </TabPanel>
                </TabView>


            </div>
            <!-- cart long description end here-->



            <!-- related products start here -->
            <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20 ">
                <div class=" px-4 md:px-0  container">
                    <div class="py-2">
                        <h2 class="text-2xl font-bold sm:text-3xl uppercase">related products</h2>
                    </div>

                    <div class="py-4 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4">
                        <!-- product here -->
                        <SingleProduct v-for="item in 8" :key="item" />

                    </div>
                </div>
            </section>
            <!-- related products end here -->
















        </div>
    </div>
</template>