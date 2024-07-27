<script setup>
import { ref, onBeforeMount } from 'vue'
import { api } from 'src/boot/axios';
import { useRoute } from 'vue-router';
import ContactForm from 'src/components/ContactPage/ContactForm.vue';

const route = useRoute()
const id = route.params.id

const produit = ref({})

async function fetchProduit() {
  try {
    const res = await api.get('/produits/' + id);
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
  <q-page class="flex flex-center">
    <div v-if="produit">
      <h3> Je suis interessé par un Produit </h3>

      <ContactForm :produit />

    </div>
    <div v-else>Chargement en cours...</div>
  </q-page>
</template>