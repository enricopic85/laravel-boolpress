<template>
  <div>
      <h1>contatti</h1>
     <div v-if="!formSubmitted">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" v-model="formData.email">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput2">Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" v-model="formData.name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea3">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.message"></textarea>
        </div>
        <!-- attachment -->
         <div class="form-group">
          <label for="exampleFormControlInput4">Allegato</label>
          <input type="file" class="form-control" id="exampleFormControlInput3"  @change="onAttachment">
        </div>
        <button type="submit" class="btn btn-primary" @click="formSubmit">Submit</button>
    </div>
    <div v-else class="alert alert-success">
      <h4>Grazie per averci contattato</h4>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data(){
    return{
       formValidationErrors:null,
       formSubmitted:false,
      formData:{
        name:"",
        email:"",
        message:"",
        attachment:null
      }
    }
  },
  methods:{
    async formSubmit(){
      try {
        this.formValidationErrors=null;
        const formDataInstance= new FormData();
        formDataInstance.append("name",this.formData.name);
        formDataInstance.append("email",this.formData.email);
        formDataInstance.append("message",this.formData.message);
        formDataInstance.append("attachment",this.formData.attachment);
        const resp=await  axios.post("/api/contacts",formDataInstance)
        this.formSubmitted=true;
      } catch (er) {
        if (er.response.status===422) {
          this.formValidationErrors=er.response.data.errors
        }
        alert("C'è stato un problema riprovare l'invio")
      }
    },
    onAttachment(event){
      console.log(event);
      this.formData.attachment=event.target.files[0];
    }
  }
}
</script>

<style>

</style>