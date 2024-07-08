<script setup>
import { Link, router, usePage, Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import BreadcrumbSection from "@/Components/MyComponent/BreadcrumbSection.vue";
// import SortProducts from '../../Components/MyComponent/SortProducts.vue'
import Category from "@/Components/MyComponent/Category.vue";
// start here 
import { computed, watch, ref, onMounted, watchEffect } from 'vue';
import SingleProduct from '@/Components/MyComponent/SingleProduct.vue';
import PlusIcon from '@/Components/Icons/PlusIcon.vue';
import MinusIcon from '@/Components/Icons/MinusIcon.vue';
import DownArrowIcon from '@/Components/Icons/DownArrowIcon.vue';
import FunnelIcon from '@/Components/Icons/FunnelIcon.vue';
import Squares2X2Icon from '@/Components/Icons/Squares2X2Icon.vue';
import XMarkIcon from '@/Components/Icons/XMarkIcon.vue';
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import useProduct from '@/Composables/useProduct';


const props = defineProps({
    selectedCategory: Object,

})
const currentCategory = computed(() => props.selectedCategory)
// const {getProductsByCategory} = useProduct();

const mobileFiltersOpen = ref(false)
const products = computed(() => usePage().props.products.data);
const categories = usePage().props.categories.data;
const brands = usePage().props.brands.data;




const selectedBrand = ref('');
const getProductsByCategory = (slug) => {
    selectedBrand.value = '';
    router.get(`${route('page.productsByCategory')}?category=${slug}`, '', {
        preserveState: true,
        preserveScroll: true,
        replace: true,
        onError: (errors) => {
            console.log('sort category errors', errors)
        },

    });
}




// end here
const pricetStart = ref(0);
const priceEnd = ref(10000);
const sortingPrice = ref([pricetStart.value, priceEnd.value])



const showProducts = [
    { name: 'defult', href: '#', current: true },
    { name: '8', href: '#', current: false },
    { name: '16', href: '#', current: false },
    { name: '20', href: '#', current: false },
]


const sortOptions = [
    { name: 'defult', value: '#', current: true },
    { name: 'price low to high', value: 'low-to-high', current: false },
    { name: 'price high to low', value: 'high-to-low', current: false },
    { name: 'name a-z', value: 'a-z', current: false },
    { name: 'name z-a', value: 'z-a', current: false },
]

const sortByPosition = (positionType) => {

    router.get(`${usePage().url}&order_by=${positionType}`, '', {
        preserveScroll: true,
        preserveState: true,
    })
}

const sortByProductsShow = (size) => {

    if (size === 'defult') {
        size = 12
    }
    router.get(`${usePage().url}&page_size=${size}`, '', {
        preserveScroll: true,
        preserveState: true,
    })
}

const sortByPrice = () => {
    const start = sortingPrice.value[0]
    const end = sortingPrice.value[1]

    router.get(`${usePage().url}&price=${start}&to=${end}`, '', {
        preserveScroll: true,
        preserveState: true,
    })
}
watch(selectedBrand, (newValue) => {
    router.get(`${usePage().url}&brand=${newValue}`, '', {
        preserveState: true,
        preserveScroll: true,
        // replace: true,
        onError: (errors) => {
            console.log('sort brand error', errors)
        }
    });

})



</script>

<template>
    <Head title="products by category" />
    <guest-layout>
        <div>
            <div class="container">
                <Category />
            </div>
            <br>
            <div class="container flex justify-end">
                <BreadcrumbSection :link="'category'" />
            </div>
            <br>
            <div v-if="Boolean(selectedCategory.isSliderForCarousel)" class="container my-16">

                <img :src="`/storage/${selectedCategory.cat_slider}`" alt=""
                    class="w-full object-cover object-center rounded-lg image">

            </div>
           
            <!-- <SortProducts /> -->

            <!-- start here -->
            <div class="bg-white" id="sortingProduct">
                <div>
                    <!-- Mobile filter dialog start-->
                    <TransitionRoot as="template" :show="mobileFiltersOpen">
                        <Dialog class="relative z-40 lg:hidden" @close="mobileFiltersOpen = false">
                            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                                enter-from="opacity-0" enter-to="opacity-100"
                                leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
                                leave-to="opacity-0">
                                <div class="fixed inset-0 bg-black bg-opacity-25" />
                            </TransitionChild>

                            <div class="fixed inset-0 z-40 flex">
                                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                                    enter-from="translate-x-full" enter-to="translate-x-0"
                                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                                    leave-to="translate-x-full">
                                    <DialogPanel
                                        class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                                        <div class="flex items-center justify-between px-4">
                                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                            <button type="button"
                                                class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400"
                                                @click="mobileFiltersOpen = false">
                                                <span class="sr-only">Close menu</span>

                                                <XMarkIcon class="size-6" aria-hidden="true" />



                                            </button>
                                        </div>

                                        <!-- Filters -->
                                        <form class="mt-4 border-t border-gray-200 px-4">



                                            <!-- category start here -->
                                            <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                                <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                                    <DisclosureButton
                                                        class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                        <p
                                                            class="font-medium text-black border-b-2 border-black pb-2 text-md capitalize">
                                                            Category</p>


                                                        <span class="ml-6 flex items-center">
                                                            <PlusIcon v-if="!open" class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                            <MinusIcon v-else class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                        </span>

                                                    </DisclosureButton>
                                                </h3>
                                                <DisclosurePanel class="pt-6 category-container">
                                                    <div class="space-y-4">
                                                        <div class="flex flex-col gap-3">
                                                            <p @click="getProductsByCategory(category.slug)"
                                                                v-for="category in categories" :key="category.id"
                                                                class=" cursor-pointer text-left hover:to-blue-500 category-name"
                                                                :class="currentCategory.slug === category.slug ? 'text-blue-400' : ''">
                                                                {{ category.cat_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </DisclosurePanel>
                                            </Disclosure>
                                            <!-- category end here -->



                                            <!-- sort by price start here -->
                                            <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                                <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                                    <DisclosureButton
                                                        class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                        <p
                                                            class="font-medium text-black border-b-2 border-black pb-2 text-md capitalize">
                                                            sort by price</p>


                                                        <span class="ml-6 flex items-center">
                                                            <PlusIcon v-if="!open" class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                            <MinusIcon v-else class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                        </span>

                                                    </DisclosureButton>
                                                </h3>
                                                <DisclosurePanel class="pt-6">
                                                    <div class="space-y-4">
                                                        <div class="slider-demo-block">
                                                            <el-slider v-model="sortingPrice" range :min="pricetStart"
                                                                :max="priceEnd" />
                                                        </div>
                                                        <p class="">Range</p>
                                                        <p class=" font-bold"> {{ sortingPrice[0] }} - {{ sortingPrice[1] }}
                                                        </p>
                                                        <button @click="sortByPrice"
                                                            class="px-4 py-1 bg-blue-400 text-white"
                                                            type="button">Filter</button>

                                                    </div>
                                                </DisclosurePanel>
                                            </Disclosure>
                                            <!--sort by price end here -->

                                            <!-- brands start here -->
                                            <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                                <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                                    <DisclosureButton
                                                        class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                        <p
                                                            class="font-medium text-black border-b-2 border-black pb-2 text-md">
                                                            Brand
                                                        </p>


                                                        <span class="ml-6 flex items-center">
                                                            <PlusIcon v-if="!open" class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                            <MinusIcon v-else class="h-5 w-5 text-black"
                                                                aria-hidden="true" />
                                                        </span>

                                                    </DisclosureButton>
                                                </h3>

                                                <DisclosurePanel class="pt-6">
                                                    <div class="space-y-4">
                                                        <div v-for="brand in brands" :key="brand.id"
                                                            class="flex items-center">
                                                            <input :id="`filter-${brand.id}`" v-model="selectedBrand"
                                                                :value="brand.slug" type="radio" name="brand"
                                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                                            <label :for="`filter-${brand.id}`"
                                                                class="ml-3 text-sm text-gray-600">{{
                                                                    brand.brand_name }}</label>
                                                        </div>
                                                    </div>
                                                </DisclosurePanel>
                                            </Disclosure>
                                            <!-- brands end here -->




                                        </form>

                                    </DialogPanel>
                                </TransitionChild>
                            </div>
                        </Dialog>
                    </TransitionRoot>
                    <!-- Mobile filter dialog end-->



                    <main class="container px-4 md:px-0">
                        <div class="flex items-center justify-between border-b border-gray-200 pb-6 pt-24">
                            <h1 class="text-xl  md:text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>

                            <div class="flex gap-6">
                                <div class="flex items-center">
                                    <Menu as="div" class="relative inline-block text-left">
                                        <div>
                                            <MenuButton
                                                class="group inline-flex justify-center items-start text-sm font-medium text-gray-700 hover:text-gray-900 capitalize">
                                                show products

                                                <DownArrowIcon
                                                    class="-mr-1 ml-1 h-4 w-4 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true" />
                                            </MenuButton>
                                        </div>
                                        <transition enter-active-class="transition ease-out duration-100"
                                            enter-from-class="transform opacity-0 scale-95"
                                            enter-to-class="transform opacity-100 scale-100"
                                            leave-active-class="transition ease-in duration-75"
                                            leave-from-class="transform opacity-100 scale-100"
                                            leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems
                                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1">
                                                    <MenuItem v-for="option in showProducts" :key="option.name"
                                                        v-slot="{ active }">
                                                    <button type="button" @click="sortByProductsShow(option.name)"
                                                        class=" capitalize"
                                                        :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">{{
                                                            option.name }}</button>
                                                    </MenuItem>
                                                </div>
                                            </MenuItems>
                                        </transition>
                                    </Menu>


                                </div>
                                <div class="flex items-center">

                                    <Menu as="div" class="relative inline-block text-left">
                                        <div>
                                            <MenuButton
                                                class="group inline-flex justify-center items-start text-sm font-medium text-gray-700 hover:text-gray-900 capitalize">
                                                Sort by
                                                <DownArrowIcon
                                                    class="-mr-1 ml-1 h-4 w-4 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true" />
                                            </MenuButton>
                                        </div>

                                        <transition enter-active-class="transition ease-out duration-100"
                                            enter-from-class="transform opacity-0 scale-95"
                                            enter-to-class="transform opacity-100 scale-100"
                                            leave-active-class="transition ease-in duration-75"
                                            leave-from-class="transform opacity-100 scale-100"
                                            leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems
                                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1">
                                                    <MenuItem v-for="option in sortOptions" :key="option.name"
                                                        v-slot="{ active }">
                                                    <button type="button" @click="sortByPosition(option.value)"
                                                        class=" capitalize"
                                                        :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">{{
                                                            option.name }}</button>
                                                    </MenuItem>
                                                </div>
                                            </MenuItems>
                                        </transition>
                                    </Menu>



                                    <button type="button"
                                        class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                                        @click="mobileFiltersOpen = true">
                                        <span class="sr-only">Filters</span>
                                        <FunnelIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>



                                </div>
                            </div>
                        </div>



                        <!--for large sereen start-->
                        <section aria-labelledby="products-heading" class="pb-24 pt-6">
                            <h2 id="products-heading" class="sr-only">Products</h2>

                            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                                <!-- Filters -->
                                <form class="hidden lg:block">
                                    <h3 class="sr-only">Categories</h3>

                                    <!-- category start here -->
                                    <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                        <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                            <DisclosureButton
                                                class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                <p
                                                    class="font-medium text-black border-b-2 border-black pb-2 text-md capitalize">
                                                    Category</p>


                                                <span class="ml-6 flex items-center">
                                                    <PlusIcon v-if="!open" class="h-5 w-5 text-black" aria-hidden="true" />
                                                    <MinusIcon v-else class="h-5 w-5 text-black" aria-hidden="true" />
                                                </span>

                                            </DisclosureButton>
                                        </h3>
                                        <DisclosurePanel class="pt-6 category-container">
                                            <div class="space-y-4">
                                                <div class="flex flex-col gap-3">
                                                    <p @click="getProductsByCategory(category.slug)"
                                                        v-for="category in categories" :key="category.id"
                                                        class=" cursor-pointer text-left hover:text-blue-400 category-name"
                                                        :class="currentCategory.slug === category.slug ? 'text-blue-400' : ''">
                                                        {{ category.cat_name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </DisclosurePanel>
                                    </Disclosure>
                                    <!-- category end here -->






                                    <!-- sort by price start here -->
                                    <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                        <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                            <DisclosureButton
                                                class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                <p
                                                    class="font-medium text-black border-b-2 border-black pb-2 text-md capitalize">
                                                    sort by price</p>


                                                <span class="ml-6 flex items-center">
                                                    <PlusIcon v-if="!open" class="h-5 w-5 text-black" aria-hidden="true" />
                                                    <MinusIcon v-else class="h-5 w-5 text-black" aria-hidden="true" />
                                                </span>

                                            </DisclosureButton>
                                        </h3>
                                        <DisclosurePanel class="pt-6">
                                            <div class="space-y-4">
                                                <div class="slider-demo-block">
                                                    <el-slider v-model="sortingPrice" range :min="pricetStart"
                                                        :max="priceEnd" />
                                                </div>
                                                <p class="">Range</p>
                                                <p class=" font-bold"> {{ sortingPrice[0] }} - {{ sortingPrice[1] }}</p>
                                                <button @click="sortByPrice" class="px-4 py-1 bg-blue-400 text-white"
                                                    type="button">Filter</button>

                                            </div>
                                        </DisclosurePanel>
                                    </Disclosure>
                                    <!--sort by price end here -->









                                    <!-- brands start here -->
                                    <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                        <h3 class="-my-3 flow-root border-b-2 mb-0.5">
                                            <DisclosureButton
                                                class="flex w-full items-center justify-between bg-white text-sm text-gray-400 hover:text-gray-500">

                                                <p class="font-medium text-black border-b-2 border-black pb-2 text-md">Brand
                                                </p>


                                                <span class="ml-6 flex items-center">
                                                    <PlusIcon v-if="!open" class="h-5 w-5 text-black" aria-hidden="true" />
                                                    <MinusIcon v-else class="h-5 w-5 text-black" aria-hidden="true" />
                                                </span>

                                            </DisclosureButton>
                                        </h3>

                                        <DisclosurePanel class="pt-6">
                                            <div class="space-y-4">
                                                <div v-for="brand in brands" :key="brand.id" class="flex items-center">
                                                    <input :id="`filter-${brand.id}`" v-model="selectedBrand"
                                                        :value="brand.slug" type="radio" name="brand"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                                    <label :for="`filter-${brand.id}`" class="ml-3 text-sm text-gray-600">{{
                                                        brand.brand_name }}</label>
                                                </div>
                                            </div>
                                        </DisclosurePanel>
                                    </Disclosure>
                                    <!-- brands end here -->









                                </form>

                                <!-- Product grid -->
                                <div class="lg:col-span-3">
                                    <!-- Your content -->
                                    <section class="bg-white  text-gray-700   ">
                                        <div class=" px-4 md:px-0  container">

                                            <div class=" grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-4">
                                                <!-- product here -->
                                                <SingleProduct :product-items="products" />

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </section>
                        <!--for large sereen start-->

                    </main>
                </div>
            </div>
            <!-- end here -->




        </div>

    </guest-layout>
</template>
 
<style scoped>
.image {
    max-height: 300px;
    object-fit: fill;
    object-position: center;
}

.slider-demo-block {
    max-width: 600px;
    display: flex;
    align-items: center;
}

.slider-demo-block .el-slider {
    margin-top: 0;
    margin-left: 12px;
}

.border-b {
    border: none;
}

.category-container {
    /* width: 100px; */
    /* Adjust as needed */
    max-height: 400px;
    /* Adjust as needed */
    overflow-y: scroll;
    /* Enable vertical scrolling */
    /* border: 1px solid #ccc; */
    /* Optional border for container */
    padding: 2px 0px;
}

/* Basic styles for the container */

/* Custom scrollbar styles for WebKit browsers */
.category-container::-webkit-scrollbar {
    width: 12px;
    /* Width of the scrollbar */
}

/* Track styles */
.category-container::-webkit-scrollbar-track {
    background: linear-gradient(to bottom, #f5f5f5, #e0e0e0);
    /* Light gradient for the track */
    border-radius: 10px;
    /* Rounded corners for the track */
}

/* Thumb styles */
.category-container::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #a3c6f7, #cfe8ff);
    /* Gradient for the thumb */
    border-radius: 10px;
    /* Rounded corners for the thumb */
    border: 2px solid #ffffff;
    /* White border to create spacing effect */
}

/* Thumb hover effect */
.category-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #82a9e3, #b0d4f9);
    /* Darker gradient on hover */
}

/* Custom scrollbar for Firefox */
/* .scroll-container {
    scrollbar-width: thin;
    scrollbar-color: #a3c6f7 #e0e0e0;
} */
</style>
