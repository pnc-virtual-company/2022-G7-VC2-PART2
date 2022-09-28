<template>
    <form-widget>
        <template #header>
            Alumni Register
        </template>
        <template v-if="firstStep" #body>
            <div class="flex flex-wrap justify-between">
                <div class="w-full">
                    <input-field :data="email" :validData="validEmail" v-model="emailValue" @keyup.enter="validEmailAddress()" />
                    <small v-if="!validEmail" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please input your email account
                    </small>
                </div>
            </div>
        </template>
        <template v-else-if="secondStep" #body>
            <div class="flex flex-wrap justify-between">
                <div class="w-full">
                    <input-field :data="verify" :validData="validVerifyCode" v-model="verifyCodeValue"  @keyup.enter="checkValidOTP()" />
                    <small v-if="!validPhone" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please input your verify number
                    </small>
                </div>
            </div>
        </template>
        <template v-else #body>
            <div class="flex flex-wrap justify-between">
                <div class="w-[49%]">
                    <input-field :validData="validFirstName" :data="firstName" v-model="firstNameValue" />
                    <small v-if="!validFirstName" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please input your first name
                    </small>
                </div>
                <div class="w-[49%]">
                    <input-field :validData="validLastName" :data="lastName" v-model="lastNameValue" />
                    <small v-if="!validLastName" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please input your last name
                    </small>
                </div>
            </div>
            <div class="flex flex-wrap justify-between">
                <div class="w-[32%]">
                    <label for="Gender" class="text-slate-500 text-sm">Gender</label><sup class="star text-blue-500">*</sup><br>
                    <select id="gender" :class="{'border-red-500': !genderChecker}" class="w-full p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1.5px] border-gray-400 text-sm" v-model="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <small v-if="!genderChecker" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please select your gender
                    </small>
                </div>
                <div class="w-[32%]">
                    <label for="batch" class="text-slate-500 text-sm">Batch</label><sup class="star text-blue-500">*</sup><br>
                    <select id="batch"  class="border-[1.5px] w-full p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-gray-400 text-sm" :class="{'border-red-500': !batchChecker}" v-model="batch">
                        <option  v-for = "batch in batchData" :key="batch" :value="batch.id">{{batch.generation}}</option>
                    </select>
                    <small v-if="!batchChecker" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please select your batch
                    </small>
                </div>
                <div class="w-[32%]">
                    <label for="major" class="text-slate-500 text-sm">Major</label><sup class="star text-blue-500">*</sup><br>
                    <select id="major" class="w-full p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1.5px] border-gray-400 text-sm" :class="{'border-red-500': !majorChecker}" v-model="major">
                        <option  v-for = "major in majorData" :key="major" :value="major.id">{{major.name}}</option>
                    </select>
                    <small v-if="!majorChecker" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please select your major
                    </small>
                </div>
            </div>
            <div class="flex flex-wrap justify-between">
                <div class="w-full">
                    <input-field :data="phone" :validData="validPhone" v-model="phoneValue" />
                    <small v-if="!validPhone" class="text-red-400 flex items-center mt-1">
                        <info-icon class="w-[1rem]" />
                        Please input your phone number
                    </small>
                </div>
            </div>
            <input-pwConfirm :isAction="isNext" @getPassword="getPasswordFromInput"/>
        </template>
        <template #footer>
            <base-button v-if="firstStep" class="my-4 w-full" @click="validEmailAddress">
                <template #name>
                    <span>Next</span>
                </template>
            </base-button>
            <base-button v-else-if="secondStep" class="my-4 w-full" @click="checkValidOTP">
                <template #name>
                    <span>Next</span>
                </template>
            </base-button>
            <base-button v-else class="my-4 w-full" @click="sumitRequest">
                <template #name>
                    <span>Request</span>
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
                email: {
                    label: 'Email',
                    placeholder: 'e.g. user@gmail.com',
                    type: "email"
                },
                phone: {
                    label: 'Phone',
                    placeholder: 'e.g. 012343943',
                    type: "number"
                },
                verify: {
                    label: 'Verify Code',
                    placeholder: 'Please, check your email',
                    type: "text"
                },
                firstNameValue: '',
                lastNameValue: '',
                gender: '',
                batch: '',
                major: '',
                phoneValue: '',
                passwordValue: '',
                emailValue: '',
                phoneValue: '',
                verifyCodeValue: '',
                isNext: false,
                batchData: [],
                majorData: [],
                firstStep: true,
                secondStep: false,
            }
        },
        methods: {            
            getPasswordFromInput(value){
                this.passwordValue = value
                console.log(this.passwordValue);
            },
            getBatch(){
               axios.get('batches').then(result=>{
                   this.batchData=result.data
               })
            },
            getMajor(){
               axios.get('majors').then(result=>{
                   this.majorData=result.data
               })
            },
            validEmailAddress(){
                axios.post('/register/info', {email: this.emailValue}).then(response => {
                    this.firstStep = false
                    this.secondStep = true
                })
            },
            checkValidOTP(){
                axios.post('/register/info/check', {email: this.emailValue, otp: this.verifyCodeValue}).then(response=>{
                    if(response.data.status_success){
                        this.firstStep = false
                        this.secondStep = false
                    }
                })
            },
            sumitRequest(){
                this.isNext = true
                let data = {}
                data.first_name = this.firstNameValue;
                data.last_name = this.lastNameValue;
                data.gender = this.gender;
                data.password = this.passwordValue;
                data.email = this.emailValue;
                data.phone = this.phoneValue;
                console.log(data);
                if(this.validFirstName && this.validLastName && this.validEmail && this.validPhone && this.genderChecker
                && this.batchChecker && this.majorChecker){
                    axios.post('/alumni/request', data).then(response =>{
                        console.log(response.data);
                        let alumni = {}
                        alumni.user_id = response.data.user_id;
                        alumni.batch_id = this.batch
                        alumni.major_id = this.major
                        console.log(alumni);
                        axios.post('alumni', alumni).then(response => {
                            console.log(response.data);
                            this.$router.push('/')
                        })
                    })
                    
                }
            }
        },
        computed: {
            validFirstName(){
                if(this.isNext){
                    return this.firstNameValue.trim().length > 0;
                }
                return true
            },
            validLastName(){
                if(this.isNext){
                    return this.lastNameValue.trim().length > 0;
                }
                return true
            },
            validEmail(){
                if(this.isNext){
                    return this.emailValue.trim().length > 0;
                }
                return true
            },
            validPhone(){
                if(this.isNext){
                    return this.phoneValue.trim().length > 0;
                }
                return true
            },
            validVerifyCode(){
                if(this.isNext){
                    return this.verifyCodeValue.trim().length > 0;
                }
                return true
            },
            genderChecker(){
                if(this.isNext){
                    return this.gender.trim().length > 0
                }
                return true
            },
            batchChecker(){
                if(this.isNext){
                    return this.batch !== ''
                }
                return true
            },
            majorChecker(){
                if(this.isNext){
                    return this.major !== ''
                }
                return true
            },
        },
        mounted(){
            this.getBatch()
            this.getMajor()
        }
    }
</script>