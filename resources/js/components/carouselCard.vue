<script setup>
import {computed} from 'vue';

const props = defineProps({
  pictures: {
    type: Object,
  },
  animal: {
    type: Object
  }
});

const hasPictures = computed(() => props.pictures && props.pictures.length > 0);
</script>

<template>
  <div v-if="hasPictures" class="carousel-container">
    <div class="carousel w-full">
      <div v-for="(picture, index) in pictures" :key="picture.id" :id="`item-${animal.id}-${index + 1}`"
           class="carousel-item w-full">
        <img v-if="pictures" :src="picture.thumbnail" :alt="`Image ${index + 1}`" class="w-full h-64 object-cover"/>
      </div>
    </div>
    <div v-if="pictures.length > 1" class="flex w-full justify-center gap-2 py-2">
      <a v-for="index in pictures.length" :key="`nav-${animal.id}-${index}`"
         :href="`#item-${animal.id}-${index}`" class="btn btn-xs">
        {{ index }}
      </a>
    </div>
  </div>
  <div v-else class="text-center">
    <img src="/empty.jpg" alt="empty-picture" class="w-full h-64 object-cover"/>
  </div>
</template>

<style scoped>

</style>
