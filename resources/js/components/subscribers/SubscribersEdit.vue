<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
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
                           v-model="subscriber.name">
                </div>
            </div>

            <div>
                <label for="email" class="mt-4 block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="subscriber.email">
                </div>
            </div>

            <div>
                <label for="subscriber_state_id" class="mt-4 block text-sm font-medium text-gray-700">Subscriber
                    State</label>
                <div class="mt-1">
                    <select id="subscriber_state_id"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="subscriber.subscriber_state_id">
                        <option :value="state.id" v-for="state in subscriberStates">
                            {{ state.name }}
                        </option>
                    </select>

                </div>
            </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Fields
        </h3>
        <div v-for="(field, key) in subscriber.fields" class="w-full">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex justify-between items-start rounded-t">
                    <button v-on:click.prevent="deleteField(key)" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" v-model="field.title" type="text" placeholder="title">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="field_type_id">
                        Field Type
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="field_type_id" v-model="field.field_type_id">
                        <option :value="type.id" v-for="type in fieldTypes">
                            {{ type.name }}
                        </option>
                    </select>
                </div>
            </form>
        </div>

        <button v-on:click.prevent="addField"
                class="mt-4 mr-4 items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Add Field
        </button>

        <button type="submit"
                class="mt-4 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Update
        </button>
    </form>
</template>

<script>
import {onMounted} from "vue";
import useSubscribers from "../../../composables/subscribers";
import useSubscriberStates from "../../../composables/subscriberStates";
import useFieldTypes from "../../../composables/fieldTypes";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const {errors, subscriber, getSubscriber, updateSubscriber} = useSubscribers()
        const {subscriberStates, getSubscriberStates} = useSubscriberStates()
        const {fieldTypes, getFieldTypes} = useFieldTypes()

        onMounted(getSubscriberStates)
        onMounted(getFieldTypes)
        onMounted(getSubscriber(props.id))

        const saveSubscriber = async () => {
            await updateSubscriber(props.id)
        }
        return {
            errors,
            subscriber,
            saveSubscriber,
            subscriberStates,
            fieldTypes
        }
    },
    methods: {
        addField: function () {
            this.subscriber.fields.push({
                'id': '',
                'title': '',
                'field_type_id': ''
            });
        },
        deleteField: function (fieldIndex) {
            this.subscriber.fields.splice(fieldIndex, 1);
        }
    }
}
</script>
