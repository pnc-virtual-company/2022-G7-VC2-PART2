<template>
    <section class="w-full">
        <header class="bg-primary">
            LOGO1 LOGO2
        </header>
        <nav class="bg-primary w-full p-2">
            <div class="flex items-center p-2 text-white">
                <img src="../../assets/schoollogos/pnc.svg" alt="">
                <div class="break-words ml-2 w-[160px]">
                    <h1 class="font-bold text-xl">
                        Admin
                    </h1>
                    <span class="w-full text-sm">admin@gmail.com</span>
                </div>
            </div>

            <router-link class="flex items-center hover:text-white hover:bg-secondary w-full p-2 cursor-pointer mt-2" to="/">
                <group-user />
                <span class="ml-2">User Management</span>
            </router-link>

            <router-link class="flex items-center hover:text-white hover:bg-secondary w-full p-2 cursor-pointer mt-2" to="/add/user">
                <single-user />
                <span class="ml-2">Add User</span>
            </router-link>

            <div class="flex items-center hover:text-white hover:fill-white hover:bg-secondary w-full p-2 cursor-pointer mt-2" @click="logout">
                <logout-icon />
                <span class="ml-2">Logout</span>
            </div>
            
        </nav>
        <main class="overflow-auto bg-bgColorWhite">
            <slot name="main"></slot>
        </main>
    </section>
</template>
<script>
import axios from '../../axios-http'
export default {
    methods: {
        logout(){
            this.$store.dispatch('logout')
            axios.post('/account/logout')
            this.$router.go()
        }
    }
}
</script>
<style scoped>
    section{
        display: grid;
        height: 100vh;
        background: rgb(127, 120, 120);
        grid-template: 
            "header header" auto
            "aside main"1fr / auto 1fr 
    }
    header {
        width: 100%;
        grid-area: header;
    }
    nav {
        grid-area: aside;
    }
    main {
        width: 100%;
        grid-area: main;
        overflow-y: scroll;
    }
    a.router-link-exact-active {
        background: #FF6B00;
        color: #fff;
        font-weight: bolder;
        fill: #fff;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
</style>>
