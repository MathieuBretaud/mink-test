<script setup>
import CarouselCard from "./carouselCard.vue";

defineProps({
  animal: Object
})
</script>

<template>
  <div class="card bg-base-100 w-96 h-[500px] shadow-xl">
      <carousel-card :pictures="animal.pictures" :animal="animal" />
    <div class="card-body">
      <h2 class="card-title">
        {{ animal.name }}
        <div class="badge badge-primary">{{animal.age}} ans</div>
      </h2>
      <p>{{ animal.description }}</p>
      <div class="card-actions justify-end">
        <div class="badge badge-outline">{{animal.type.name}}</div>
        <div class="badge badge-outline">{{animal.breed.name}}</div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
