<script setup>
import ErrorMessage from '@/Components/AdminComponent/LayoutComponent/ErrorMessage.vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import { ref, reactive, computed } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Delete, Download, Plus, ZoomIn } from '@element-plus/icons-vue'
import RemoveIcon from '@/Components/Icons/RemoveIcon.vue';
import XCircleIcon from '@/Components/Icons/XCircleIcon.vue';


const props = defineProps({
    product: Object,
    catIds: Array
})

// console.log('product', props.product)
// console.log('cat id', props.catIds)

const product = computed(() => usePage().props.product);
const catIds = ref(usePage().props.catIds);


const categories = computed(() => usePage().props.categories.data)
const brands = computed(() => usePage().props.brands.data)
const errors = computed(() => usePage().props.errors ?? '');

const images = ref([]);
const rawImages = ref([]);

const submit = () => {


    for (const image of images.value) {
        rawImages.value.push(image.raw);
    }

    router.post(route('product.update', { id: props.product.id }),
        {
            _method:'patch',
            title: product.value.title,
            short_description: product.value.short_description,
            long_description: product.value.long_description,
            price: product.value.price,
            quantity: product.value.quantity,
            brand: product.value.brand_id,
            status: product.value.published,
            categories: catIds.value,
            images: rawImages.value,
            discount_percentage: product.value.discount_percentage
        },

        {
            forceFormData:true,
            preserveScroll: true,
            preserveState: true,
            replace: true,
            onSuccess: () => {
                console.log('success message', usePage().props.flash.success);
                images.value = []
            },
            onError: () => {
                console.log('errors', usePage().props.errors);
            },
            onBefore: () => {
                // console.log('images', rawImages.value);
                // console.log('data', product.value)
            }
        });
};


const removeImage = (imageId, productId) => {
    router.delete(route('product.image.delete', {
        productId: productId,
        imageId: imageId
    }), {
        onBefore: () => {
            return confirm('Are you sure?')
        },
        onSuccess: () => {
            console.log('success', usePage().props.flash.success)
        },
        onError: () => {
            console.log('error', usePage().props.flash.error)
        },
        preserveScroll: true,
        preserveState: true,
        replace: true
    })
}














const handleFileChange = (file) => {
    images.value.push(file);

}
const dialogImageUrl = ref('')
const dialogVisible = ref(false)
const disabled = ref(false)
const handleRemove = (file) => {
    images.value = images.value.filter(item => item.uid !== file.uid);
}

