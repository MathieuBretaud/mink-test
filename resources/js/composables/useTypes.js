import {ref} from "vue";

export function useTypes() {

    const types = ref([])
    const getTypes = async (animalId) => {
        try {
            const response = await axios.get(`/api/admin/types`);
            types.value = response.data.data
        } catch (err) {
            console.log(err);
        }
    }
    return {
        types,
        getTypes,
    }
}
