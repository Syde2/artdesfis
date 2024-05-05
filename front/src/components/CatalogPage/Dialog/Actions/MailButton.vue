<script setup>
const props = defineProps({
  id:Number
})
</script>

<template>
  <q-btn :to="`/contact/${props.id}`"  class="action-button" unelevated  color="accent" icon="alternate_email">
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Me Contacter </q-tooltip>
  </q-btn>

</template>
