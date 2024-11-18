import './bootstrap';
import {createApp} from "vue";
import AnimalsList from "./components/AnimalsList.vue";
import CardAnimal from "./components/CardAnimal.vue";
import AnimalIndex from "./components/AnimalIndex.vue";

const app = createApp({});

app.component('AnimalsList', AnimalsList);
app.component('AnimalIndex', AnimalIndex);
app.component('CardAnimal', CardAnimal);

app.mount('#app');
