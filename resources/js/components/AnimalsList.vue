<script setup>
defineProps({
  animals: Array
})
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div v-for="animal in animals">
      <card-animal :animal="animal"/>
    </div>
  </div>
</template>

<style scoped>

</style>
