<template>
    <div class="container">
        <the-navbar></the-navbar>
        <router-view></router-view>
       
    </div>
   
</template>

<script>
import TheNavbar from './TheNavbar.vue';

export default {
  components: { TheNavbar},
//   data(){
//     PostCard
//       return{
//           posts:[],
//           pagination: {}
//       }
//   },
//   methods:{
//       fetchPosts(page=1){
//           if (page<1) {
//               page=1;
//           }
//           if (page>this.pagination.last_page) {
//               page=this.pagination.last_page;
//           }
//           axios.get("/api/posts?page=" + page)
//           .then(resp=>{
//               console.log(resp)
//               this.pagination=resp.data;
//               this.posts=resp.data.data

//           })
//       }
//   },
//   mounted(){
//       this.fetchPosts();
//   } 
}
</script>

<style lang="scss" scoped>

</style>
