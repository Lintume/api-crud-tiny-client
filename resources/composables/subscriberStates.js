import {ref} from 'vue'
import axios from "axios";

export default function useSubscriberStates() {
    const subscriberStates = ref([])

    const getSubscriberStates = async () => {
        let response = await axios.get('/api/subscriber-states')
        subscriberStates.value = response.data.data;
    }

    return {
        subscriberStates,
        getSubscriberStates
    }
}
