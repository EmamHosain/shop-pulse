<script setup>
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import AdminLayout from '../../../Layouts/AdminLayout.vue'
import ErrorMessage from '../../../Components/AdminComponent/LayoutComponent/ErrorMessage.vue'
import { computed, reactive, ref } from 'vue'


const props = defineProps({ productUnits: Array })
const units = computed(() => props.productUnits)
const errors = computed(() => usePage().props.errors);

const formData = reactive({
    unitName: ''
});
const selectedUnitName = ref('');
const resetData = () => {
    formData.unitName = ''
}
const createUnit = () => {
    router.post(route('productUnit.store'), {
        unit: formData.unitName
    },
        {
            preserveScroll: true,
            replace: true,
            preserveState: true,
            onError: () => {
                console.log(usePage().props.errors)
            },
            onSuccess: () => {
                console.log('success', usePage().props.flash.success)
                resetData();
            }
        }


    )
}


const getProductUnitSingleObjectFromArray = (unitName) => {
    const singleOjbect = units.value.find((value, index, array) => {
        return value.unit_name === unitName
    })
    return singleOjbect;
}
const updateProductUnit = (unitName) => {
    const object = getProductUnitSingleObjectFromArray(unitName)
    const id = object.id
    const name = document.getElementById('updateProductUnitName').value;

    router.post(route('productUnit.update', { id: id }), {
        _method: 'patch',
        product_unit: name
    },
        {
            preserveScroll: true,
            replace: true,
            preserveState: true,
            onError: () => {
                console.log(usePage().props.errors)
            },
            onSuccess: () => {
                console.log('success', usePage().props.flash.success)
                selectedUnitName.value = name
            }
        }

    )


}


const deleteProductUnit = (unitName) => {
    const singleOjbect = getProductUnitSingleObjectFromArray(unitName);
    router.post(route('productUnit.delete', { id: singleOjbect.id }), { _method: 'delete' },
        {
            preserveScroll: true,
            replace: true,
            preserveState: true,
            onError: () => {
                console.log(usePage().props.errors)
            },
            onSuccess: () => {
                console.log('success', usePage().props.flash.success)
                selectedUnitName.value = ''
            }
        }

    )
}
</script>
<template>
    <Head title="settings" />
    <admin-layout>
        <div class="w-full shadow-md bg-white py-8">

            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Settings</h2>
                    
                </div>



                <div class=" flex w-full gap-4 mt-10">
                    <form @submit.prevent="createUnit" class=" w-1/2">
                        <div class="flex flex-col gap-y-4">
                            <div class="">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900 capitalize">unit
                                    name</label>
                                <div class="mt-2">
                                    <input v-model="formData.unitName" type="text" id="name" autocomplete="off"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Product unit name" />
                                    <ErrorMessage :error-message="errors ? errors.unit : ''" />
                                </div>
                            </div>

                            <div class=" flex justify-start gap-x-6">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </div>
                    </form>


                   
                    <div class="w-1/2">
                        <label for="brand" class="block text-sm font-medium leading-6 text-gray-900 capitalize">Units
                        </label>
                        <div class="mt-2">
                            <select v-model="selectedUnitName" id="brand"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option selected value="">Unit names</option>
                                <option v-for="unit in units" :key="unit.id" :value="unit.unit_name">{{ unit.unit_name }}
                                </option>
                            </select>

                        </div>
                        <div v-if="selectedUnitName" class="mt-4">
                            <div class="flex gap-4">
                                <input :value="selectedUnitName" type="text" id="updateProductUnitName" autocomplete="off"
                                    class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Brand Name" />
                                <button @click="updateProductUnit(selectedUnitName)"
                                    class="bg-green-400 px-4 py-1 rounded-md text-white capitalize">update</button>
                                <button @click="deleteProductUnit(selectedUnitName)"
                                    class="bg-red-400 px-4 py-1 rounded-md text-white capitalize">delete</button>
                            </div>
                            <ErrorMessage :error-message="errors ? errors.product_unit : ''" />
                        </div>
                    </div>


                </div>
            </div>







        </div>
    </admin-layout>
</template>