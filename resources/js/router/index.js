import { createRouter, createWebHistory} from "vue-router"

import SubscribersIndex from '../components/subscribers/SubscribersIndex'
import SubscribersCreate from '../components/subscribers/SubscribersCreate'
import SubscribersEdit from "../components/subscribers/SubscribersEdit";

const routes = [
    {
        path: '/',
        name: 'subscribers.index',
        component: SubscribersIndex
    },
    {
        path: '/subscribers/create',
        name: 'subscribers.create',
        component: SubscribersCreate
    },
    {
        path: '/subscribers/:id/edit',
        name: 'subscribers.edit',
        component: SubscribersEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
