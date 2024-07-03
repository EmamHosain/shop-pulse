<script setup>
import { ElMessage } from 'element-plus';
import { ArrowDown } from '@element-plus/icons-vue';
import { router } from '@inertiajs/vue3'
import RightArrowIcon from '../../../Components/Icons/RightArrowIcon.vue'



const handleCommand = (command) => {
    // ElMessage(`click on item ${command}`);
    if (command === 'a') {
        router.get(route('profile.show'), '')
    }
    if (command === 'b') {
        router.post(route('logout'), '')
    }
    
};

</script>
<template>
    <!-- Navbar -->
    <header class="relative flex flex-col items-center bg-white px-4 py-4 shadow sm:flex-row md:h-20">
        <div
            class="flex w-full flex-col justify-end overflow-hidden transition-all sm:max-h-full sm:flex-row sm:items-center">

            <ul class="mx-auto mt-4 flex space-x-6 sm:mx-5 sm:mt-0">
                <li>
                    <el-dropdown @command="handleCommand">

                        <span class="el-dropdown-link">
                            <button
                                class="flex h-8 w-8 items-center justify-center rounded-xl border text-gray-600 hover:text-black hover:shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </span>


                        <template #dropdown>
                            <el-dropdown-menu>
                                <el-dropdown-item command="a">Profile</el-dropdown-item>
                                <el-dropdown-item command="b">Logout</el-dropdown-item>
                            </el-dropdown-menu>
                        </template>
                    </el-dropdown>
                </li>

            </ul>
        </div>
    </header>
    <!-- /Navbar -->
</template>
<style scoped>
.example-showcase .el-dropdown-link {
    cursor: pointer;
    color: var(--el-color-primary);
    display: flex;
    align-items: center;
}
</style>