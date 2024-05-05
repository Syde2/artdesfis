<script setup>
import { ref } from 'vue'
const isFav = ref(false)

function handleFav(){
  isFav.value = !isFav.value
}

</script>

<template>
  <q-btn @click="handleFav"    :color="isFav ?  'positive' : 'primary'" icon="bookmark"  class="action-button" unelevated  >
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Ajouter aux favoris </q-tooltip>
  </q-btn>
</template>
