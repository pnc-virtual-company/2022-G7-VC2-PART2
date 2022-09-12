<template>
<<<<<<< HEAD
  <div>
    <a href="https://vitejs.dev" target="_blank">
      <img src="/vite.svg" class="logo" alt="Vite logo" />
    </a>
    <a href="https://vuejs.org/" target="_blank">
      <img src="./assets/vue.svg" class="logo vue" alt="Vue logo" />
    </a>
  </div>
  <HelloWorld msg="Vite + Vue" />
  <h1 class="text-3xl font-bold underline text-pink-700">
    Hello world!
  </h1>
  <cardview/>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Card from "./components/CardView.vue"
export default {
  components: {
    HelloWorld,
    'cardview':Card,

  }
=======
  <nav-component></nav-component>
  <router-view></router-view>
</template>

<script>
import TheNavigationBar from './components/nav/TheNavigationBar.vue'
export default {
  components: {
    'nav-component': TheNavigationBar,
  },
>>>>>>> 4d3e76feea69a80f769f6adc5f1c72e3f8679333
}
</script>

<style>
body {
  background: #F6F8F9;
}
</style>
