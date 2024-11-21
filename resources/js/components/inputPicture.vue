<script setup>
import {onMounted} from "vue";
import {usePictures} from "../composables/usePictures.js";

const props = defineProps(['animal'])
const {deletePicture, pictures, getPictures, storePictures} = usePictures();

async function deletedPicture(pictureId) {
  const response = await deletePicture(pictureId)
  if (response.status === 204) {
    pictures.value = pictures.value.filter(picture => picture.id !== pictureId);
  }
}

const filesPicture = async (e) => {
  const files = e.target.files;
  const formData = new FormData();

  for (let file of files) {
    formData.append('files[]', file)
  }

  const response = await storePictures(formData, props.animal)

  if (response.status === 200) {
    e.target.value = ''
    await getPictures(props.animal)
  }
}

onMounted(async () => {
  await getPictures(props.animal)
})

</script>

<template>
  <div class="flex flex-col justify-center gap-7">
    <div v-for="picture in pictures" :key="picture.id" class="mb-7">
      <div  class="relative">
        <img :src="'/storage/' + picture.filename" alt="" class="w-full block">
        <button class="btn btn-error absolute -bottom-10 left-0 w-full" @click.prevent="deletedPicture(picture.id)">Supprimer
        </button>
      </div>
    </div>
    <label for="file">Images</label>
    <input multiple @change="filesPicture" class="file-input file-input-bordered w-full max-w-xs" type="file"
           id="file" name="file">
  </div>

</template>

<style scoped>

</style>
