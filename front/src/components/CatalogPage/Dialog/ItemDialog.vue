<script setup>
import {ref, watch} from 'vue'
import ItemDialogBar from './ItemDialogBar.vue';
import CloseButton from './CloseButton.vue'

const props = defineProps({
  article: Object
})
const popup = defineModel()
const zoomedImg = ref()
const zoomModel = ref(false)
const imageUrl = process.env.API + '/uploads/images/' + props.article.imageUrl
const imageUrl2 = process.env.API + '/uploads/images/' + props.article.imageUrl2
const imageUrl3 = process.env.API + '/uploads/images/' + props.article.imageUrl3

function toggleZoom(e) {
  zoomedImg.value = e.target.src
  zoomModel.value = true
}
</script>

<template>
  <q-dialog full-width v-model="popup" backdrop-filter="blur(4px) saturate(150%)">
    <q-card class="column" style="height: 100%; overflow: hidden; position: relative;">
       <CloseButton v-model="popup"  class="col-1"/>
      <q-card-section class="col-7 wrapper " @click="toggleZoom">
        <div class="image-grid">
          <q-img :src="imageUrl"  fit="scale-down" class="grid-item" />
          <q-img v-if="props.article.imageUrl2" fit="scale-down" :src="imageUrl2"  class="grid-item"  />
          <q-img v-if="props.article.imageUrl3" fit="scale-down" :src="imageUrl3"  class="grid-item" />
        </div>
      </q-card-section>
      <q-card-section class=" col-2  flex  items-center justify-between">
        <div>
          <p class="text-body1"> {{ props.article.nom }} </p>
          <p class="text-body2"> {{ props.article.description }} </p>
        </div>
        <div>
          <p class="text-h5 "> {{ props.article.prix /100 }}€ </p>
        </div>


      </q-card-section>
      <q-card-actions   class="col-2 ">
        <ItemDialogBar :id="props.article.id" />
      </q-card-actions>
    </q-card>
  </q-dialog>

  <q-dialog full-width full-height v-model= "zoomModel"   >
    <div @click="zoomModel = false">
      <q-img :src="zoomedImg"  >
        <CloseButton v-model="zoomModel" />
        </q-img>
    </div>
  </q-dialog>

</template>

<style scoped>
.wrapper{
background-color: red;
padding: 3rem;

}
.image-grid {
  display: grid;
  justify-content: stretch;
  gap: 16px;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: masonry;

}

.grid-item {
  cursor: pointer;
  align-self: start;
}


</style>
