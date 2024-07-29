<script setup>
import CatalogButton from 'src/components/IndexPage/CatalogButton.vue';
import AdminButton from 'src/components/IndexPage/AdminButton.vue';
import PageHeader from 'src/components/IndexPage/PageHeader.vue';
import { useQuasar } from 'quasar'

const $q = useQuasar()
const mobile =   $q.platform.is.mobile

</script>

<template>
  <q-page>
    <div class="content-wrapper">
      <PageHeader :width="mobile? 200:350" />
      <div class="image-gallery">
        <q-img no-native-menu src="/images/img2.jpg" class="gallery-image" />
        <q-img no-native-menu src="/images/img3.jpg" class="gallery-image " />
        <q-img no-native-menu src="/images/img4.jpg" class="gallery-image " />
      </div>
      <div class=" flex column items-center">
        <CatalogButton class="custom-button" />
        <AdminButton class="custom-button" />
      </div>
    </div>
  </q-page>
</template>

<style scoped>
.content-wrapper {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: justify-evenly;
  align-items: center;
}

.site-title {
  font-family: 'Playfair Display', serif;
  font-size: 4rem;
  color: #101354;
  margin-bottom: 0.5rem;
}

.site-subtitle {
  font-family: 'Montserrat', sans-serif;
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 2rem;
}

.image-gallery {
  display: flex;
  justify-content: space-between;
  width: 80vw;
  margin-bottom: 2rem;
  background: rgba(252, 252, 252, 0.9);
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.gallery-image {
  width: 30%;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.description {
  font-family: 'Montserrat', sans-serif;
  font-size: 1rem;
  color: #444;
  line-height: 1.6;
  margin-bottom: 2rem;
}



.custom-button {
  font-family: 'Montserrat', sans-serif;
  padding: 0.5rem 1rem;
}
</style>