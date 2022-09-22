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
body {
  background: #F6F8F9;
}
</style>
