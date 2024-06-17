<script setup>
import HeaderSection from '@/Components/MyComponent/HeaderSection.vue';
import FooterSection from '@/Components/MyComponent/FooterSection.vue';

</script>
<template>
    <div>
        <header>
            <HeaderSection />
        </header>

        <main>
            <slot />
        </main>

        <footer class="mt-6">
            <FooterSection />
        </footer>
    </div>
</template>