const handlePictureCardPreview = (file) => {
    dialogImageUrl.value = file.url
    dialogVisible.value = true
}
</script>
<template>
    <Head title="update product" />
    <admin-layout>
        <div class="w-full shadow-md bg-white">

            <form @submit.prevent="submit" class="max-w-7xl mx-auto p-4">
                <div class=" space-y-4">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900 capitalize">update Product</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full flex md:flex-row sm:flex-col gap-3">
                                <div class="w-1/2 sm:w-full">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">Product
                                        Name<span class="text-red-500 text-xs"> (required)</span></label>
                                    <div class="mt-2">
                                        <input v-model="product.title" type="text" id="name" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Product Name" />
                                        <ErrorMessage :error-message="errors ? errors.title : ''" />
                                    </div>
                                </div>
                                <div class="w-1/2 sm:w-full">
                                    <label for="Quantity"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">
                                        quantity <span class="text-red-500 text-xs">(required)</span></label>
                                    <div class="mt-2">
                                        <input v-model="product.quantity" type="number" id="Quantity" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Quantity" />
                                        <ErrorMessage :error-message="errors ? errors.quantity : ''" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full flex md:flex-row sm:flex-col gap-3">
                                <div class="w-1/2 sm:w-full">
                                    <label for="price"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">price <span
                                            class="text-red-500 text-xs">(required)</span></label>
                                    <div class="mt-2">
                                        <input v-model="product.price" type="number" id="price" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Product price" />
                                        <ErrorMessage :error-message="errors ? errors.price : ''" />

                                    </div>
                                </div>
                                <div class="w-1/2 sm:w-full">
                                    <label for="dis_percentage"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">discount
                                        percentage</label>
                                    <div class="mt-2">
                                        <input v-model="product.discount_percentage" type="number" id="dis_percentage"
                                            autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Percentage %" />
                                        <ErrorMessage :error-message="errors ? errors.discount_percentage : ''" />

                                    </div>
                                </div>
                            </div>




                            <div class="col-span-full">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900 capitalize">short description
                                    <span class="text-red-500 text-xs">(required)</span></label>
                                <div class="mt-2">
                                    <textarea v-model="product.short_description" id="description" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"
                                        placeholder="Short Description"></textarea>
                                    <ErrorMessage :error-message="errors ? errors.short_description : ''" />

                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900 capitalize">long
                                    Description</label>
                                <div class="mt-2">
                                    <textarea v-model="product.long_description" id="description" rows="6"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"
                                        placeholder="Long Description"></textarea>
                                    <ErrorMessage :error-message="errors ? errors.long_description : ''" />

                                </div>
                            </div>





                            <div class="col-span-full flex flex-col md:flex-row gap-3">

                                <div class="md:w-1/3 sm:w-full">
                                    <label for="brand"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">brand </label>
                                    <div class="mt-2">
                                        <select v-model="product.brand_id" id="brand"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="" selected>Select a brand</option>
                                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{
                                                brand.brand_name }}</option>
                                        </select>
                                        <ErrorMessage :error-message="errors ? errors.brand : ''" />

                                    </div>
                                </div>
                                <div class="md:w-1/3 flex  items-center sm:items-start sm:w-full">

                                    <div class="md:mx-auto">
                                        <label class="block text-sm font-medium leading-6 text-gray-900 capitalize">status
                                            <span class="text-red-500 text-xs">(required)</span></label>
                                        <div class="flex gap-x-4 items-center">
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="active" name="status" :value="true"
                                                    v-model="product.published">
                                                <label for="active">active</label>
                                            </div>
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="diactive" name="status" :value="false"
                                                    v-model="product.published">
                                                <label for="diactive">deactive</label>
                                            </div>

                                        </div>
                                        <ErrorMessage :error-message="errors ? errors.status : ''" />

                                    </div>
                                </div>

                                <div class="md:w-1/3 sm:w-full">
                                    <!-- brand -->
                                    <label class="block text-sm font-medium leading-6 text-gray-900 capitalize">category
                                        <span class="text-red-500 text-xs">(required)</span></label>
                                    <div class=" w-full mt-2">
                                        <el-select class="w-full" v-model="catIds" multiple filterable allow-create
                                            default-first-option :reserve-keyword="false" placeholder="Select categories">
                                            <el-option v-for="category in categories" :key="category.value"
                                                :label="category.cat_name" :value="category.id" />
                                        </el-select>
                                        <ErrorMessage :error-message="errors ? errors.categories : ''" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full flex md:flex-row sm:flex-col gap-3">

                                <div class="w-full flex flex-wrap gap-4 border-2 py-4 px-4">


                                    <div class=" relative" v-for="image in product.product_images" :key="image.id">
                                        <img class=" max-w-20 h-auto" :src="`/storage/${image.image}`" alt="">

                                        <XCircleIcon @click.prevent="removeImage(image.id, product.id)"
                                            class="size-6 text-red-500 absolute top-0 right-0 cursor-pointer" />
                                    </div>




                                </div>

                            </div>


                            <div class="col-span-full flex md:flex-row sm:flex-col gap-3">

                                <div class="w-full">
                                    <label class="block text-sm font-medium leading-6 text-gray-900 capitalize">Image <span
                                            class="text-red-500 text-xs">(required)</span></label>
                                    <el-upload action="#" list-type="picture-card" :auto-upload="false" :multiple="true"
                                        :on-change="handleFileChange" v-model:file-list="images">
                                        <el-icon>
                                            <Plus />
                                        </el-icon>

                                        <template #file="{ file }">
                                            <div>
                                                <img class="el-upload-list__item-thumbnail" :src="file.url" alt="" />
                                                <span class="el-upload-list__item-actions">
                                                    <span class="el-upload-list__item-preview"
                                                        @click="handlePictureCardPreview(file)">
                                                        <el-icon><zoom-in /></el-icon>
                                                    </span>

                                                    <span v-if="!disabled" class="el-upload-list__item-delete"
                                                        @click="handleRemove(file)">
                                                        <el-icon>
                                                            <Delete />
                                                        </el-icon>
                                                    </span>
                                                </span>
                                            </div>
                                        </template>
                                    </el-upload>

                                    <el-dialog v-model="dialogVisible">
                                        <img w-full :src="dialogImageUrl" alt="Preview Image" />
                                    </el-dialog>
                                    <ErrorMessage :error-message="errors ? errors.images : ''" />

                                </div>

                            </div>



                        </div>
                    </div>

                    <div class=" flex justify-start gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </admin-layout>
</template>