<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ErrorMessage from '@/Components/AdminComponent/LayoutComponent/ErrorMessage.vue';
import { usePage, Link, Head, router } from '@inertiajs/vue3';
import { ref, computed, reactive } from 'vue'
import { Delete, Download, Plus, ZoomIn } from '@element-plus/icons-vue'

const props = defineProps({
    category: Object
})

const categori = computed(() => props.category)
// console.log(category.value)
const errors = computed(() => usePage().props.errors ?? '');

const form = reactive({
    name: categori.value.cat_name,
    status: Boolean(categori.value.published),
    carousel: Boolean(categori.value.isSliderForCarousel),
    categoryLogo: '',
    categorySlider: '',

});


const resetFormValue = () => {
    // form.name = '';
    // form.status = '';
    // form.categoryLogo = '';
    // form.categorySlider = '';

    document.getElementById('cat_logo').value = ''
    document.getElementById('cat_slider').value = ''

}


const submit = () => {


    router.post(route('category.update', { id: categori.value.id }),
        {
            _method: 'patch',
            category_name: form.name,
            status: form.status,
            category_logo: form.categoryLogo,
            category_slider: form.categorySlider,
            carousel: form.carousel,

        }, {
        forceFormData: true,
        preserveScroll: true,
        preserveState: true,
        replace: true,
        onSuccess: () => {
            if (usePage().props.flash.success) {
                console.log('success message', usePage().props.flash.success);
                resetFormValue();
            } else {
                console.log('error message', usePage().props.flash.error);
            }
        },
        onError: () => {
            console.log('errors', usePage().props.errors);
        }
    });
};


//for category logo start here
const categoryLogoChange = (event) => {
    form.categoryLogo = event.target.files[0];
}
const categorySliderChange = (event) => {
    form.categorySlider = event.target.files[0];
}
//for category logo end here



</script>
<template>
    <Head title="update category" />
    <admin-layout>
        <div class="w-full shadow-md bg-white">

            <form @submit.prevent="submit" class="max-w-7xl mx-auto p-4">
                <div class=" space-y-4">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Create category</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full flex md:flex-row sm:flex-col gap-3">
                                <div class="w-1/3 sm:w-full">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">category
                                        name<span class="text-red-500 text-xs"> (required)</span></label>
                                    <div class="mt-2">
                                        <input v-model="form.name" type="text" id="name" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Product Name" />
                                        <ErrorMessage :error-message="errors ? errors.category_name : ''" />
                                    </div>
                                </div>

                                <div class="w-1/3 flex  items-center sm:w-full">

                                    <div class="mx-auto">
                                        <label class="block text-sm font-medium leading-6 text-gray-900 capitalize">status
                                            <span class="text-red-500 text-xs">(required)</span></label>
                                        <div class="flex gap-x-4 items-center mt-2">
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="active" name="status" :value="true"
                                                    v-model="form.status">
                                                <label for="active">active</label>
                                            </div>
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="diactive" name="status" :value="false"
                                                    v-model="form.status">
                                                <label for="diactive">deactive</label>
                                            </div>

                                        </div>
                                        <ErrorMessage :error-message="errors ? errors.status : ''" />

                                    </div>
                                </div>
                                <div class="w-1/3 flex sm:w-full  items-center">

                                    <div class="">
                                        <label class="block text-sm font-medium leading-6 text-gray-900 capitalize">
                                            carousel
                                        </label>
                                        <div class="flex gap-x-4 items-center mt-2">
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="carousel-active" name="carousel" :value="true"
                                                    v-model="form.carousel">
                                                <label for="carousel-active">active</label>
                                            </div>
                                            <div class="flex gap-2 items-center capitalize">
                                                <input type="radio" id="carousel-deactive" name="carousel" :value="false"
                                                    v-model="form.carousel">
                                                <label for="carousel-deactive">deactive</label>
                                            </div>

                                        </div>
                                        <ErrorMessage :error-message="errors ? errors.carousel : ''" />

                                    </div>
                                </div>







                            </div>

                            <div class="col-span-full flex md:flex-row sm:flex-col gap-8 items-center">
                                <div>
                                    <img class=" max-w-20 h-auto" :src="`/storage/${categori.cat_logo}`" alt="">
                                </div>

                                <div class="w-full">
                                    <label for="cat_logo"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">category
                                        logo </label>

                                    <input type="file" id="cat_logo" @change="categoryLogoChange"
                                        class="block w-full rounded-md mt-2 py-1  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Product Name" />

                                    <ErrorMessage :error-message="errors ? errors.category_logo : ''" />

                                </div>

                            </div>


                            <div class="col-span-full flex md:flex-row sm:flex-col gap-8">
                                <img class="w-full max-h-40 object-cover object-center"
                                    :src="`/storage/${categori.cat_slider}`" alt="">
                            </div>


                            <div class="col-span-full flex md:flex-row sm:flex-col gap-8">

                                <div class="w-full">
                                    <label for="cat_logo"
                                        class="block text-sm font-medium leading-6 text-gray-900 capitalize">category
                                        slider </label>

                                    <input type="file" id="cat_slider" @change="categorySliderChange"
                                        class="block w-full rounded-md mt-2 py-1  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Product Name" />

                                    <ErrorMessage :error-message="errors ? errors.category_slider : ''" />

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