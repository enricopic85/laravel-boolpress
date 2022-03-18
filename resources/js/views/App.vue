<template>
    <div class="container">
        <div class="row">
            <div class="d-flex flex-wrap mt-3">
                <PostCard v-for="post of posts" :key="post.id" :post="post"></PostCard>
            </div>
        </div>
    </div>
</template>

<script>
import TheNavbar from './TheNavbar.vue';
import axios from "axios";
import PostCard from '../components/PostCard.vue';
export default {
  components: { TheNavbar,PostCard },
  data(){
    PostCard
      return{
          posts:[]
      }
  },
  methods:{
      fetchPosts(){
          axios.get("/api/posts")
          .then(resp=>{
              console.log(resp)
              this.posts=resp.data.data

          })
      }
  },
  mounted(){
      this.fetchPosts();
  } 
}
</script>

<style lang="scss" scoped>

</style>
