<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  article: Object
})

const slide = ref(1)
const imageUrl = computed(() => process.env.API + '/uploads/images/' + props.article.imageUrl)
const imageUrl2 = computed(() => props.article.imageUrl2 ? process.env.API + '/uploads/images/' + props.article.imageUrl2 : null)
const imageUrl3 = computed(() => props.article.imageUrl3 ? process.env.API + '/uploads/images/' + props.article.imageUrl3 : null)


</script>


<template>
  <q-card-section>
    <div class="q-pb-md full-width">
      <q-carousel
        animated
        v-model="slide"
        :arrows="imageUrl2 ? true:false"
        infinite
        :autoplay="imageUrl2 ? true:false"
        style="max-height: 33vh;"

      >
        <q-carousel-slide :name="1" :img-src= imageUrl />
        <q-carousel-slide :name="2" :img-src= imageUrl2 />
        <q-carousel-slide :name="3" :img-src= imageUrl3 />
      </q-carousel>
    </div>
  </q-card-section>
  </template>
  
