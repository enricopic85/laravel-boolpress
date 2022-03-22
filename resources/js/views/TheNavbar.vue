<template>
  <div>
      <nav>
          <ul>
            
              <!-- <li><router-link :to="{name:'contacts.index'}" >Contatti</router-link></li> -->
              <li v-for="route in routes" :key="route.path"> <router-link :to="route.path">{{route.meta.linkText}}</router-link></li>
              <li><a href="/login" v-if="!user">Login</a>
                    <a href="/admin" v-else>{{user.name}}</a>
              </li>
              <!-- <li><a href="/admin" v-else>Admin</a></li> -->
          </ul>
      </nav>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            routes:[],
            user:null
        }
    
    },
     methods:{
            fetchUser(){
                axios.get("/api/user").then((resp)=>{
                    console.log(resp.data)
                    this.user=resp.data;
                    // localStorage.setItem("user", JSON.stringify(resp.data));
                    // window.dispatchEvent(new CustomEvent("storedUserChanged"));
                }).catch((er)=>{
                    console.error("utente non loggato");
                    // localStorage.removeItem("user");
                    // window.dispatchEvent(new CustomEvent("storedUserChanged"));
                })
            },
        },
    mounted(){
        this.routes= this.$router.getRoutes().filter((route)=>route.meta.linkText);
        this.fetchUser();
    }
}
</script>

<style lang="scss" scoped>
    nav{
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        ul{
        display: flex;
        gap: 20px;
        li{
            list-style-type:none;
            cursor: pointer;
        }
    }
    }
    
</style>