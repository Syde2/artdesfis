<script setup>
import { ref } from 'vue'

const search = defineModel()
const emits = defineEmits(['search', 'clear', 'searchBarActive', 'searchBarInactive'])

const toggleSearch = ref(false)

function handleSearchClick() {
  emits('searchBarActive')
  toggleSearch.value = true
}

function handleCancelClick() {
  emits('searchBarInactive')
  toggleSearch.value = false
}

function handleClear() {ar
  toggleSearch.value = false
}

</script>

<template>
  <q-toolbar>
    <q-input class=" col-10  bg-white " v-show="toggleSearch" clearable @clear=handleClear()  filled rounded
        v-model="search" placeholder="Rechercher"  >
      </q-input>
      <q-icon v-show="!toggleSearch" size="sm" color="accent" name="search" class="cursor-pointer col-1" @click="handleSearchClick">
        <q-tooltip class="q-pa-sm text-caption " :delay="500">Rechercher</q-tooltip>
      </q-icon>
      <q-icon v-show="toggleSearch" size="sm" color="accent" name="cancel" class="cursor-pointer col-1" @click="handleCancelClick">
        <q-tooltip class="q-pa-sm text-caption " :delay="500">Fermer</q-tooltip>
      </q-icon> 
  </q-toolbar>
</template>
