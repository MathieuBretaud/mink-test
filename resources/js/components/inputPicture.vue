<script setup>
import {onMounted, watch} from "vue";
import {usePictures} from "../composables/usePictures.js";

const props = defineProps(['animal'])
const {deletePicture, pictures, getPictures, storePictures} = usePictures();

async function deleted(pictureId) {
  const response = await deletePicture(pictureId)
  console.log(response)
  if (response.status === 204) {
    pictures.value = pictures.value.filter(picture => picture.id !== pictureId);
    // await getPictures(props.animal)
  }
}

const previewFiles = async (e) => {
  console.log(e.target.files)
  const files = e.target.files;
  const picturesValue = new FormData();
  picturesValue.append("file", files[0]);

  const response = await storePictures(picturesValue, props.animal)

  if (response.status === 200) {
    e.target.value = ''
    console.log(response.data)
    // pictures.value.push()
    await getPictures(props.animal)
  }
}

onMounted(async () => {
  await getPictures(props.animal)
})

</script>

<template>
  <div class="flex flex-col justify-center">
    <div v-for="picture in pictures">
      <img :src="'/storage/' + picture.filename" alt="" class="w-full block">
      <button class="btn btn-error" @click.prevent="deleted(picture.id)">Delete</button>
    </div>
    <label for="file">Images</label>
    <input @change="previewFiles" class="file-input file-input-bordered w-full max-w-xs" type="file"
           id="file" name="file">
  </div>

</template>

<style scoped>

</style>
