import {ref} from "vue";

export function useBreeds() {

    const breeds = ref([])
    const getBreeds = async (animalId) => {
        try {
            const response = await axios.get(`/api/breeds`);
            breeds.value = response.data.data
        } catch (err) {
            console.log(err);
        }
    }
    return {
        breeds,
        getBreeds,
    }
}
