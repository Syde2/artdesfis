<script setup>
import { useRouter, useRoute } from 'vue-router'

const router= useRouter()

</script>

<template>
  <q-btn color="warning"  @click="router.go(-1)" round flat icon="arrow_back_ios" />
</template>
