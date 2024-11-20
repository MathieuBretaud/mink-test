import {ref} from "vue";

export function usePictures() {

    const pictures = ref([])
    const getPictures = async (animalId) => {
        try {
            const response = await axios.get(`/api/admin/pictures/animal/${animalId}`);
            pictures.value = response.data
        } catch (err) {
            console.log(err);
        }
    }

    const storePictures = async (picturesData, animalId) => {
        try {
            const response = await axios.post(`/api/admin/pictures/animal/${animalId}`, picturesData, {
                headers: {"Content-Type": "multipart/form-data"},
            });
            console.log(response)
            console.log(picturesData)
            return response
        } catch (err) {
            console.log(err);
        }
    }

    const deletePicture = async (pictureId) => {
        try {
            return await axios.delete(`/api/admin/picture/${pictureId}`);
        } catch (err) {
            console.log(err);
        }
    }


    return {
        pictures,
        getPictures,
        deletePicture,
        storePictures
    }

}
