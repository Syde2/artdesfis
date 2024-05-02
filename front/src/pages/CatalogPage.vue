<script setup>
import { api } from 'src/boot/axios';
import CatalogGrid from 'src/components/CatalogPage/CatalogGrid.vue';
import BackButton from 'src/components/CatalogPage/BackButton.vue';
import { onBeforeMount, ref  } from 'vue';

const produits = ref()

onBeforeMount(async()=>{
  const res =  await api.get('/produits')
  produits.value = res.data['hydra:member']
} )



</script>
<template>
  <q-page class="q-pa-md">
    <q-header class="flex">
      <BackButton />
        <h2>Catalogue</h2>
    </q-header>

    <CatalogGrid :produits />

  </q-page>
</template>


