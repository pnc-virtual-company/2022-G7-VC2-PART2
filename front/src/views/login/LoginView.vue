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
    import encryptData from '../../helper/encrypt'
    const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;

    export default {
        data(){
            return {
                email: {
                    label: 'Email',
                    placeholder: 'e.g. user@gmail.com',
                },
                password: {
                    label: 'Password',
                    placeholder: 'e.g. @!@#$Me34',
                },
                emailValue: '',
                passwordValue: ''
            }
        },
        methods: {
            login(){
                // console.log('email ' + this.emailValue + ' password: ' + this.passwordValue)
                let email = localStorage.getItem('email')
                let password = localStorage.getItem('password')
                if(this.emailValue == email && this.passwordValue == password){
                    window.localStorage.setItem('isLogin', true);
                    console.log('isValid information')
                    const token = encryptData('werrgfgfgfgg', TOKEN_SCRET_KEY)
                    this.$cookies.set('isLogin', token, "1d") 
    
                    this.$router.push('/')
                }
            },

        }
    }
</script>