<script setup>
import {ref} from 'vue'

const search = defineModel()
const emits = defineEmits(['search', 'clear'])

const toggleSearch =ref(false)

function handleClick(){
  console.log("CLICK")
  toggleSearch.value = true
}
function handleClear(){
  toggleSearch.value = false
  const emits = defineEmits(['search', 'clear'])

}

</script>

<template>
  <div class="row no-wrap">
    <q-form  @submit="emits('search')">
    <q-input  clearable @clear="emits('clear')" dense outlined rounded v-model="search" placeholder="Rechercher" class="bg-white gt-sm">
      <template v-slot:append>
          <q-icon v-show="!search"  name="search" color="primary" />
        </template>
    </q-input>
  </q-form>
  <q-toolbar class=" lt-sm row">
    <q-icon v-show="!toggleSearch" size="sm" color="grey" name="search" class="cursor-pointer" @click="handleClick"  />
    <q-input class="col-8" v-show="toggleSearch" clearable @clear=handleClear() dense outlined rounded v-model="search" placeholder="Rechercher" >
    </q-input>

  </q-toolbar>  

</div>

</template>
