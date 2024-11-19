import {ref} from "vue";

export function useAnimals () {
    const animals = ref([]);
    const orderBy = ref(null);
    const direction = ref('desc');

    const getAnimals = async () => {
        try {
            const { data } = await axios.get('/api/animals', {
                params: {
                    orderBy: orderBy.value,
                    direction: direction.value,
                }
            });
            animals.value = data.data;
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
    }
}
