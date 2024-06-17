<script setup>
import ListIcon from '../../Components/Icons/ListIcon.vue'
import DownArrowIcon from '../../Components/Icons/DownArrowIcon.vue'

import { ref } from 'vue';
const open = ref(false);


</script>
<template>
    <ul class="">

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
                    <li>
                        <a class="text-slate-800 hover:bg-slate-50 flex items-center p-2" href="#">
                            <div
                                class="flex items-center justify-center bg-white border border-slate-200 rounded shadow-sm h-7 w-7 shrink-0 mr-3">
                                <svg class="fill-indigo-500" xmlns="http://www.w3.org/2000/svg" width="9" height="12">
                                    <path
                                        d="M8.724.053A.5.5 0 0 0 8.2.1L4.333 3H1.5A1.5 1.5 0 0 0 0 4.5v3A1.5 1.5 0 0 0 1.5 9h2.833L8.2 11.9a.5.5 0 0 0 .8-.4V.5a.5.5 0 0 0-.276-.447Z" />
                                </svg>
                            </div>
                            <span class="whitespace-nowrap">Priority Ratings</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-slate-800 hover:bg-slate-50 flex items-center p-2" href="#">
                            <div
                                class="flex items-center justify-center bg-white border border-slate-200 rounded shadow-sm h-7 w-7 shrink-0 mr-3">
                                <svg class="fill-indigo-500" xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                                    <path
                                        d="M11.953 4.29a.5.5 0 0 0-.454-.292H6.14L6.984.62A.5.5 0 0 0 6.12.173l-6 7a.5.5 0 0 0 .379.825h5.359l-.844 3.38a.5.5 0 0 0 .864.445l6-7a.5.5 0 0 0 .075-.534Z" />
                                </svg>
                            </div>
                            <span class="whitespace-nowrap">Insights</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-slate-800 hover:bg-slate-50 flex items-center p-2" href="#">
                            <div
                                class="flex items-center justify-center bg-white border border-slate-200 rounded shadow-sm h-7 w-7 shrink-0 mr-3">
                                <svg class="fill-indigo-500" xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                                    <path d="M6 0a6 6 0 1 0 0 12A6 6 0 0 0 6 0ZM2 6a4 4 0 0 1 4-4v8a4 4 0 0 1-4-4Z" />
                                </svg>
                            </div>
                            <span class="whitespace-nowrap">Item Mirror</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-slate-800 hover:bg-slate-50 flex items-center p-2" href="#">
                            <div
                                class="flex items-center justify-center bg-white border border-slate-200 rounded shadow-sm h-7 w-7 shrink-0 mr-3">
                                <svg class="fill-indigo-500" xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                                    <path
                                        d="M10.866.134a.458.458 0 0 0-.481-.106L.302 3.695a.458.458 0 0 0-.014.856l4.4 1.76 1.76 4.4c.07.175.24.29.427.29h.007a.458.458 0 0 0 .424-.302L10.973.615a.458.458 0 0 0-.107-.48Z" />
                                </svg>
                            </div>
                            <span class="whitespace-nowrap">Support Center</span>
                        </a>
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
</style>