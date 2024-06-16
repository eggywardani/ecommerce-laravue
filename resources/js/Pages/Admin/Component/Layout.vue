<script setup>
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";
import Navbar from "../Component/Navbar.vue";
import Sidebar from "../Component/Sidebar.vue";
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        <Navbar />
        <!-- Sidebar -->
        <Sidebar />
        <main class="p-4 md:ml-64 h-auto pt-20">
            <slot />
        </main>
    </div>
</template>
