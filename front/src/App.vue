<template>
  <section>
    <user-nav>
        <template #main>
          <router-view></router-view>
        </template>
    </user-nav>
  </section>

</template>
<script>
  export default {
    data(){
      return {
        firstName: '',
        lastName: '',
      }
    },
    methods: {
      async getData(){
            await axios.get('/account/getData').then(response=>{
                this.firstName = response.data.data.first_name
                this.lastName = response.data.data.last_name
            }).catch(error=>{
              this.$store.dispatch('logout')
              this.$router.go()
            })
        }
    },
    mouted(){
      this.getData();
    }
  }
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
body {
  background: #F6F8F9;
  font-family: 'Poppins', sans-serif;
}
*::-webkit-scrollbar:horizontal {
  height: 1px;
  }
  *::-webkit-scrollbar {
      width: 3px;
  }
  *::-webkit-scrollbar-thumb {
    background-color: #0081CA;
    border-radius: 20px;
  }
</style>
