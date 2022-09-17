<template>
    <form class="w-[50%] bg-white shadow-md rounded-sm py-4 m-auto z-20 mt-5 px-5" @submit.prevent="login" v-cloak>
        <div class="text-primary font-bold text-3xl text-center">
            Login
        </div>
        <div>
            <input-field :data="email" v-model="emailValue" />
            <input-field :data="password" v-model="passwordValue"/>
            <p class="text-right text-red-500 cursor-pointer">Forgot password?</p>
        </div>
        <div class="w-full flex justify-center">
            <base-button class="my-4">
                <template #name>
                    Login
                </template>
            </base-button>
        </div>
        <p class="text-center">Don’t have an account yet?, <span class="text-primary cursor-pointer">signup</span></p>
    </form>
</template>
<script>
    import axios from '../../axios-http'
    import encryptData from '../../helper/encrypt'
    const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;
    const USER_SCRET_KEY = import.meta.env.VITE_APP_USER_KEY;

    export default {
        data(){
            return {
                email: {
                    label: 'Email',
                    placeholder: 'e.g. user@gmail.com',
                    type: "email"
                },
                password: {
                    label: 'Password',
                    placeholder: 'e.g. @!@#$Me34',
                    type: "password"
                },
                emailValue: '',
                passwordValue: '',
            }
        },
        methods: {
            login(){
                let email = localStorage.getItem('email')
                let password = localStorage.getItem('password')
                axios.post('account/login', {email: this.emailValue, password: this.passwordValue})
                    .then(response => {
                        console.log(response.data.user.id);
                        const token = encryptData(response.data.token, TOKEN_SCRET_KEY)
                        const user_id = encryptData(response.data.user.id.toString(), USER_SCRET_KEY)
                        this.$cookies.set('token', token, "1d") 
                        this.$cookies.set('user_id', user_id, "1d") 
                        this.$router.go()
                    })
            },
        }
    }
</script>