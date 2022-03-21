import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "./pages/Home.vue";
import Contacts from "./pages/Contacts.vue";
import Show from "./components/posts/Show.vue";
import Error from "./components/posts/Error.vue";
Vue.use(VueRouter);

const router=new VueRouter({
    mode:"history",
    routes: [
        {path:"//",component: Home, name:"home.index", meta:{title:"HomePage",linkText:"Home"}},
        {path:"/contacts",component:Contacts ,name:"contacts.index",meta:{title:"Contatti",linkText:"Contatti"}},
        {path:"/posts/:post",component:Show,name:"posts.show", meta:{title:"Dettagli post"}},
        {path:"*", component:Error,name:"error"}
    ]
});
router.beforeEach((to,from,next)=>{
    document.title=to.meta.title;
    next();
})

export default router;