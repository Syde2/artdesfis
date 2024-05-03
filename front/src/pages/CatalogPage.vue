<script setup>
import { api } from 'src/boot/axios';
import CatalogGrid from 'src/components/CatalogPage/CatalogGrid.vue';
import BackButton from 'src/components/CatalogPage/BackButton.vue';
import SearchInput from 'src/components/CatalogPage/SearchInput.vue'
import { onBeforeMount, ref  } from 'vue';

const produits = ref([])
const searchFilter = ref()
onBeforeMount(()=>{
  fetchProduits()
}

 )

async function fetchProduits(){
  const res =  await api.get('/produits')
  produits.value = res.data['hydra:member']

}


function handleSearchFilter(){
  produits.value = produits.value.filter( produit=> produit.description.includes(searchFilter.value)  )
}


</script>
<template>
  <q-page class="">
    <q-toolbar>
      <BackButton />
      <h6 class="text-dark">Catalogue</h6>
      <q-space />
      <SearchInput v-model="searchFilter" @search="handleSearchFilter" @clear="fetchProduits"  />
    </q-toolbar>
    <q-separator inset  class="q-mb-md" />


    <CatalogGrid :produits />

  </q-page>
</template>


