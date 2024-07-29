<script setup>
import { ref, computed } from 'vue'
import ItemDialogBar from '../components/ItemDetail/ItemDialogBar.vue'
import CloseButton from '../components/ItemDetail/CloseButton.vue'
import ItemGallery from '../components/ItemDetail/ItemGallery.vue'
import ItemCarousel from 'src/components/ItemDetail/ItemCarousel.vue'

const props = defineProps({
  article: Object
})
const popup = defineModel()


</script>

<template>
  <q-dialog full-width v-model="popup" backdrop-filter="blur(4px) saturate(150%)">
    <q-card class="column q-pa-sm" style="height: 100vh; overflow: hidden; position: relative;">
      <CloseButton v-model="popup" class="col-auto q-pa-sm" />

      <ItemGallery class="gt-sm" :article  />
      <ItemCarousel class="lt-md" :article />


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

