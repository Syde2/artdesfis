<script setup>
import { ref, computed } from 'vue'
import ItemDialogBar from '../components/ItemDetail/ItemDialogBar.vue'
import CloseButton from '../components/ItemDetail/CloseButton.vue'
import ItemGallery from '../components/ItemDetail/ItemGallery.vue.vue'

const props = defineProps({
  article: Object
})
const popup = defineModel()

// const imageUrl = computed(() => process.env.API + '/uploads/images/' + props.article.imageUrl)
// const imageUrl2 = computed(() => props.article.imageUrl2 ? process.env.API + '/uploads/images/' + props.article.imageUrl2 : null)
// const imageUrl3 = computed(() => props.article.imageUrl3 ? process.env.API + '/uploads/images/' + props.article.imageUrl3 : null)

// const imageCount = computed(() => {
//   return [imageUrl.value, imageUrl2.value, imageUrl3.value].filter(Boolean).length
// })


</script>

<template>
  <q-dialog full-width v-model="popup" backdrop-filter="blur(4px) saturate(150%)">
    <q-card class="column q-pa-sm" style="height: 100vh; overflow: hidden; position: relative;">
      <CloseButton v-model="popup" class="col-auto q-pa-sm" />
      <ItemGallery  :article />
      <q-card-section horizontal class="col-auto q-pa-md flex justify-between ">
        
        <div class="row justify-around  items-center">     
          <div class="col-grow">
            <p class="text-h6 q-mb-xs">  
              {{ props.article.nom }}</p>
            <p class="text-body2">{{ props.article.description }}</p>
          </div>
        </div>
        <div>
          <q-chip  size="xl" icon-right="euro" outline color="accent"   :label= ' props.article.prix / 100'   />
        </div>
      </q-card-section>

      <q-card-actions class="col-auto q-pa-md">
        <ItemDialogBar :id="props.article['@id']" />
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

