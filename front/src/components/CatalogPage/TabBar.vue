<script setup>
import {ref} from 'vue'

const categories = [{nom:'Tous les Articles', icone:'apps'},{nom:'Zero Dechet', icone:'recycling'}, {nom:'Enfant', icone : 'stroller'}, {nom:'Article Mode', icone :'checkroom'}]
const tab = ref(categories[0].nom)

function handleTabClick(value){
    console.log('TABCLICK', value)
}

</script>

<template>
     <q-tabs
        v-model="tab"
        indicator-color='accent'
        class="text-dark"
        stretch
        narrow-indicator
        @update:model-value="handleTabClick"
      >
      <div v-for="each in categories" >
        <q-tab class="gt-sm" :name="each.nom" :label="each.nom"  ></q-tab>
        <q-tab class="lt-md" :name="each.nom" :icon="each.icone"  >
            <q-tooltip class="q-pa-sm text-subtitle1">{{ each.nom }}</q-tooltip>
        </q-tab>

      </div>

      </q-tabs>
</template>