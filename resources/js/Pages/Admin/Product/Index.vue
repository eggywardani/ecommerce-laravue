<script setup>
import Layout from "../Component/Layout.vue";
import ProductList from "./ProductList.vue";

defineProps({
    products: Array,
});
</script>

<template>
    <Layout>
        <ProductList :products="products"></ProductList>
    </Layout>
</template>
