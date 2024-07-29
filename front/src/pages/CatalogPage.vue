<script setup>
import { api } from 'src/boot/axios';
import CatalogGrid from 'src/components/CatalogPage/CatalogGrid.vue';
import SearchInput from 'src/components/CatalogPage/SearchInput.vue';
import TabBar from 'src/components/CatalogPage/TabBar.vue';
import { onBeforeMount, ref, watch } from 'vue';
import { debounce } from 'quasar';
import PageHeader from 'src/components/IndexPage/PageHeader.vue';

const produits = ref([]);
const searchFilter = ref('');
const loading = ref(false);

onBeforeMount(() => {
  fetchProduits();
});

async function fetchProduits() {
  loading.value = true;
  searchFilter.value = ''; // Réinitialise le filtre de recherche
  try {
    const res = await api.get('/produits');
    produits.value = res.data['hydra:member'];
  } catch (error) {
    console.error('Erreur lors du chargement des produits:', error);
  } finally {
    loading.value = false;
  }
}

async function asyncSearch() {
  if (searchFilter.value === '') {
    return fetchProduits();
  }
  loading.value = true;
  const searchTerm = encodeURIComponent(searchFilter.value);
  const searchUrl = `produits?custom_search=${searchTerm}`;
  try {
    const res = await api.get(searchUrl);
    produits.value = res.data['hydra:member'];
  } catch (error) {
    console.error('Erreur lors de la recherche:', error);
  } finally {
    loading.value = false;
  }
}

async function handleTabChange(filter) {
  if (filter.startsWith('Tous')) {
    return fetchProduits();
  }
  loading.value = true;
  const filteredUrl = `produits?categorie.nom=${filter}`;
  try {
    const res = await api.get(filteredUrl);
    produits.value = res.data['hydra:member'];
  } catch (error) {
    console.error('Erreur lors de la recherche:', error);
  } finally {
    loading.value = false;
  }
}


const debouncedSearch = debounce(asyncSearch, 300);

watch(searchFilter, (newValue) => {
  if (newValue === '') {
    fetchProduits();
  }
});
</script>

<template>
  <q-page>
    <PageHeader width="150" />
    <q-toolbar class=" q-mt-md row justify-center">

      <TabBar @tabChange="handleTabChange" />
      <!-- <SearchInput
        v-model="searchFilter" 
        @update:model-value="debouncedSearch" 
        @clear="fetchProduits" 
        
      /> -->

    </q-toolbar>

    
    <q-separator inset class="q-mb-md" />

    <q-inner-loading :showing="loading">
      <q-spinner-infinity size="50px" color="primary" />
    </q-inner-loading>

    <CatalogGrid :produits="produits" />
  </q-page>
</template>