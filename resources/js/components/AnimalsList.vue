<script setup>
import { onMounted, ref } from "vue";

const animals = ref([])

onMounted( async () => {
  try {
  await axios.get('/sanctum/csrf-cookie');
  let response = await axios.get('/api/animals');

  if (response.status === 200) {
    animals.value = response.data.data
  }
  console.log(animals.value)
  } catch (error) {
    console.error('Erreur lors de la récupération des animaux:', error);
  }
})
</script>

<template>
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
        <th>Statut</th>
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
        <td>{{ animal.status }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>
