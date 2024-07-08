<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
// import Navbar from "../LayoutComponent/Navbar.vue";
import RightArrowIcon from '../../../Components/Icons/RightArrowIcon.vue'

import {
    Document,
    Menu as IconMenu,
    Location,
    Setting,
} from '@element-plus/icons-vue';

const handleOpen = (key, keyPath) => {
    console.log(key, keyPath);
};
const handleClose = (key, keyPath) => {
    console.log(key, keyPath);
};

const subMenuOpenProduct = ref(false);
const subMenuOpenCategory = ref(false);
const subMenuOpenBrand = ref(false);
const name = computed(() => usePage().props.auth.user.name)

</script>
<template>
    <aside class="fixed z-50 md:relative">
        <!-- Sidebar start-->
        <input type="checkbox" class="peer hidden" id="sidebar-open" />
        <label
            class="peer-checked:rounded-full peer-checked:p-2 peer-checked:right-6 peer-checked:bg-gray-600 peer-checked:text-white absolute top-8 z-20 mx-4 cursor-pointer md:hidden"
            for="sidebar-open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>
        <!-- sidebar end -->

        <!-- navbar start -->
        <nav aria-label="Sidebar Navigation"
            class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-y-scroll bg-gray-700 text-white transition-all md:h-screen md:w-64 lg:w-72">
            <div class="bg-slate-800 mt-5 py-4 pl-10 md:mt-10">
                <span class="">
                    <span
                        class="mr-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 align-bottom text-2xl font-bold">U</span>
                    <span class="text-xl">rbane</span>
                </span>
            </div>



            <!-- navigation sidebar start here -->


            <ul class="mt-8 space-y-3 md:mt-0">



                <li class="relative">
                    <Link as="button" :href="route('page.dashboardOverview')" :preserve-scroll="true" :preserve-state="true"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                    <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg></span><span class="">Overview</span>
                    </Link>
                </li>



                <li class="relative">
                    <button @click="subMenuOpenProduct = !subMenuOpenProduct" type="button"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex justify-between items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">

                        <div class="flex gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">product</span>
                        </div>
                        <div>
                            <RightArrowIcon class="size-4"
                                :class="subMenuOpenProduct === true ? 'rotate-90' : 'rotate-360'" />
                        </div>

                    </button>

                    <ul :class="subMenuOpenProduct ? 'block' : 'hidden'" class="bg-gray-600">
                        <li>
                            <Link as="button" :href="route('page.productView')" :preserve-scroll="true"
                                :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">view product</span></Link>
                        </li>
                        <li>
                            <Link as="button" :href="route('page.createProduct')" :preserve-scroll="true"
                                :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">create product</span></Link>
                        </li>

                    </ul>

                </li>




                <li class="relative">
                    <button @click="subMenuOpenCategory = !subMenuOpenCategory" type="button"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex justify-between items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">

                        <div class="flex gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">category</span>
                        </div>
                        <div>
                            <RightArrowIcon class="size-4"
                                :class="subMenuOpenCategory === true ? 'rotate-90' : 'rotate-360'" />
                        </div>

                    </button>

                    <ul :class="subMenuOpenCategory ? 'block' : 'hidden'" class="bg-gray-600">
                        <li>
                            <Link as="button" :href="route('page.categoryView')" :preserve-scroll="true"
                                :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">view category</span></Link>
                        </li>
                        <li>
                            <Link as="button" :href="route('page.createCategory')" :preserve-scroll="true"
                                :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">create category</span></Link>
                        </li>

                    </ul>

                </li>

                <li class="relative">
                    <button @click="subMenuOpenBrand = !subMenuOpenBrand" type="button"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex justify-between items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">

                        <div class="flex gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">brand</span>
                        </div>
                        <div>
                            <RightArrowIcon class="size-4"
                                :class="subMenuOpenBrand === true ? 'rotate-90' : 'rotate-360'" />
                        </div>

                    </button>

                    <ul :class="subMenuOpenBrand ? 'block' : 'hidden'" class="bg-gray-600">
                        <li>
                            <Link as="button" :href="route('page.brandView')" :preserve-scroll="true" :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">view brand</span></Link>
                        </li>
                        <li>
                            <Link as="button" :href="route('page.createBrand')" :preserve-scroll="true"
                                :preserve-state="true"
                                class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg></span><span class=" capitalize">create brand</span></Link>
                        </li>

                    </ul>

                </li>



                <li class="relative">
                    <Link as="button" :href="route('page.settingsPage')" :preserve-state="true"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                    <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></span><span class="">Settings</span>
                    </Link>
                </li>



            </ul>
            <!-- navigation sidebar end here -->

            <div class="my-6 mt-auto ml-10 flex cursor-pointer">
                <div>
                    <img class="h-12 w-12 rounded-full"
                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" />
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ name }}</p>
                    <p class="text-sm text-gray-300">Kyiv, Ukraine</p>
                </div>
            </div>
        </nav>
        <!-- navbar end -->
        <!-- <Navbar/> -->
    </aside>
    <!-- /Sidebar -->
</template>
