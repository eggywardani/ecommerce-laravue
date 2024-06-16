<script setup>
import { Link } from "@inertiajs/vue3";
import Products from "./Component/Products.vue";
import Layout from "./Layout/Layout.vue";
defineProps({
    products: Array,
});
</script>
<template>
    <Layout>
        <!-- here section  -->
        <Hero></Hero>
        <!-- end -->
        <div class="bg-white">
            <div
                class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"
            >
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    List of products
                </h2>

                <!-- product list component -->
                <Products :products="products"></Products>
                <!-- end -->
                <div class="flex justify-center mt-5">
                    <Link
                        :href="route('products.index')"
                        type="button"
                        class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    >
                        View All Products
                    </Link>
                </div>
                <!-- -->
            </div>
        </div>
    </Layout>
</template>
