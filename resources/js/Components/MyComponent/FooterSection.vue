<script setup>


</script>
<template>
    <footer>
        <!-- newsletter start here -->
        <div class=" py-16 bg-gray-900 px-6 font-[sans-serif] ">
            <div class="max-w-5xl mx-auto text-center text-white">
                <h2 class="text-4xl font-extrabold mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-base text-white">Stay updated with the latest news, trends, and special offers. Don't miss
                    out
                    on our exciting updates.</p>
                <div class="mt-10">
                    <input type="email" placeholder="Enter your email"
                        class="w-full sm:w-96 bg-gray-50 py-3.5 px-4 text-[#333] text-base focus:outline-none rounded" />
                    <button
                        class="max-sm:mt-8 sm:ml-4 custom-gradient text-white text-base font-semibold py-3.5 px-6 rounded hover:shadow-md hover:transition-transform transition-transform hover:scale-105 focus:outline-none">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
        <!-- newsletter end here -->




        <!-- footer start here -->
        <footer class="relative custom-gradient  px-4 pt-20">
            <div
                class="absolute -top-10 left-1/2 h-16 w-16 -translate-x-1/2 rounded-xl border-4 border-sky-500 bg-white p-2">
                <img class="h-full object-contain" src="../../../assets/images-1/images/favicon.ico" alt="" />
            </div>
            <nav aria-label="Footer Navigation"
                class="mx-auto mb-10 flex max-w-lg flex-col gap-10 text-center sm:flex-row sm:text-left">
                <a href="#" class="font-medium text-white">Demo</a>
                <a href="#" class="font-medium text-white">Support</a>
                <a href="#" class="font-medium text-white">Privacy Policy</a>
                <a href="#" class="font-medium text-white">Terms & Conditions</a>
            </nav>
            <p class="py-10 text-center text-gray-300">© 2022 Boleno | All Rights Reserved</p>
        </footer>
        <!-- footer start here -->

    </footer>
</template>

<style scoped>
.custom-gradient {
    background: linear-gradient(90deg, #4d99d6, #1d61ad);
}
</style>