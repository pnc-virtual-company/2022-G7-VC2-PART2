<template>
  <section>
    <user-nav>
        <template #main>
          <router-view></router-view>
        </template>
    </user-nav>
  </section>

</template>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
body {
  background: #F6F8F9;
  font-family: 'Poppins', sans-serif;
}
</style>
