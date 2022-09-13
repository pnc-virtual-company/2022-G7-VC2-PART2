<template>
  <nav-component></nav-component>
  <router-view></router-view>
</template>

<script>
import TheNavigationBar from './components/nav/TheNavigationBar.vue'
import Card from './components/WorkExperieces/CardView.vue'
export default {
  components: {
    'nav-component': TheNavigationBar,
    'cardview': Card
  },
}
</script>

<style>
body {
  background: #F6F8F9;
}
</style>
