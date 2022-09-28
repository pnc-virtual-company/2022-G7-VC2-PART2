<template>
    <section class="w-full">
        <header class="bg-primary">
            <base-nav :firstName="firstName" :lastName="lastName" @logout="logout" />
        </header>
        <nav class="bg-blue-300 p-2 flex flex-col relative" v-if="$store.state.role == 'admin' || $store.state.role == 'ero'">
            <div class="flex items-center p-2 text-white flex-wrap justify-center text-center">
                <img src="../../assets/schoollogos/pnc.svg" alt="" class="w-[30%]">
                <div class="ml-2 break-words max-w-[200px]">
                    <h1 class="font-bold text-xl">
                        <span>
                            {{firstName}} {{lastName}}
                        </span>
                        <span v-if="$store.state.role == 'admin'">Admin</span>
                    </h1>
                    <span class="w-full text-[12px]">{{email}}</span>
                </div>
            </div>

            <router-link class="flex items-center hover:text-white w-full p-2 cursor-pointer mt-2 transition" to="/">
                <group-user />
                <span class="ml-2">User Management</span>
            </router-link>

            <div class="flex items-center hover:text-white hover:fill-white p-2 cursor-pointer mt-2 my-auto absolute bottom-0 transition" @click="logout">
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
    data(){
        return {
            email: null,
            firstName: null,
            lastName: null,
        }
    },
    methods: {
        logout(){
            this.$store.dispatch('logout')
            axios.post('/account/logout')
            this.$router.go()
        },
        async getData(){
            await axios.get('/account/getData').then(response=>{
                this.firstName = response.data.data.first_name
                this.email = response.data.data.email
                this.lastName = response.data.data.last_name
                console.log('admin created!!!')
                console.log(response.data.data)
            })
        }
    },
    created(){
        this.getData()
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
