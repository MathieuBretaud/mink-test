<script setup>
import {onMounted} from "vue";
import {useTypes} from "../composables/useTypes.js";
import {useBreeds} from "../composables/useBreeds.js";


const {types, getTypes} = useTypes()
const {breeds, getBreeds} = useBreeds()

const typeSelected = defineModel('typeSelected')
const breedSelected = defineModel('breedSelected')

defineProps(['orderBy'])

const emit = defineEmits(['toggle-order'])

const emitToggleOrder = (criteria) => {
  emit('toggle-order', criteria);
};

onMounted(async () => {
  await getTypes()
  await getBreeds()
});

</script>

<template>
  <div class="my-5">
    <div class="sm:block">
      <nav class="flex flex-col md:flex-row space-x-4" aria-label="Tabs">
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'name'}"
            @click="emitToggleOrder('name')"
        >
          Trier par nom
        </a>

        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'age'}"
            @click="emitToggleOrder('age')"
        >
          Trier par âge
        </a>
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'type'}"
            @click="emitToggleOrder('type')"
        >
          Trier par type
        </a>
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'breed'}"
            @click="emitToggleOrder('breed')"
        >
          Trier par race
        </a>

        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'price'}"
            @click="emitToggleOrder('price')"
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

</template>

<style scoped>

</style>
