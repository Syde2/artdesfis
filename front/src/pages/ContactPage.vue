<script setup>
import {ref, onBeforeMount } from 'vue'
import { api } from 'src/boot/axios';
import { useRoute } from 'vue-router';

const route = useRoute()
const id = route.params.id

const produit = ref({})

async function fetchProduit() {
  try {
    const res = await api.get('/produits/'+id);
    produit.value = res.data;
  } catch (error) {
    console.error('Erreur lors du chargement du produit', error);
  }
}

onBeforeMount(() => {
  fetchProduit();
});



</script>

<template>
  <div v-if="produit">
    Je veux ce Produit : 
    <p>{{ produit.nom }}</p>
    <p>{{ produit.description }}</p>
    <!-- Ajoutez d'autres champs selon votre structure de données -->
  </div>
  <div v-else>Chargement en cours...</div>
</template>