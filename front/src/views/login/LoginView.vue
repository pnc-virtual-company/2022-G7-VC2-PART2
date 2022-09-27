<template>
    <form class="w-[40%] bg-white shadow-md rounded-sm py-4 m-auto z-20 mt-5 px-5" @submit.prevent="login" v-cloak>
        <div class="text-primary font-bold text-3xl text-center">
            Login
        </div>
        <div>
            <input-field :data="email" :validData="!error_email" v-model="emailValue" />
            <span v-if="error_email" class="text-red-500 text-sm flex items-center mt-1">
                <info-icon class="w-3" />
                {{error_email_message}}
            </span>

            <input-field :data="password" :isValidPw="error_password" v-model="passwordValue"/>
            <span v-if="error_password" class="text-red-500 text-sm flex items-center mt-1">
                <info-icon class="w-3" />
                {{error_password_message}}
            </span>
            <p class="text-right text-red-500 cursor-pointer">Forgot password?</p>
        </div>
        <div class="w-full flex justify-center">
            <base-button class="my-4">
                <template #name>
                    Login
                </template>
            </base-button>
        </div>
        <p class="text-center">Don’t have an account yet?, 
            <router-link to="/account/alumni/register">
                <span class="text-primary cursor-pointer">signup</span>
            </router-link>
        </p>
    </form>
</template>
<script>
    import axios from '../../axios-http'
    import encryptData from '../../helper/encrypt'
    const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;
    const USER_SCRET_KEY = import.meta.env.VITE_APP_USER_KEY;
    const ROLE_SCRET_KEY = import.meta.env.VITE_APP_USER_ROLE_KEY;
    const ACTIVATED_SCRET_KEY = import.meta.env.VITE_APP_ACTIVATED_KEY;

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
                error_email: false,
                error_email_message: '',
                error_password: false,
                error_password_message: '',
            }
        },
        methods: {
            login(){
                axios.post('account/login', {email: this.emailValue, password: this.passwordValue})
                    .then(response => {
                        console.log(response.data.user.id);
                        const token = encryptData(response.data.token, TOKEN_SCRET_KEY)
                        const user_id = encryptData(response.data.user.id.toString(), USER_SCRET_KEY)
                        const user_role = encryptData(response.data.user.role, ROLE_SCRET_KEY)
                        if(response.data.user.role == 'alumni'){
                            let permission = response.data.user.invited;
                            if(permission == 0){
                                permission = false
                            }else{
                                permission = true
                            }
                            const activated = encryptData(permission.toString(), ACTIVATED_SCRET_KEY)
                            this.$cookies.set('activated', activated, "1d") 
                        }
                        this.$cookies.set('token', token, "1d") 
                        this.$cookies.set('user_id', user_id, "1d") 
                        this.$cookies.set('user_role', user_role, "1d") 
                        this.$router.go()
                    })
                    .catch(error=>{
                        console.log(error.response.data);
                        if(error.response.data.email){
                            this.error_email_message = error.response.data.message
                            this.error_email = true
                        }else{
                            this.error_email = false
                            this.error_password_message = error.response.data.message
                            this.error_password = true
                        }
                    })
            },
        }
    }
</script>