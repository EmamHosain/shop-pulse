<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, usePage, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, computed, watch } from 'vue';
import DotButton from '../../../Components/AdminComponent/LayoutComponent/DotButton.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import DownArrowIcon from '@/Components/Icons/DownArrowIcon.vue';
import NavigatorLinksForAdmin from '../../../Components/MyComponent/NavigatorLinksForAdmin.vue'
import PlusIcon from '../../../Components/Icons/PlusIcon.vue'

const props = defineProps({
    categories: Object
})

// console.log('categories',props.categories)
const categories = computed(() => props.categories.data);
const navigatorLinks = computed(() => props.categories.meta.links);
const fromNumber = computed(() => props.categories.meta.from);
const toNumber = computed(() => props.categories.meta.to);
const totalCategories = computed(() => props.categories.meta.total);



// console.log('navigator',navigatorLinks.value)


const refreshCategories = () => {
    router.get(route('page.categoryView'));
}


const deleteCategory = (id) => {
    // console.log('id', id)
    router.delete(route('category.delete', { id: id }), {
        onBefore: () => confirm('Are you sure?'),
        onSuccess: () => {
            console.log('success', usePage().props.flash.success)
        },
        preserveScroll: true,
        preserveState: true,
        replace: true,

    })
}

const updateCategory = (id) => {
    router.get(route('page.updateCategory', { id: id }), '',)
}

// search start here
const search = ref('');
watch(search, (newValue) => {
    router.get(`${route('page.categoryView')}?search=${newValue}`, '', {
        preserveScroll: true,
        preserveState: true,

    })
})

// sort by status
const sortByStatus = ref('');
watch(sortByStatus, (newStatus) => {
    if (newStatus !== '') {
        router.get(`${route('page.categoryView')}?status=${newStatus}`, '', {
            preserveScroll: true,
            preserveState: true,

        })
    } else {
        refreshCategories();
    }
})


// sort by new and old category 
const sortByNewOld = ref('newest');
watch(sortByNewOld, (value) => {
    router.get(`${route('page.categoryView')}?order_by=${value}`, '', {
        preserveScroll: true,
        preserveState: true,

    })
})
// sort by slider 
const sortBySlider = ref('');
watch(sortBySlider, (slider) => {
    if (slider !== '') {
        router.get(`${route('page.categoryView')}?sort_by_slider=${slider}`, '', {
            preserveScroll: true,
            preserveState: true,

        })
    } else {
        refreshCategories();
    }
})

const sortByCarousel = ref('');
watch(sortByCarousel, (carousel) => {
    if (carousel !== '') {
        router.get(`${route('page.categoryView')}?sort_by_carousel=${carousel}`, '', {
            preserveScroll: true,
            preserveState: true,

        })
    } else {
        refreshCategories();
    }
})

</script>
<template>
    <Head title="show categories" />
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
                                <span class="text-gray-500 capitalize mr-2">all categories:</span>
                                <span class="dark:text-white">{{ totalCategories }}</span>
                            </h5>


                        </div>

                        <Link as="button" :href="route('page.createCategory')"
                            class="flex items-center  justify-center text-white  font-medium rounded-lg text-sm px-4 py-2 bg-green-400   dark:focus:ring-primary-800 ">
                            Add Category
                        </Link>
                    </div>
                    <!-- table header 1 end  -->



                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">

                        <!-- search field start here -->
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
                                    <input type="text" id="simple-search" v-model="search"
                                        placeholder="Search for category name" required=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </form>
                        </div>
                        <!-- search field start here -->




                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">




                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortByStatus" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>Sort by status</option>
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>

                                    </select>


                                </form>

                            </div>


                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortByNewOld" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="newest" selected>Sort by newest</option>
                                        <option value="oldest">Sort by oldest</option>

                                    </select>


                                </form>

                            </div>
                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto  sm:w-full">

                                    <select v-model="sortBySlider" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>sort by slider</option>
                                        <option :value="true">True</option>
                                        <option :value="false">False</option>

                                    </select>


                                </form>

                            </div>
                            <div class="flex items-center space-x-3 w-full md:w-auto">

                                <form class="max-w-sm mx-auto sm:w-full">

                                    <select v-model="sortByCarousel" id="small"
                                        class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>sort by carousel</option>
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
                                    <th scope="col" class="p-4">Category</th>
                                    <th scope="col" class="p-4">status</th>
                                    <th scope="col" class="p-4">product count</th>
                                    <th scope="col" class="p-4">created at (d/m/y)</th>

                                    <th scope="col" class="p-4">catgory slider</th>
                                    <th scope="col" class="p-4">is carousel</th>

                                    <th scope="col" class="p-4">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id"
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
                                            <img :src="`/storage/${category.cat_logo}`" alt="iMac Front Image"
                                                class="h-8 w-auto mr-3">

                                            <span class="max-w-[18rem] truncate">{{ category.cat_name }}</span>
                                        </div>
                                    </th>


                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span v-if="category.published === 1"
                                            class="text-green-500 capitalize">active</span>
                                        <span v-else class="text-red-500 capitalize">deactive</span>

                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span>{{ category.productCount }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span>{{ category.created_at }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex flex-wrap">
                                            <img :src="`/storage/${category.cat_slider}`" alt="slider"
                                                class="h-8 w-auto mr-3">

                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span class="capitalize">{{ category.isSliderForCarousel === 0 ? false : true
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

                                                        <button @click="deleteCategory(category.id)" type="button"
                                                            class=" capitalize"
                                                            :class="[active ? 'bg-gray-300 text-white' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                            delete</button>


                                                        </MenuItem>


                                                        <MenuItem v-slot="{ active }">


                                                        <button @click="updateCategory(category.id)" type="button"
                                                            class=" capitalize"
                                                            :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                            edit</button>
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
                            <span class="font-semibold text-gray-900 dark:text-white inline-block mx-2"> {{ fromNumber }} -
                                {{ toNumber
                                }}</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white ml-2">{{ totalCategories }}</span>
                        </span>



                        <ul class="inline-flex items-stretch -space-x-px">


                            <!-- links here -->
                            <NavigatorLinksForAdmin :links="navigatorLinks" />
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!-- End block -->
    </admin-layout>
</template>