<template>
  <section v-if="role=='alumni'">
    <alumni-nav></alumni-nav>
    <router-view></router-view>
  </section>
  <section v-if="role=='admin'">
    <admin-nav>
        <template #main>
          <router-view></router-view>
        </template>
    </admin-nav>
  </section>
</template>

<script>
import TheNavigationBar from './components/nav/TheNavigationBar.vue'
import AdminNavigationBar from './components/nav/AdminNavigationBar.vue';
export default {
  components: {
    'alumni-nav': TheNavigationBar,
    'admin-nav': AdminNavigationBar,
  },
  data(){
    return {
      role: 'admin'
    }
  }
}
</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
body {
  background: #F6F8F9;
  font-family: 'Poppins', sans-serif;
}
</style>
