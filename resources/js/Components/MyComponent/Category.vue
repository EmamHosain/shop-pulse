<script setup>
import ListIcon from '../../Components/Icons/ListIcon.vue'
import DownArrowIcon from '../../Components/Icons/DownArrowIcon.vue'

import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import useProduct from '@/Composables/useProduct';
const open = ref(false);
const categories = usePage().props.categories.data;
const { getProductsByCategory } = useProduct();
</script>
<template>
    <ul class="category-container-xyz">

        <li class="relative flex items-start w-fit li-item" @mouseenter="open = true" @mouseleave="open = false">
            <button type="button" @click="fun" class="btn flex items-center gap-2 py-4 px-4" :aria-expanded="open">
                <ListIcon />
                <div class="flex gap-10 justify-between items-center">
                    <span class="font-bold uppercase">browse categories</span>
                    <DownArrowIcon />
                </div>
            </button>

            <Transition enter-active-class="transition ease-out duration-200 transform z-50"
                enter-from-class="opacity-0 -translate-y-4" enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition ease-out duration-200" leave-from-class="opacity-100"
                leave-to-class="opacity-0">


                <ul v-show="open"
                    class="origin-top-right absolute top-full left-0  min-w-[292px] bg-white border border-slate-200 p-2  shadow-xl">
                    <li v-for="category, index in categories" :key="index">
                        <button @click="getProductsByCategory(category.slug)"
                            class="text-slate-800 hover:bg-slate-50 flex items-center p-2 w-full">
                            <span class="whitespace-nowrap">{{ category.cat_name }}</span>
                        </button>
                    </li>
                </ul>
            </Transition>

        </li>
    </ul>
</template>


<style scoped>
.li-item {
    transition: 0.3s all;
}

.li-item:hover {
    background-color: #4893D2;
    color: white;
}

.btn {
    border-left: 1px solid rgba(0, 0, 0, 0.051);
    border-right: 1px solid rgba(0, 0, 0, 0.051);
    /* transition: 0.3s all; */
}

/* .btn:hover {
    background-color: #4893D2;
    color: white;
} */


.item {
    background-color: red;
}

.category-container-xyz {
    z-index: 99999999;
}
</style>