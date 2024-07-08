<script setup>
import { ref, computed } from 'vue';
import PlusIcon from '../Icons/PlusIcon.vue';
import MinusIcon from '../Icons/MinusIcon.vue';
import WishListIcon from '../Icons/WishListIcon.vue';
import CartIcon from '../Icons/CartIcon.vue';
import Teliphone from '../Icons/Teliphone.vue';
import SingleProduct from './SingleProduct.vue';
import { router, usePage } from '@inertiajs/vue3';
import Category from './Category.vue';
import BreadcrumbSection from './BreadcrumbSection.vue';
import useProduct from '@/Composables/useProduct';


const { addToCart, addToWishList, productBuyNow } = useProduct();
const product = computed(() => usePage().props.product);
const relatedProducts = computed(() => usePage().props.related_products);
// console.log('products',relatedProducts);

const active = ref(0);



const productsByCategory = (slug) => {
    router.get(route('page.productsByCategory', slug), '', {
        preserveState: true,
        preserveScroll: true,
        onError: (errors) => {
            console.log('category error', errors)
        }
    })
}


// product quantity function start here
const quantity = ref(1);
const incrementQuantity = () => {
    quantity.value = quantity.value + 1
}

const decrementQuantity = () => {
    if (quantity.value >= 2) {
        quantity.value = quantity.value - 1

    } else {
        return;
    }
}






