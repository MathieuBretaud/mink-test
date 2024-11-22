<script setup>
defineProps(['animals'])
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div v-if="animals.data?.length > 0" v-for="animal in animals?.data">
      <card-animal  :animal="animal"/>
    </div>
      <div v-else>Pas d'animaux trouvés</div>
  </div>
</template>

<style scoped>

</style>
