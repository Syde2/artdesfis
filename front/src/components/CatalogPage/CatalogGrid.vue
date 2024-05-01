<script setup>
import {onBeforeMount, ref } from 'vue'
import {unsplash} from 'src/boot/unsplash.js'
import CatalogItem from 'src/components/CatalogPage/CatalogItem.vue'

const number = 40
const photos = ref()

onBeforeMount( async ()=>{
  await unsplash.photos.getRandom(
    {  count: number}
  ).then( result =>{
    photos.value = result.response
  })
})


</script>
<template>

  <main class="grid">
    <div class="item"  v-for="each in photos" :key="each.id" >
      <CatalogItem :article="each" />
      <!-- <img :src="each.urls.thumb"  width="100%" height="auto"/> -->
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
  background-color: oklch(28% 0.02 270);
  border-radius: 4px;
  color: aliceblue;
  cursor: pointer;
}
</style>
