<script setup>
import {onMounted, ref, watch} from "vue";
import {useAnimals} from "../composables/useAnimals.js";
import AnimalsList from "./AnimalsList.vue";
import {useTypes} from "../composables/useTypes.js";
import {useBreeds} from "../composables/useBreeds.js";


const {types, getTypes} = useTypes()

const {breeds, getBreeds} = useBreeds()

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
  await getTypes()
  await getBreeds()
});

watch([typeSelected, breedSelected], async () => {
  filterByType.value = typeSelected.value
  filterByBreed.value = breedSelected.value
  await getAnimals();
})

</script>

<template>
  <div class="my-5">
    <div class="sm:block">
      <nav class="flex flex-col md:flex-row space-x-4" aria-label="Tabs">
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'name'}"
            @click="toggleOrder('name')"
        >
          Trier par nom
        </a>

        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'age'}"
            @click="toggleOrder('age')"
        >
          Trier par âge
        </a>
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'type'}"
            @click="toggleOrder('type')"
        >
          Trier par type
        </a>
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'breed'}"
            @click="toggleOrder('breed')"
        >
          Trier par race
        </a>

        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'price'}"
            @click="toggleOrder('price')"
        >
          Trier par prix
        </a>
        <div class="flex flex-col md:flex-row gap-4">

        <select v-model="typeSelected" class="select select-bordered w-48 max-w-xs">
          <option value="" selected>Choisir un type</option>
          <template v-for="type in types">
            <option :value="type.id">{{ type.name }}</option>
          </template>
        </select>
        <select v-model="breedSelected" class="select select-bordered w-48 max-w-xs">
          <option value="" selected>Choisir une race</option>
          <template v-for="breed in breeds">
            <option :value="breed.id">{{ breed.name }}</option>
          </template>
        </select>
        </div>
      </nav>
    </div>
  </div>

  <animals-list :animals="animals"/>
</template>

<style scoped>

</style>
