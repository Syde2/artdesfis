<script setup>
import { useRouter, useRoute } from 'vue-router'

const router= useRouter()

</script>

<template>
  <q-btn  class="gt-sm" color="primary"  @click="router.go(-1)" round flat icon="arrow_back_ios" />
</template>
