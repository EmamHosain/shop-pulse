<script setup>
import { Link } from "@inertiajs/vue3"


const props = defineProps({
    link: String
})


</script>
<template>
    <ul class="flex items-center justify-end  font-[sans-serif] space-x-3">
        <li class="text-gray-400  text-xs font-bold cursor-pointer">
            <Link :href="route('page.home')">
            Home
            </Link>
        </li>

        <li>
            <span class="item">
                <svg xmlns="http://www.w3.org/2000/svg" class=" w-2 -rotate-90" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                        clip-rule="evenodd" data-original="#000000"></path>
                </svg>
            </span>
        </li>


        <li class="text-xs font-semibold  capitalize">
            {{ link }}
        </li>
    </ul>
</template>


<style scoped>
.item {
    display: inline-block;
    color: rgba(128, 128, 128, 0.156);
}
</style>
