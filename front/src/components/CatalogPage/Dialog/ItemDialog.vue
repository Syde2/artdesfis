<template>
  <q-dialog full-width v-model="popup" backdrop-filter="blur(4px) saturate(150%)">
    <q-card class="column" style="height: 100vh; overflow: hidden; position: relative;">
      <CloseButton v-model="popup" class="col-auto q-pa-sm" />
      <q-card-section class="col-grow q-pa-md" @click="toggleZoom">
        <div :class="['image-grid', `grid-${imageCount}`]">
          <q-img :src="imageUrl" fit="cover" class="grid-item" />
          <q-img v-if="props.article.imageUrl2" :src="imageUrl2" fit="contain" class="grid-item" />
          <q-img v-if="props.article.imageUrl3" :src="imageUrl3" fit="contain" class="grid-item" />
        </div>
      </q-card-section>
      <q-card-section class="col-auto q-pa-md">
        <div class="row justify-between items-center">
          <div class="col-grow">
            <p class="text-h6 q-mb-xs">{{ props.article.nom }}</p>
            <p class="text-body2">{{ props.article.description }}</p>
            <q-chip clickable outline :color=props.article.categorie.couleur  :label= props.article.categorie.nom  />

          </div>
          <div class="col-auto">
            <p class="text-h5">{{ props.article.prix / 100 }}€</p>
          </div>
        </div>
      </q-card-section>
      <q-card-actions class="col-auto q-pa-md">
        <ItemDialogBar :id="props.article.id" />
      </q-card-actions>
    </q-card>
  </q-dialog>

  <q-dialog full-width full-height v-model="zoomModel">
    <div @click="zoomModel = false">
      <q-img :src="zoomedImg">
        <CloseButton v-model="zoomModel" />
      </q-img>
    </div>
  </q-dialog>
</template>

<script setup>
import { ref, computed } from 'vue'
import ItemDialogBar from './ItemDialogBar.vue';
import CloseButton from './CloseButton.vue'

const props = defineProps({
  article: Object
})
const popup = defineModel()
const zoomedImg = ref()
const zoomModel = ref(false)
const imageUrl = computed(() => process.env.API + '/uploads/images/' + props.article.imageUrl)
const imageUrl2 = computed(() => props.article.imageUrl2 ? process.env.API + '/uploads/images/' + props.article.imageUrl2 : null)
const imageUrl3 = computed(() => props.article.imageUrl3 ? process.env.API + '/uploads/images/' + props.article.imageUrl3 : null)

const imageCount = computed(() => {
  return [imageUrl.value, imageUrl2.value, imageUrl3.value].filter(Boolean).length
})

function toggleZoom(e) {
  if (e.target.tagName === 'IMG') {
    zoomedImg.value = e.target.src
    zoomModel.value = true
  }
}
</script>

<style scoped>
.image-grid {
  display: grid;
  gap: 1rem;
  height: 100%;
}

.grid-1 {
  grid-template-columns: 1fr;
}

.grid-2 {
  grid-template-columns: 1fr 1fr;
}

.grid-3 {
  grid-template-columns: repeat(3, 1fr);
}

.grid-item {
  cursor: pointer;
  height: 100%;
  object-fit: contain;
}
</style>