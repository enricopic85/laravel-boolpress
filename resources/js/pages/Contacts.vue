<template>
  <div>
      <h1>contatti</h1>
     <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" v-model="formData.email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" v-model="formData.name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.message"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" @click="formSubmit">Submit</button>
</form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data(){
    return{
      formData:{
        name:"",
        email:"",
        message:""
      }
    }
  },
  methods:{
    async formSubmit(){
    const resp=await  axios.post("/api/contacts",this.formData)
    resp.data
    }
  }
}
</script>

<style>

</style>