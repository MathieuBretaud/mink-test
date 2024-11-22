<script setup>
import {onMounted, ref, watch} from "vue";
import {useAnimals} from "../composables/useAnimals.js";
import AnimalsList from "./AnimalsList.vue";
import {TailwindPagination} from "laravel-vue-pagination";
import AnimalFilter from "./AnimalFilter.vue";


const typeSelected = ref('')
const breedSelected = ref('')

const {
  animals,
  getAnimals,
  toggleOrder,
  orderBy,
  filterByType,
  filterByBreed
} = useAnimals();

onMounted(async () => {
  await getAnimals();
});

watch([typeSelected, breedSelected], async () => {
  filterByType.value = typeSelected.value
  filterByBreed.value = breedSelected.value
  await getAnimals();
})
</script>

<template>
  <animal-filter
      :orderBy="orderBy"
      v-model:typeSelected="typeSelected"
      v-model:breedSelected="breedSelected"
      @toggle-order="toggleOrder"
  />
  <animals-list :animals="animals"/>
  <div class="text-center mt-4">
    <TailwindPagination
        :data="animals"
        @pagination-change-page="getAnimals"
    />
  </div>
</template>

<style scoped>

</style>
