<script setup>
import MailButton from 'src/components/CatalogPage/Dialog/Actions/MailButton.vue'
import ShareButton from 'src/components/CatalogPage/Dialog/Actions/ShareButton.vue'
import LikeButton from 'src/components/CatalogPage/Dialog/Actions/LikeButton.vue'
import FaveButton from 'src/components/CatalogPage/Dialog/Actions/FaveButton.vue';

const props = defineProps({
  id:Number
})

</script>

<template>
  <div class="fit  flex  flex-center q-gutter-x-sm">
    <MailButton :id="props.id" />
    <ShareButton />
    <LikeButton />
    <FaveButton />
  </div>
</template>
