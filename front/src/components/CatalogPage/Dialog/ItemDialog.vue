<script setup>
import ItemDialogBar from './ItemDialogBar.vue';

const props = defineProps({
  article:Object
})

const popup = defineModel()
const imageUrl = process.env.API + '/uploads/images/' + props.article.imageUrl
const imageUrl2 = process.env.API + '/uploads/images/' + props.article.imageUrl2
const imageUrl3 = process.env.API + '/uploads/images/' + props.article.imageUrl3


</script>

<template>

  <q-dialog full-width v-model="popup" backdrop-filter="blur(4px) saturate(150%)">
    <q-card class="item-card column">
      <q-card-section horizontal class="col-10" >
        <q-card-section>
          <img :src="imageUrl" width="100%" height="auto" />
        </q-card-section>
        <q-card-section v-if="imageUrl2" >
          <img  v-if="imageUrl2" :src="imageUrl2" width="100%" height="auto" />
        </q-card-section>
        <q-card-section v-if="imageUrl3">
          <img  v-if="imageUrl3" :src="imageUrl3" width="100%" height="auto" />
        </q-card-section>
      </q-card-section>

      <q-card-actions class="col-2">
        <ItemDialogBar :id="props.article.id" />
      </q-card-actions>
    </q-card>
  </q-dialog>

</template>

<style scoped>

.item-card{
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
