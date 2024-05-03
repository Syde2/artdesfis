<script setup>
import {ref} from 'vue'

const search = defineModel()
const emits = defineEmits(['search', 'clear'])


</script>

<template>

  <div class="row no-wrap">
    <q-form  @submit="emits('search')">
    <q-input clearable @clear="emits('clear')" dense outlined rounded v-model="search" placeholder="Rechercher" class="bg-white ">
      <template v-slot:append>
          <q-icon v-show="!search"  name="search" color="primary" />
        </template>
    </q-input>
  </q-form>
  </div>

</template>
