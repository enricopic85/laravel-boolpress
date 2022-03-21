<template>
     <div class="col  ">
    <div class="card  height">
      <img :src="post.coverImg ? post.coverImg : 'https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png'" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-text" v-html="post.content"></p>

        <em>Autore: {{ post.user.name }}; Data: {{formatDate(post.created_at)}}</em> 
        <br />
        <strong v-if="post.category">Categoria: {{ post.category.name }}</strong>
      </div>

      <div class="card-footer">
        <a href="#">Dettagli</a>
      </div>
    </div>
  </div>
</template>

<script>
import dayjs from "dayjs";
export default {
    props:{
        post:Object,
    },
    methods:{
        formatDate(date){
            return dayjs(date).format("DD/MM/YYYY HH:mm");
        }
    }
}
</script>

<style lang="scss" scoped>
    .height{
        height: 600px;
        width: 500px;
        margin-bottom: 30px;
    }
</style>