<script setup>
const props = defineProps({
  id:String
})
</script>

<template>
  <q-btn :to="`/contact/${props.id}`" flat color="primary" icon="alternate_email">
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Me Contacter </q-tooltip>
  </q-btn>

</template>
