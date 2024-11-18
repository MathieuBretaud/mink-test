<script setup>
import {onMounted} from "vue";
import {useAnimals} from "../composables/useAnimals.js";
import AnimalsList from "./AnimalsList.vue";

const {
  animals,
  getAnimals,
  toggleOrder,
  orderBy,
} = useAnimals();

onMounted(async () => {
  await getAnimals();
});
</script>

<template>
  <div class="my-5">
    <div class="hidden sm:block">
      <nav class="flex space-x-4" aria-label="Tabs">
        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'name'}"
            @click="toggleOrder('name')"
        >
          Trier par nom
        </a>

        <a
            class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer"
            :class="{'text-indigo-500': orderBy === 'price'}"
            @click="toggleOrder('price')"
        >
          Trier par prix
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
      </nav>
    </div>
  </div>

  <animals-list :animals="animals" />
</template>

<style scoped>

</style>
