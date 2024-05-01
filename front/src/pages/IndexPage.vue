<script setup>
import { api } from 'src/boot/axios';
import IndexHeroTitle from 'src/components/IndexPage/IndexHeroTitle.vue'

const produits =   api.get('/produits')



</script>
<template>
  <q-page class="flex flex-center">
    <IndexHeroTitle />
  </q-page>
</template>

