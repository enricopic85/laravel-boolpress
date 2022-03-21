import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "./pages/Home.vue";
import Contacts from "./pages/Contacts.vue";
Vue.use(VueRouter);

const router=new VueRouter({
    mode:"history",
    routes: [
        {path:"/",component: Home, name:"home.index", meta:{title:"HomePage",linkText:"Home"}},
        {path:"/contacts",component:Contacts ,name:"contacts.index",meta:{title:"Contatti",linkText:"Contatti"}}
    ]
});

export default router;