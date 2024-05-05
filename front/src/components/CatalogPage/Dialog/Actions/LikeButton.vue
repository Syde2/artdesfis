<script setup>
import { ref } from 'vue'

const isLiked = ref(false)

function handleLiked(){
  isLiked.value = !isLiked.value
}


</script>

<template>

  <q-btn @click="handleLiked"  :color="isLiked ? 'positive' : 'primary'" icon="thumb_up" class="action-button" unelevated  >
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Liker </q-tooltip>
  </q-btn>
</template>
