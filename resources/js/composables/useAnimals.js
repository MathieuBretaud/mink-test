import {ref} from "vue";

export function useAnimals () {
    const animals = ref([]);
    const orderBy = ref(null);
    const direction = ref('desc');
    const filterByType = ref(null)
    const filterByBreed = ref(null)

    const getAnimals = async (page = 1) => {
        try {
            const { data } = await axios.get(`/api/animals?page=${page}`, {
                params: {
                    orderBy: orderBy.value,
                    direction: direction.value,
                    type: filterByType.value,
                    breed: filterByBreed.value
                }
            });
            animals.value = data;
        } catch(err) {
            console.log(err);
        }
    }

    const toggleDirection = () => direction.value = direction.value === 'asc' ? 'desc' : 'asc';

    const toggleOrder = async (criteria) => {
        orderBy.value = criteria;

        toggleDirection();

        await getAnimals();
    }

    return {
        animals,
        getAnimals,
        toggleOrder,
        orderBy,
        filterByType,
        filterByBreed,
    }
}
