<template>
    <form-widget>
        <template #header>
            Ero Register
        </template>
        <template #body>
            <div  v-if="!canMoveToPW">
                <input-field :validData="validFirstName" :data="firstName" v-model="firstNameValue" />
                <span v-if="!validFirstName" class="text-red-500 text-sm flex items-center">
                    <info-icon class="w-3" />
                    Please input your first name
                </span>
                <input-field :validData="validLastName" :data="lastName" v-model="lastNameValue" />
                <span v-if="!validLastName" class="text-red-500 text-sm flex items-center">
                    <info-icon class="w-3" />
                    Please input your last name
                </span>
            </div>
            <input-pwConfirm v-else @getPassword="getPasswordFromInput"/>
        </template>
        <template #footer>
            <base-button class="my-4 w-full" @click="goToPassWord" v-if="!canMoveToPW">
                <template #name>
                    <span>Next</span>
                </template>
            </base-button>
            <base-button class="my-4 w-full" v-else @click="sumitRegister">
                <template #name>
                    <span>Register</span>
                </template>
            </base-button>
        </template>
    </form-widget>
</template>
<script>
    import axios from '../../axios-http'
    export default {
        data(){
            return {
                firstName: {
                    label: 'First Name',
                    placeholder: 'e.g. Mengyi',
                    type: "text"
                },
                lastName: {
                    label: 'Last Name',
                    placeholder: 'e.g. Yoeng',
                    type: "text"
                },
                firstNameValue: '',
                lastNameValue: '',
                passwordValue: '',
                isGotoPW: false,
                canMoveToPW: false,
                email: this.$route.query.user,
            }
        },
        methods: {
            goToPassWord(){
                this.isGotoPW = true
                if(this.firstNameValue.trim().length > 0 && this.lastNameValue.trim().length > 0){
                    this.canMoveToPW = true
                }
                else{
                    return false
                }
            },
            
            getPasswordFromInput(value){
                this.passwordValue = value
                console.log(this.passwordValue);
            },
            sumitRegister(){
                let data = {}
                data.email = this.email;
                data.first_name = this.firstNameValue;
                data.last_name = this.lastNameValue;
                data.password = this.passwordValue;
                console.log(data);
                axios.post('/register/ero', data).then(response =>{
                    console.log(response.data);
                    this.$router.push('/')
                })
            }
        },
        computed: {
            validFirstName(){
                if(this.isGotoPW){
                    return this.firstNameValue.trim().length > 0;
                }
                return true
            },
            validLastName(){
                if(this.isGotoPW){
                    return this.lastNameValue.trim().length > 0;
                }
                return true
            }
        },
        mounted(){
            this.$store.state.email = this.$route.query.user
            axios.post('/register/validation', {email: this.$route.query.user}).then(response=>{
                if(!response.data.status){
                    this.$router.push('/')
                }
            })
        }
    }
</script>