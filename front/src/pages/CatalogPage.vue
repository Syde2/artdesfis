<script setup>
import { api } from 'src/boot/axios';

const produits =   api.get('/produits')



</script>
<template>
  <q-page class="flex flex-center">
    CATALOG
  </q-page>
</template>

