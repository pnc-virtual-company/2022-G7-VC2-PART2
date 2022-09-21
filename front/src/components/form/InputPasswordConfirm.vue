<template>
    <section>
        <div>
            <input-field :isValidPw="error" :data="password" v-model="passwordValue" @change="returnPassword" />
            <input-field :isValidPw="error" :data="passwordConfirm" v-model="passwordConfirmValue" @change="returnPassword" />
        </div>
        <span v-if="isTheSamePassword == false" class="text-red-500 text-sm flex items-center">
            <info-icon class="w-4" />
            Password must be the same
        </span>
        <div class="text-gray-500  mt-3">
            <h2>Password Strength</h2>
            <ul class="list-disc text-sm px-4">
                <li :class="{ 'text-green-500': samePassword }">The same password</li>
                <li :class="{ 'text-green-500': isNotValidLength }">8 Characters</li>
                <li :class="{ 'text-green-500': isContainNumber }">Contains Number</li>
                <li :class="{ 'text-green-500': isContainUpper }">Contains Uppercase</li>
                <li :class="{ 'text-green-500': isContainSpecailChar }">Contains Special Character</li>
            </ul>
        </div>
    </section>
</template>
<script>
    export default {
        data(){
            return {
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
                error: false,
                pwValid: null,
                testE: 'mengyi@gmail.com',
                testP: 'mengyi@gmail.com',
                theSamePw: false,
                containsEighLength: false,
                containsNumber: false,
                containsUppercase: false,
                containsSpecialChar: false,
                format: /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/,
            }
        },
        methods: {
            canSubmit(){
                if(this.theSamePw && this.containsEighLength && this.containsNumber
                    && this.containsSpecialChar && this.containsUppercase){
                        return true;
                }else{
                    this.error = true
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
            },
            returnPassword(){
                if(this.canSubmit()){
                    this.error = false
                    this.$emit('getPassword', this.passwordValue)
                }else{
                    this.$emit('getPassword', '')
                }
            }
        }
    }
</script>