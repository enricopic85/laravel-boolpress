<template>
  <div>
       <div class="row">
            <div class="d-flex flex-wrap mt-3">
                <PostCard v-for="post of posts" :key="post.id" :post="post"></PostCard>
            </div>
        </div>
         <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" @click="fetchPosts(pagination.current_page - 1)">Previous</a></li>
                <li class="page-item d-flex"  v-for="page in pagination.last_page " :key="page" ><a class="page-link" href="#" @click="fetchPosts(page)">{{page}}</a></li>
                <li class="page-item"><a class="page-link" href="#" @click="fetchPosts(pagination.current_page +1)" >Next</a></li>
            </ul>
        </nav>
  </div>
</template>

<script>
import axios from "axios";
import PostCard from "../components/PostCard.vue";
export default {
     components: { PostCard},
  data(){
    // PostCard
      return{
          posts:[],
          pagination: {}
      }
  },
  methods:{
      fetchPosts(page=1){
          if (page<1) {
              page=1;
          }
          if (page>this.pagination.last_page) {
              page=this.pagination.last_page;
          }
          axios.get("/api/posts?page=" + page)
          .then(resp=>{
              console.log(resp)
              this.pagination=resp.data;
              this.posts=resp.data.data

          })
      }
  },
  mounted(){
      this.fetchPosts();
  } 
}
</script>

<style>

</style>