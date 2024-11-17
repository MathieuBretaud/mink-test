import './bootstrap';
import {createApp} from "vue";
import AnimalsList from "./components/AnimalsList.vue";
import CardAnimal from "./components/CardAnimal.vue";

const app = createApp({});

app.component('AnimalsList', AnimalsList);
app.component('CardAnimal', CardAnimal);

app.mount('#app');
