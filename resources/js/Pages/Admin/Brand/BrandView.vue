<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, usePage, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, computed, watch } from 'vue';
import DotButton from '../../../Components/AdminComponent/LayoutComponent/DotButton.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import DownArrowIcon from '@/Components/Icons/DownArrowIcon.vue';

const props = defineProps({
    brand: Array
})

const brands = computed(() => props.brand);
// console.log(brands.value)
const deleteBrand = (id) => {
    router.delete(route('brand.delete', { id: id }), {
        onSuccess: () => {
            if (usePage().props.flash.success) {
                console.log('success', usePage().props.flash.success);
            } else {
                console.log('error', usePage().props.flash.error);
            }
        },
        onBefore: () => {
            return confirm('Are you sure?');
        },
        preserveScroll: true,
        preserveState: true,
        replace: true,
        onError: () => {
            console.log('errors', usePage().props.errors)
        }
    })
}

// brand sorting code start here
const refreshBrands = () => {
    router.get(route('page.brandView'), '')
}

const searchForBrand = ref('');
const sortByStatus = ref('');
const sortByProductCount = ref('');
const sortByslider = ref('');
const sortByBanner = ref('');
watch(searchForBrand, (search) => {
    router.get(`${route('page.brandView')}?search=${search}`, '', {
        preserveScroll: true,
        preserveState: true,
    })
})

watch(sortByStatus, (status) => {
    if (status !== '') {
        router.get(`${route('page.brandView')}?status=${status}`, '', {
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        refreshBrands();
    }
});

watch(sortByProductCount, (type) => {
    if (type !== '') {
        router.get(`${route('page.brandView')}?order_by_product_count=${type}`, '', {
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        refreshBrands();
    }
});
watch(sortByslider, (slider) => {
    if (slider !== '') {
        router.get(`${route('page.brandView')}?sort_by_slider=${slider}`, '', {
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        refreshBrands();
    }
});
watch(sortByBanner, (banner) => {
    if (banner !== '') {
        router.get(`${route('page.brandView')}?sort_by_banner=${banner}`, '', {
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        refreshBrands();
    }
});

// brand sorting code end here







</script>
<template>
    <Head title="brands" />
    <admin-layout>
        <!-- Start block -->
        <section class="bg-gray-50  p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                    <!-- table header 1 start  -->
                    <div
                        class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="flex-1 flex items-center space-x-2">
                            <h5>
                                <span class="text-gray-500 capitalize">all brands:</span>
                                <span class="dark:text-white">{{ brands.length }}</span>
                            </h5>
                        </div>
                        <div
                            class="flex-shrink-0 flex flex-col items-start md:flex-row md:items-center lg:justify-end space-y-3 md:space-y-0 md:space-x-3">
                            <!-- button here -->
                            <Link as="button" :href="route('page.createBrand')"
                                class="flex items-center  justify-center text-white  font-medium rounded-lg text-sm px-4 py-2 bg-green-400   dark:focus:ring-primary-800 ">
                            Add Brand
                            </Link>
                        </div>
                    </div>
                    <!-- table header 1 end  -->



                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                        </svg>
                                    </div>
                                    <input v-model="searchForBrand" type="text" id="simple-search"
                                        placeholder="Search for brand name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">




                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortByStatus" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>sort by status</option>
                                        <option class=" capitalize" value="active">active</option>
                                        <option class="capitalize" value="deactive">deactive</option>


                                    </select>


                                </form>

                            </div>

                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortByProductCount" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>order by product count</option>
                                        <option value="asc">ASC</option>
                                        <option value="desc">DESC</option>


                                    </select>


                                </form>

                            </div>

                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortByslider" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected class=" capitalize">sort by slider</option>
                                        <option :value="true">True</option>
                                        <option :value="false">False</option>
                                    </select>


                                </form>

                            </div>
                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto sm:w-full">

                                    <select v-model="sortByBanner" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>sort by banner</option>
                                        <option :value="true">True</option>
                                        <option :value="false">False</option>
                                    </select>


                                </form>

                            </div>
                           
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox"
                                                class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4">brands</th>
                                    <th scope="col" class="p-4">status</th>
                                    <th scope="col" class="p-4">product count</th>
                                    <th scope="col" class="p-4">created at (d/m/y)</th>

                                    <th scope="col" class="p-4">brand slider</th>
                                    <th scope="col" class="p-4">is banner</th>
                                    <th scope="col" class="p-4">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="brand in brands" :key="brand.id"
                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                onclick="event.stopPropagation()"
                                                class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex flex-col items-start  ">
                                            <img :src="`/storage/${brand.brand_logo}`" alt="iMac Front Image"
                                                class="h-8 w-auto mr-3">

                                            <span class="max-w-[18rem] truncate">{{ brand.brand_name }}</span>
                                        </div>
                                    </th>


                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span v-if="Boolean(brand.published) === true"
                                            class="text-green-500 capitalize">active</span>
                                        <span v-if="Boolean(brand.published) === false"
                                            class="text-red-500 capitalize">deactive</span>

                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span>{{ brand.products_count }}</span>

                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span>{{ brand.created_at }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex flex-wrap">
                                            <img :src="`/storage/${brand.brand_slider}`" alt="slider"
                                                class="h-8 w-auto mr-3">

                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span class="capitalize">{{ brand.is_banner === 0 ? false : true
                                        }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <div class="flex items-center space-x-4">
                                                <button id="apple-ipad-air-dropdown-button"
                                                    class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                    type="button">
                                                   
                                                </button>
                        
                                            </div> -->

                                        <Menu as="div" class="relative inline-block text-left">
                                            <div>
                                                <MenuButton
                                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm  ring-gray-300 hover:bg-gray-500">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </MenuButton>
                                            </div>

                                            <transition enter-active-class="transition ease-out duration-100"
                                                enter-from-class="transform opacity-0 scale-95"
                                                enter-to-class="transform opacity-100 scale-100"
                                                leave-active-class="transition ease-in duration-75"
                                                leave-from-class="transform opacity-100 scale-100"
                                                leave-to-class="transform opacity-0 scale-95">
                                                <MenuItems
                                                    class="absolute right-0 z-10 mt-2 w-26 origin-top-right rounded-md bg-gray-400 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                    <div class="py-1">
                                                        <MenuItem v-slot="{ active }">

                                                        <button @click="deleteBrand(brand.id)" type="button"
                                                            class=" capitalize"
                                                            :class="[active ? 'bg-gray-300 text-white' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                            delete</button>


                                                        </MenuItem>


                                                        <MenuItem v-slot="{ active }">


                                                        <Link as="button"
                                                            :href="route('page.updateBrand', { id: brand.id })"
                                                            class=" capitalize"
                                                            :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                        edit</Link>
                                                        </MenuItem>



                                                    </div>
                                                </MenuItems>
                                            </transition>
                                        </Menu>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>


                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-{{ brands.length }}</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">{{ brands.length }}</span>
                        </span>

                    </nav>

                </div>
            </div>
        </section>
        <!-- End block -->
    </admin-layout>
</template>