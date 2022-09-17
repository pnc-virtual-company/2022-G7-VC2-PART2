<template>
  <nav-component></nav-component>
  <router-view></router-view>
</template>

<script>
import TheNavigationBar from './components/nav/TheNavigationBar.vue'
export default {
  components: {
    'nav-component': TheNavigationBar,
  },
}
</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
body {
  background: #F6F8F9;
  font-family: 'Poppins', sans-serif;
}
</style>
