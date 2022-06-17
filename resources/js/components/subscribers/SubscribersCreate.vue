<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveSubscriber">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mt-4">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>
            </div>

            <div>
                <label for="email" class="mt-4 block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.email">
                </div>
            </div>

            <div>
                <label for="subscriber_state_id" class="mt-4 block text-sm font-medium text-gray-700">Subscriber State</label>
                <div class="mt-1">
                    <select id="subscriber_state_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.subscriber_state_id">
                        <option :value="state.id" v-for="state in subscriberStates">
                           {{ state.name }}
                        </option>
                    </select>

                </div>
            </div>
        </div>

        <button type="submit"
                class="mt-4 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>

<script>
import { reactive } from "vue";
import useSubscribers from "../../../composables/subscribers";
import {onMounted} from "vue";
import useSubscriberStates from "../../../composables/subscriberStates";

export default {
    setup() {
        const form = reactive({
            'name': '',
            'email': '',
            'subscriber_state_id': ''
        })
        const { errors, storeSubscriber } = useSubscribers()
        const { subscriberStates, getSubscriberStates } = useSubscriberStates()

        onMounted(getSubscriberStates)

        const saveSubscriber = async () => {
            await storeSubscriber({...form});
        }
        return {
            form,
            errors,
            saveSubscriber,
            subscriberStates
        }
    }
}
</script>
