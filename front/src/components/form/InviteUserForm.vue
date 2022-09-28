<template>
    <form class="w-[50%] bg-white shadow-md rounded-sm py-4 m-auto z-20 mt-5 px-5" @submit.prevent="addAcount" v-cloak>
        <div v-if="this.$store.state.role == 'admin'" class="text-primary font-bold text-2xl text-center">
            Invite ERO
        </div>
        <div v-else class="text-primary font-bold text-2xl text-center">
            Invite Alumni
        </div>
        <div>
            <div v-if="!isNotRealEmail">
                <input-field :isValidEmail="isNotRealEmail" :data="email" v-model="emailValue" />
                <span v-if="isNotRealEmail == false" class="text-red-500 text-sm flex items-center">
                    <info-icon class="w-4" />
                    Couldn't find your google account
                </span>
            </div>
            <div v-else>
                <input-field :isValidPw="isTheSamePassword" :data="password" v-model="passwordValue"/>
                <input-field :isValidPw="isTheSamePassword" :data="passwordConfirm" v-model="passwordConfirmValue"/>
            </div>
            <span v-if="isTheSamePassword == false" class="text-red-500 text-sm flex items-center">
                <info-icon class="w-4" />
                Password must be the same
            </span>
        </div>
        
        <div class="text-gray-500  mt-3" v-if="isNotRealEmail">
            <h2>Password Strength</h2>
            <ul class="list-disc text-sm px-4">
                <li :class="{ 'text-green-500': samePassword }">The same password</li>
                <li :class="{ 'text-green-500': isNotValidLength }">8 Characters</li>
                <li :class="{ 'text-green-500': isContainNumber }">Contains Number</li>
                <li :class="{ 'text-green-500': isContainUpper }">Contains Uppercase</li>
                <li :class="{ 'text-green-500': isContainSpecailChar }">Contains Special Character</li>
            </ul>
        </div>

        <div class="w-full flex justify-center">
            <base-button class="my-4 w-full">
                <template #name>
                    <span v-if="isNotRealEmail">Add</span>
                    <span v-else>Next</span>
                </template>
            </base-button>
        </div>
    </form>
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
                    placeholder: 'e.g. ero@gmail.com',
                    type: "email"
                },
                password: {
                    label: 'Password',
                    placeholder: 'e.g. @!@#$Me34',
                    type: "password"
                },
                passwordConfirm: {
                    label: 'Password Confirm',
                    placeholder: 'e.g. @!@#$Me34',
                    type: "password"
                },
                emailValue: '',
                passwordValue: '',
                passwordConfirmValue: '',
                isNotRealEmail: null,
                pwValid: null,
                theSamePw: false,
                containsEighLength: false,
                containsNumber: false,
                containsUppercase: false,
                containsSpecialChar: false,
                format: /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/
            }
        },
        methods: {
            addAcount(){
                if(this.testE == this.emailValue){
                    this.isNotRealEmail = true;
                }else{
                    this.isNotRealEmail = false
                }
                if(this.canSubmit()){
                    console.log('submited!!!')
                }
                // else{

                // }
                // if(this.testE == this.emailValue && this.testP == this.passwordValue){

                // }
                // console.log('next step');
                // this.isNotRealEmail = false;

                // if(this.isNotRealEmail !== true){
                //     console.log('email is valid');
                //     this.error = true;
                // }

                // if(this.passwordValue == this.passwordConfirmValue){
                //     console.log('account created successfully!!!');
                //     this.pwValid = true;
                // }else{
                //     this.error = true;
                //     this.pwValid = false;
                // }
                // axios.get( checkMailValidationURI + this.emailValue)
                // .then(response=>{
                //     console.log(response.data.is_smtp_valid.value)
                //     this.isNotRealEmail = response.data.is_smtp_valid.value
                // })
            },
            canSubmit(){
                if(this.theSamePw && this.containsEighLength && this.containsNumber
                    && this.containsSpecialChar && this.containsUppercase){
                        return true;
                }
            }
        },
        computed: {
            samePassword(){
                this.theSamePw = this.passwordValue == this.passwordConfirmValue
                return this.passwordValue == this.passwordConfirmValue && this.passwordValue.trim().length > 0 && this.passwordConfirmValue.trim().length > 0
            },
            isNotValidLength(){
                if(this.passwordValue.trim().length >= 8 && this.passwordConfirmValue.trim().length >= 8){
                    this.containsEighLength = true
                    return this.containsEighLength
                }
            },
            isContainNumber(){
                this.containsNumber = /\d/.test(this.passwordValue)
                return this.containsNumber
            },
            isContainUpper(){
                this.containsUppercase = /[A-Z]/.test(this.passwordValue)
                return this.containsUppercase;
            },
            isContainSpecailChar(){
                this.containsSpecialChar = this.format.test(this.passwordValue);
                return this.containsSpecialChar;
            }
        }
    }
</script>