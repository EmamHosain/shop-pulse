<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, usePage, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, computed, watch } from 'vue';
import DotButton from '../../../Components/AdminComponent/LayoutComponent/DotButton.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import DownArrowIcon from '@/Components/Icons/DownArrowIcon.vue';
import NavigatorLinksForAdmin from '@/Components/MyComponent/NavigatorLinksForAdmin.vue';
const props = defineProps({
    products: Object
})

// console.log(props.products)
const products = computed(() => props.products.data);
const navigatorLinks = computed(() => props.products.links);
const fromNumber = computed(() => props.products.from);
const toNumber = computed(() => props.products.to);
const totalNumber = computed(() => props.products.total);






// console.log(fromNumber.value)
const categories = computed(() => usePage().props.categories.data);
const brands = computed(() => usePage().props.brands.data);



// sorting code start here
const refreshProducts = () => {
    router.get(route('page.productView'), '', {
        preserveScroll: true,
        preserveState: true
    })
}

const searchProduct = ref('');
const sortByCategory = ref('');
const sortByBrand = ref('');
const orderBy = ref('');
const sortByStatus = ref('');
watch(searchProduct, (newSearch) => {
    router.get(`${route('page.productView')}?search=${newSearch}`, '', {
        preserveScroll: true,
        preserveState: true,
    })
})

watch(sortByCategory, (newCategory) => {
    if (newCategory !== '') {
        router.get(`${route('page.productView')}?category=${newCategory}`, '', {
            preserveScroll: true,
            preserveState: true,
        })
    } else {
        refreshProducts();
    }

})
watch(sortByBrand, (newBrand) => {
    if (newBrand !== '') {
        router.get(`${route('page.productView')}?brand=${newBrand}`, '', {
            preserveScroll: true,
            preserveState: true,
        })
    } else {
        refreshProducts();
    }

})
watch(sortByStatus, (newStatus) => {
    if (newStatus !== '') {
        router.get(`${route('page.productView')}?status=${newStatus}`, '', {
            preserveScroll: true,
            preserveState: true,
        })
    } else {
        refreshProducts();
    }

})

