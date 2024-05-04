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

    <q-card class="item-card ">
      <CloseButton v-model="popup" />
      <q-card-section  horizontal class="col-10 q-pa-md" @click="toggleZoom">
        <q-img :src="imageUrl" fit="scale-down" class="cursor-pointer	" />
        <q-img v-if="props.article.imageUrl2" :src="imageUrl2" fit="scale-down" class="cursor-pointer	"  />
        <q-img v-if="props.article.imageUrl3" :src="imageUrl3" fit="scale-down" class="cursor-pointer	" />
      </q-card-section>
      <q-card-section class=" full-width flex justify-between">
        <div> {{ props.article.description }} </div>
        <div> {{ props.article.prix }}€ </div>

      </q-card-section>
      <q-card-actions   class="col-2">
        <ItemDialogBar :id="props.article.id" />
      </q-card-actions>
    </q-card>
  </q-dialog>

  <q-dialog full-width full-height v-model= "zoomModel"   >
    <div @click="zoomModel = false">
      <q-img :src="zoomedImg" >
        <CloseButton v-model="zoomModel" />

        </q-img>
    </div>
  </q-dialog>

</template>

<style scoped>
.item-card {
  height: 80vh;
  max-width: 40vw;
}

.item-actions {
  position: absolute;
  bottom: 0%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.324);
}

.item-legend {
  color: white;
  font-weight: 600;
  text-align: center;
}
</style>
