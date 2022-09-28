<template>
    <form-widget>
        <template v-if="this.$store.state.role == 'admin'" #header>
            Add ERO Account
        </template>
        <template v-else #header>
            Add Alumni Account
        </template>
        <template #body>
            <div v-if="!isNotRealEmail">
                <input-field :isValidEmail="isNotRealEmail" :data="email" v-model="emailValue" />
                <span v-if="isNotRealEmail == false" class="text-red-500 text-sm flex items-center">
                    <info-icon class="w-4" />
                    Couldn't find your google account
                </span>
            </div>
        </template>
        <template #footer>
            <base-button class="my-4 w-full" @click="InviteAcount">
                <template #name>
                    <span>Invite</span>
                </template>
            </base-button>
        </template>
    </form-widget>
</template>
<script>
    import axios from '../../axios-http'
    const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_CHECK_MAIL_KEY;
    let checkMailValidationURI = 'https://emailvalidation.abstractapi.com/v1/?api_key=' 
        + TOKEN_SCRET_KEY + '&email='
    export default {
        data(){
            return {
                email: {
                    label: 'Email',
                    placeholder: 'e.g. user@gmail.com',
                    type: "email"
                },
                emailValue: '',
                isNotRealEmail: null,
            }
        },
        methods: {
            InviteAcount(){
                console.log(this.emailValue);
                let data = {}
                data.email = this.emailValue;
                let linkToWeb = new URL(location.href).origin
                data.linkWeb = linkToWeb;
                if(this.$store.state.role == 'admin'){
                    let linkToRegister = new URL(location.href).origin + '/ero/register/?user='
                    data.link = linkToRegister;
                    axios.post('/invite/ero', data).then(response => {
                        this.$emit('invite', false)
                    }).catch(error=>{
                        window.alert('Email not found!')
                    })
                }else{
                    let linkToRegister = new URL(location.href).origin + '/account/alumni/register'
                    data.link = linkToRegister;
                    axios.post('/invite/alumni', data).then(response => {
                        this.$emit('invite', false)
                    }).catch(error=>{
                        window.alert('Email not found!')
                    })

                }
                // axios.get( checkMailValidationURI + this.emailValue)
                // .then(response=>{
                //     console.log(response.data.is_smtp_valid.value)
                //     this.isNotRealEmail = response.data.is_smtp_valid.value
                // })
            },
        },
    }
</script>