<script setup>
import ContactButton  from 'src/components/CatalogPage/Dialog/Actions/ContactButton.vue'

const props = defineProps({
  id:Number
})

</script>

<template>
  <div class="bg-accent q-pa-md  flex justify-center fit shadow-8" style="border-radius: 10px;">
    <ContactButton :id="props.id" />

  </div>
</template> 
