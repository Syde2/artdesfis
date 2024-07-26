<script setup>
const props = defineProps({
  id:String
})
const id = props.id.charAt(props.id.length-1)
</script>

<template>
  <q-btn :to="`/contact/${id}`"  class="action-button" unelevated  color="accent" label="Je veux cet article ! "  no-caps   >
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Me Contacter </q-tooltip>
  </q-btn>

</template>