watch(orderBy, (newOrder) => {
    if (newOrder !== '') {
        if (newOrder === 'price_asc') {
            router.get(`${route('page.productView')}?price=asc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'price_desc') {
            router.get(`${route('page.productView')}?price=desc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_price_asc') {
            router.get(`${route('page.productView')}?dis_price=asc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_price_desc') {
            router.get(`${route('page.productView')}?dis_price=desc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_amount_asc') {
            router.get(`${route('page.productView')}?dis_amount=asc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_amount_desc') {
            router.get(`${route('page.productView')}?dis_amount=desc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'stock_asc') {
            router.get(`${route('page.productView')}?stock=asc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'stock_desc') {
            router.get(`${route('page.productView')}?stock=desc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_percentage_asc') {
            router.get(`${route('page.productView')}?dis_percentage=asc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        } else if (newOrder === 'dis_percentage_desc') {
            router.get(`${route('page.productView')}?dis_percentage=desc`, '', {
                preserveScroll: true,
                preserveState: true,
            })
        }





    } else {
        refreshProducts();
    }

})

</script>
<template>
    <Head title="product view" />
    <admin-layout>
        <div>

            <!-- Start block -->
            <section class="bg-gray-50  p-3 sm:p-5 antialiased">
                <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                        <!-- table header 1 start  -->
                        <div
                            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="flex-1 flex items-center space-x-2">
                                <h5>
                                    <span class="text-gray-500 mr-2">All Products:</span>
                                    <span class="dark:text-white">{{ totalNumber }}</span>
                                </h5>


                            </div>
                            <div
                                class="flex-shrink-0 flex flex-col items-start md:flex-row md:items-center lg:justify-end space-y-3 md:space-y-0 md:space-x-3">
                                <Link as="button" :href="route('page.createProduct')"
                            class="flex items-center  justify-center text-white  font-medium rounded-lg text-sm px-4 py-2 bg-green-400   dark:focus:ring-primary-800 ">
                            Add Product
                        </Link>
                            </div>
                        </div>
                        <!-- table header 1 end  -->



                        <div
                            class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                            <!-- search start here -->
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
                                        <input v-model="searchProduct" type="text" id="simple-search"
                                            placeholder="Search for products"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </form>
                            </div>
                            <!-- search end here -->




                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">




                                <!-- sort by category start-->
                                <div class="flex items-center space-x-3 w-full md:w-auto">

                                    <form class="max-w-sm mx-auto  sm:w-full">

                                        <select v-model="sortByCategory" id="small"
                                            class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected>sort by category</option>
                                            <option v-for="category in categories" :key="category.id"
                                                :value="category.slug">{{ category.cat_name }}</option>

                                        </select>


                                    </form>

                                </div>
                                <!-- sort by category end-->

                                <div class="flex items-center space-x-3 w-full md:w-auto">

                                    <form class="max-w-sm mx-auto  sm:w-full">

                                        <select v-model="sortByBrand" id="small"
                                            class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected>sort by brand</option>
                                            <option v-for="brand in brands" :key="brand.id" :value="brand.slug">{{
                                                brand.brand_name }}</option>

                                        </select>


                                    </form>

                                </div>
                                <!-- sort by status -->
                                <div class="flex items-center space-x-3 w-full md:w-auto">

                                    <form class="max-w-sm mx-auto sm:w-full">

                                        <select v-model="sortByStatus" id="small"
                                            class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected>sort by status</option>
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>


                                        </select>


                                    </form>

                                </div>


                                <!-- order by ascending and descending -->
                                <div class="flex items-center space-x-3 w-full md:w-auto">

                                    <form class="max-w-sm mx-auto  sm:w-full">

                                        <select v-model="orderBy" id="small"
                                            class="block w-full px-4 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected>Order by</option>
                                            <!-- price -->
                                            <option value="price_asc">Price(ASC)</option>
                                            <option value="price_desc">Price(DESC)</option>
                                            <!-- discount price -->
                                            <option value="dis_price_asc">Discount Price(ASC)</option>
                                            <option value="dis_price_desc">Discount Price(DESC)</option>
                                            <!-- discount amount -->
                                            <option value="dis_amount_asc">Discount Amount(ASC)</option>
                                            <option value="dis_amount_desc">Discount Amount(DESC)</option>
                                            <!-- stock -->
                                            <option value="stock_asc">Stock(ASC)</option>
                                            <option value="stock_desc">Stock(DESC)</option>
                                            <!-- discount percentage -->
                                            <option value="dis_percentage_asc">Discount Percentage(ASC)</option>
                                            <option value="dis_percentage_desc">Discount Percentage(DESC)</option>
                                        </select>


                                    </form>

                                </div>






                                <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add product
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" type="checkbox"
                                                    class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4">Product</th>
                                        <th scope="col" class="p-4">Category</th>
                                        <th scope="col" class="p-4 capitalize">brand</th>
                                        <th scope="col" class="p-4">Stock</th>
                                        <th scope="col" class="p-4">status</th>
                                        <th scope="col" class="p-4">price</th>
                                        <th scope="col" class="p-4">discount price</th>
                                        <th scope="col" class="p-4">discount amount</th>
                                        <th scope="col" class="p-4">discount percentage</th>
                                        <th scope="col" class="p-4">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products" :key="product.id"
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
                                                <img :src="`/storage/${product.product_images[0].image}`"
                                                    alt="iMac Front Image" class="h-8 w-auto mr-3">

                                                <span class="max-w-[18rem] truncate">{{ product.title }}</span>
                                            </div>
                                        </th>
                                        <td class="px-4 py-3">
                                            <div class="flex flex-wrap gap-1">
                                                <span v-for="category in product.categories" :key="category.id"
                                                    class="bg-green-500 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300 whitespace-nowrap ">{{
                                                        category.cat_name
                                                    }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex flex-wrap gap-1">
                                                <span
                                                    class="bg-green-500 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300 whitespace-nowrap ">{{
                                                        product.brand.brand_name
                                                    }}</span>
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                <div v-if="product.quantity < 5"
                                                    class="h-4 w-4 rounded-full inline-block mr-2 bg-red-700"></div>
                                                <div v-else class="h-4 w-4 rounded-full inline-block mr-2 bg-green-700">
                                                </div>
                                                {{ product.quantity }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                            <span v-if="product.published === true"
                                                class=" capitalize text-green-500">active</span>
                                            <span v-else class=" capitalize text-red-500">deactive</span>

                                        </td>
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Math.round(product.price) }} Tk</td>
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ product.discount_price }} Tk</td>
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Math.round(product.discount_amount) }} Tk</td>
                                        <td class="px-4 py-3">{{ product.discount_percentage }}%</td>

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
                                                            <Link as="button" method="delete"
                                                                :href="route('product.delete', product.id)"
                                                                class=" capitalize"
                                                                :class="[active ? 'bg-gray-300 text-white' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                            delete</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">

                                                            <Link as="button"
                                                                :href="route('page.updateProduct', product.id)"
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
                                <span class="font-semibold text-gray-900 dark:text-white"> {{ fromNumber }} - {{ toNumber
                                }}</span>
                                of
                                <span class="font-semibold text-gray-900 dark:text-white">{{ totalNumber }}</span>
                            </span>
                            <ul class="inline-flex items-stretch -space-x-px">
                                <NavigatorLinksForAdmin :links="navigatorLinks" />
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <!-- End block -->



        </div>
    </admin-layout>
</template>