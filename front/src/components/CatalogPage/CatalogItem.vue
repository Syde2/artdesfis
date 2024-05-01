<script setup>
import { ref } from 'vue'
import MailButton from './MailButton.vue';
import ShareButton from './ShareButton.vue';
import LikeButton from './LikeButton.vue'
import FaveButton from './FaveButton.vue';

const props = defineProps({
  article: Object
})

const popup = ref(false)
const isFav = ref(false)

function handleClick() {
  console.log('Handle click')
  popup.value = true
}

function handleFav(){
  isFav.value = !isFav.value
}


</script>

<template>

  <div @click=handleClick>
    <img :src="article.urls.thumb" width="100%" height="auto" />
  </div>

  <q-dialog v-model="popup"  backdrop-filter="blur(4px) saturate(150%)"  >
    <q-card  style="width: 450px">
      <q-img :src="props.article.urls.regular" fit="contain"  />
      <div class="item-actions">
        <div class="item-legend "> {{props.article.alt_description }} </div>
        <div class="full-width flex justify-around">
          <MailButton :id="props.article.id" />
          <ShareButton />
          <LikeButton />
          <FaveButton />

        </div>
      </div>
  </q-card>
  </q-dialog>

</template>

<style scoped>

.item-actions{
  position: absolute;
  bottom: 0%;
  width:  100%;
  background-color: rgba(0, 0, 0, 0.324);
}

.item-legend{
  color: white;
  font-weight: 600;
  text-align: center;
}
</style>
