<script setup>
import HeaderNavbar from '../Components/AdminComponent/LayoutComponent/HeaderNavbar.vue'
import MainComponent from '../Components/AdminComponent/LayoutComponent/Main.vue'
import Navbar from '../Components/AdminComponent/LayoutComponent/Main.vue'
import Sidebar from '../Components/AdminComponent/LayoutComponent/Sidebar.vue'



</script>
<template>
    <div class="bg-slate-200 flex h-screen">

        <Sidebar />
        <!-- /Sidebar -->

        <div class="flex h-full w-full flex-col">
            <!-- Navbar -->
            <HeaderNavbar />
            <!-- /Navbar -->

            <!-- Main -->
            <div class="h-full overflow-hidden pl-10">
                <main id="dashboard-main" class="h-[calc(100vh-6rem)] overflow-auto px-4 py-10">
                    <!-- Put your content inside of the <main/> tag -->
                    <slot />
                </main>
            </div>
            <!-- /Main -->
        </div>
    </div>
</template>