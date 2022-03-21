<template>
  <div>
      <nav>
          <ul>
            
              <!-- <li><router-link :to="{name:'contacts.index'}" >Contatti</router-link></li> -->
              <li v-for="route in routes" :key="route.path"> <router-link :to="route.path">{{route.meta.linkText}}</router-link></li>
          </ul>
      </nav>
  </div>
</template>

<script>
export default {
    data(){
        return{
            routes:[]
        }
    },
    mounted(){
        this.routes= this.$router.getRoutes().filter((route)=>route.meta.linkText);
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