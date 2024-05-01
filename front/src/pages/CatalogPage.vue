<script setup>
import { api } from 'src/boot/axios';
import CatalogGrid from 'src/components/CatalogPage/CatalogGrid.vue';
import BackButton from 'src/components/CatalogPage/BackButton.vue';

const produits =   api.get('/produits')



</script>
<template>
  <q-page class="q-pa-md">
    <BackButton />
    <h2>Catalogue</h2>
    <CatalogGrid />

  </q-page>
</template>


