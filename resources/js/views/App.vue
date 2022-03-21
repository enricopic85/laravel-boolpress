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

}
</script>

<style lang="scss" scoped>

</style>
