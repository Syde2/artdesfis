<script setup>
import { api } from 'src/boot/axios';
import IndexButton from 'src/components/IndexPage/IndexButton.vue';

const produits =   api.get('/produits')



</script>
<template>
  <q-page class="flex flex-center">
    <IndexButton />
  </q-page>
</template>

