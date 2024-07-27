<script setup>
const props = defineProps({
  id:String
})
const id = props.id.charAt(props.id.length-1)
</script>

<template>
  <q-btn :to="`/contact/${id}`"  size="lg" class="q-pa-md q-mb-md" unelevated  color="accent" label="Je veux cet article ! "  no-caps   style="border-radius: 10px;"  >
    <q-tooltip class="q-pa-md bg-grey-8" :delay="1000"> Vers Formulaire Contact </q-tooltip>
  </q-btn>

</template>
