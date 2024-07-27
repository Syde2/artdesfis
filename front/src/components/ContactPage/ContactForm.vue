<script setup>
import { useQuasar } from 'quasar'
import { ref, watch } from 'vue'

const props = defineProps({
    produit: Object
})

const $q = useQuasar()

const email = ref(null)
const departement = ref(null)
const article = ref('')
const reference = ref('')
const commentaire = ref('')
const accept = ref(false)

watch(() => props.produit, (newProduit) => {
    if (newProduit) {
        article.value = newProduit.nom
        reference.value = newProduit['@id']
    }
}, { immediate: true })

function onSubmit() {
    if (accept.value !== true) {
        $q.notify({
            color: 'red-5',
            textColor: 'white',
            icon: 'warning',
            message: 'Vous devez accepter d\'être recontacté'
        })
    }
    else {
        $q.notify({
            color: 'green-4',
            textColor: 'white',
            icon: 'cloud_done',
            message: 'Submitted'
        })
    }
}

function onReset() {
    email.value = null
    departement.value = null
    accept.value = false
    commentaire.value = false
}
</script>

<template>

        <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">

            <div v-if="article" class="row justify-around">
                <q-input class="col-8" filled type="text" v-model="article" label="Produit souhaité" readonly />
                <q-input class="col-3" filled type="text" v-model="reference" label="Reference" readonly />
            </div>

            <div class="row justify-around">
                <q-input class="col-8 " filled type="email" v-model="email" label="Adresse mail*"
                    hint="*Adresse à laquelle je peux être recontactée" lazy-rules
                    :rules="[val => val && val.length > 0 || 'Indiquez votre adresse mail']" />

                <q-input class="col-3 q-ml-sm" filled type="number" v-model="departement" label="Département"
                    lazy-rules :rules="[
                        val => val !== null && val !== '' || 'Votre Numero de Département',
                        val => val > 0 && val < 100 || '*Numero du département Francais sur 2 chiffres ou 99 pour l\'etranger'
                     ]" />

            </div>

                <q-input class="col-12 q-mx-md " v-model="commentaire" filled type="textarea" label="Commentaire" />

            <q-toggle v-model="accept"
                label=" J'accepte que les informations saisies dans ce formulaire soient utilisées pour permettre de me recontacter" />

            <div>
                <q-btn label="Envoyer" type="submit" color="accent" />
                <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
            </div>
        </q-form>
 

    


</template>