</script>
<template>
    <div class="font-sans">
        <div class="p-4 container">


            <!-- category header start here -->
            <Category />
            <!-- category header end here -->
            <BreadcrumbSection :link="'product details'" />




            <!-- cart start here -->
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">


                <!-- images start here -->
                <div
                    class="min-h-[500px] lg:col-span-3 bg-gradient-to-tr  from-[#F8C794] via-[#FFE0B5] to-[#FFF2D7] rounded-lg w-full  top-0 text-center p-6">
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



                <!-- product details section start here -->

                <div class="lg:col-span-2">
                    <!-- heading -->
                    <h2 class="text-2xl font-bold text-gray-800 my-1">{{ product.title }}</h2>
                    <!-- stock -->
                    <div class="mb-1">
                        <span class=" inline-block mr-2 capitalize">stock</span>
                        <span class="bg-blue-400 text-white px-2 rounded-xl">{{ product.quantity }}</span>
                    </div>
                    <div>
                        <!-- <span>category : </span> <span class="font-bold">{{ product.category }}</span> -->
                    </div>
                    <div>
                        <span class=" text-2xl font-bold mr-2">Tk {{ product.discount_price ? product.discount_price
                            : product.price }}</span>


                        <del v-if="product.discount_price" class="text-gray-400 text-sm mr-2">Tk {{ product.price }}</del>
                        <span v-if="product.discount_price" class="text-blue-400 font-semibold">{{ product.discount_amount
                        }} TK OFF</span>
                    </div>





                    <hr />
                    <!-- short description -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">{{ product.short_description }}</h3>
                    </div>

                    <!-- product quantity start here -->
                    <div class="mt-8">
                        <h3 class="text-lg font-bold text-gray-800">Quantity</h3>
                        <div class="flex divide-x border w-max mt-4 rounded overflow-hidden">
                            <!-- decrement button -->
                            <button @click="decrementQuantity()" type="button"
                                class="bg-gray-100 w-10 h-9 font-semibold flex items-center justify-center">
                                <MinusIcon class="w-5 h-5" />
                            </button>

                            <!-- quantity button  -->
                            <button type="button"
                                class="bg-transparent w-10 h-9 font-semibold flex items-center justify-center text-gray-800 text-lg">
                                {{ quantity }}
                            </button>



                            <!-- increment button -->
                            <button @click="incrementQuantity()" type="button"
                                class="bg-gray-800 text-white w-10 h-9 font-semibold flex items-center justify-center">
                                <PlusIcon class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                    <!-- product quantity end here -->


                    <!-- action button start here -->
                    <div class="flex gap-4 mb-4">
                        <button @click="productBuyNow(product.id)" type="button"
                            class=" mt-8 px-6 py-3 custom-gradient text-white text-sm font-semibold rounded-md">Buy
                            Now</button>

                        <button @click="addToWishList(product.id)" type="button"
                            class=" mt-8 px-6 py-3 custom-gradient text-white text-sm font-semibold rounded-md">
                            <WishListIcon :size="20" />
                            <!-- <span> Add to wishlist</span> -->
                        </button>

                        <button @click="addToCart(product.id)" type="button"
                            class=" mt-8 px-6 py-3 flex justify-center items-center gap-2 custom-gradient text-white text-sm font-semibold rounded-md">
                            <CartIcon :size="18" />
                            <span> Add to cart</span>
                        </button>
                    </div>
                    <!-- action button end here -->






                    <!-- brand start here -->
                    <p><span class=" capitalize">brand</span> : <span
                            class=" font-semibold text-sm cursor-pointer hover:text-blue-400 capitalize">{{
                                product.brand.brand_name }}</span>
                    </p>
                    <!-- brand end here -->


                    <!-- category start here -->
                    <p v-if="product.categories.length >= 2">
                        <span class=" capitalize  text-sm">related categories</span> :
                        <span @click="productsByCategory(category.slug)" v-for="category in product.categories"
                            :key="category.id" class="bg-blue-400 text-white px-3 py-1 rounded-md  cursor-pointer">{{
                                category.cat_name }}</span>
                    </p>
                    <p v-if="product.categories.length == 1">
                        <span class=" capitalize  text-sm">category</span> :
                        <span @click="productsByCategory(product.categories[0].slug)"
                            class=" font-semibold capitalize cursor-pointer hover:text-blue-400">{{
                                product.categories[0].cat_name }}</span>
                    </p>
                    <p v-else>
                        <span class=" capitalize  text-sm">category</span> :
                        <span>empty</span>
                    </p>
                    <!-- category end here -->


                    <hr class="mt-4">
                    <div class="py-4">
                        <p class="flex items-center gap-2">
                            <span>
                                <Teliphone class="w-7 h-7" />
                            </span>
                            <span class="text-2xl font-semibold capitalize">call for order 01626691836</span>



                        </p>
                    </div>
                    <hr>



                </div>
                <!-- product details section end here -->
            </div>




            <!-- cart long description start here -->
            <div class="mt-20 mb-10">
                <el-tabs type="border-card">
                    <el-tab-pane label="Long description">{{ product.long_description }}</el-tab-pane>
                    <el-tab-pane label="How to buy">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo
                        asperiores repellendus sunt illo voluptatum. Rerum nesciunt beatae voluptate vel placeat, ea magnam
                        pariatur blanditiis! Placeat, nam qui! Minima animi possimus id ipsam molestiae nesciunt dolorem
                        dicta perferendis fugit praesentium?</el-tab-pane>
                    <el-tab-pane label="Return policy">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum
                        consequatur quaerat ex iusto deserunt rerum sunt ullam, ratione illum! Labore, libero tempore itaque
                        voluptatem quisquam nisi hic amet ullam animi.</el-tab-pane>

                </el-tabs>
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
                        <SingleProduct :productItems="relatedProducts" />

                    </div>
                </div>
            </section>
            <!-- related products end here -->

        </div>
    </div>
</template>
<style scoped>
.custom-gradient {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);
    transition: 0.3s all;
}

.custom-gradient:hover {
    background: linear-gradient(90deg, #1d61ad, #4d99d6);
    transition: 0.3s all;
}

.cart-btn {
    border-radius: 3px 0px 0px 3px;
}

.wishlist-btn {
    transition: 0.3s all;
    background: linear-gradient(90deg, #1d61ad, #4d99d6);
    border-radius: 0px 3px 3px 0px;
}

.wishlist-btn:hover {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);

}

.cart-btn:hover {
    background: linear-gradient(90deg, #1d61ad, #4d99d6);

}
</style>