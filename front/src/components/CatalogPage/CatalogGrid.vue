<script setup>
import {onBeforeMount, ref } from 'vue'
import {unsplash} from 'src/boot/unsplash.js'
import CatalogItem from 'src/components/CatalogPage/CatalogItem.vue'

const props = defineProps({
  produits : Array
})


</script>
<template>

  <main class="grid q-pa-md">
    <div class="item"  v-for="each in produits" :key="each.id" >
      <CatalogItem :article="each" />
    </div>


  </main>


</template>


<style scoped="scss">
.grid {
  --min-column-width: min(200px, 100%);
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(var(--min-column-width), 1fr));
  gap: 16px;
}

.item {
  place-content: center;
  font-size: 2rem;
  font-weight: 600;
  border-radius: 4px;
  color: aliceblue;
  cursor: pointer;
}


</style>
