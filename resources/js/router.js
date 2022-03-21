import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "./pages/Home.vue";
import Contacts from "./pages/Contacts.vue";
Vue.use(VueRouter);

const router=new VueRouter({
    router: [
        {path:"/",component: Home, name:"home.index"},
        {path:"/contacts",component:Contacts ,name:"contacts.index"}
    ]
});

export default router;