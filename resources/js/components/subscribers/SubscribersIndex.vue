<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <button
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-4">
            <router-link :to="{ name: 'subscribers.create' }">Create Subscriber</router-link>
        </button>
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50"><span
                    class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50"><span
                    class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
                </th>
                <th class="px-6 py-3 bg-gray-50"><span
                    class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Subscriber state</span>
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <tr class="bg-white" v-for="subscriber in subscribers" :key="subscriber.id">
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ subscriber.name }}</td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ subscriber.email }}</td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{
                        subscriber.state.name
                    }}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    <router-link :to="{ name: 'subscribers.edit', params: { id: subscriber.id } }"
                                 class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Edit
                    </router-link>
                    <button @click="deleteSubscriber(subscriber.id)"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import useSubscribers from "../../../composables/subscribers";
import {onMounted} from "vue";

export default {
    setup() {
        const {subscribers, getSubscribers, destroySubscriber} = useSubscribers()

        onMounted(getSubscribers)

        const deleteSubscriber = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }

            await destroySubscriber(id);
            await getSubscribers();
        }

        return {
            subscribers,
            deleteSubscriber
        }
    }
}
</script>
