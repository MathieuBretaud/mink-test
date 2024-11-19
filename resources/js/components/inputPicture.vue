<script setup>
import {onMounted, ref} from "vue";
import {usePictures} from "../composables/usePictures.js";

const props = defineProps(['animalId', 'animal'])
const {deletePicture, pictures, getPictures} = usePictures();
const previewFiles = (e) => {
  console.log(e.target.files)
}

onMounted(async () => {
  await getPictures(props.animal)
  console.log(pictures.value)
})

</script>

<template>
  <div class="flex flex-col justify-center">
    <div v-for="picture in pictures">
      <img :src="'/storage/' + picture.filename" alt="" class="w-full block">
      <button class="btn btn-error" @click.prevent="deletePicture(picture.id)">Delete</button>
    </div>
    <label for="pictures">Images</label>
    <input @change="previewFiles" multiple class="file-input file-input-bordered w-full max-w-xs" type="file"
           id="pictures" name="pictures">
  </div>

</template>

<style scoped>

</style>
