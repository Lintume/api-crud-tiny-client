import {ref} from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useSubscribers() {
    const subscribers = ref([])
    const subscriber = ref([])
    const router = useRouter()

    const errors = ref('');

    const getSubscribers = async () => {
        let response = await axios.get('/api/subscribers')
        subscribers.value = response.data.data;
    }

    const getSubscriber = async (id) => {
        let response = await axios.get('/api/subscribers/' + id)
        subscriber.value = response.data.data;
    }

    const storeSubscriber = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/subscribers', data)
            await router.push({name: 'subscribers.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateSubscriber = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/subscribers/' + id, subscriber.value)
            await router.push({name: 'subscribers.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }


    const destroySubscriber = async (id) => {
        await axios.delete('/api/subscribers/' + id)
    }

    return {
        subscribers,
        subscriber,
        errors,
        getSubscribers,
        getSubscriber,
        storeSubscriber,
        updateSubscriber,
        destroySubscriber
    }
}
