<script setup>
defineProps({
  animals: Array
})
</script>

<template>
  <!--  <a-->
  <!--      class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"-->
  <!--      :class="{'text-indigo-500': orderBy === 'name'}"-->
  <!--      @click="toggleOrder('name')"-->
  <!--  >-->
  <!--    Trier par nom-->
  <!--  </a>-->
  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
      <tr>
        <th></th>
        <th>Nom</th>
        <th>Age</th>
        <th>Type</th>
        <th>Race</th>
        <th>Prix TTC €</th>
      </tr>
      </thead>
      <tbody>
      <!-- row 1 -->
      <tr v-for="animal in animals" :key="animal.id">
        <th></th>
        <td>{{ animal.name }}</td>
        <td>{{ animal.age }}</td>
        <td>{{ animal.type.name }}</td>
        <td>{{ animal.breed.name }}</td>
        <td>{{ animal.price }} €</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>
