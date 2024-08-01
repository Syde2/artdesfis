<script setup>
import { ref } from 'vue'

const search = defineModel()
const emits = defineEmits(['search', 'clear'])

const toggleSearch = ref(false)

function handleClick() {
  console.log("CLICK")
  toggleSearch.value = true
}
function handleClear() {
  toggleSearch.value = false
  const emits = defineEmits(['search', 'clear'])

}

</script>

<template>
  <q-toolbar class="flex row relative">
    <q-input class=" col-10  bg-white " v-show="toggleSearch" clearable @clear=handleClear() dense outlined rounded
        v-model="search" placeholder="Rechercher" style="height: 30px;" >
      </q-input>
      <q-icon size="sm" color="accent" name="search" class="cursor-pointer col-1  "
        @click="handleClick">
        <q-tooltip class="q-pa-sm text-caption " :delay="500">Rechercher</q-tooltip>
      </q-icon>



  </q-toolbar>


</template>
