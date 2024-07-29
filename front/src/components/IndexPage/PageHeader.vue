<script setup>
const props = defineProps({
    width:{
        type:Number,
        default:200
    }
})
</script>
<template>
<header class="bg-accent full-width flex flex-center " >
    <q-img src="/images/Logo1.webp"   height="auto"  :width="`${props.width}px `" />
</header>
</template>