<template>
    <div class="w-full mt-2 relative">
        <label for="First name" class="text-slate-500 text-sm">{{data.label}}</label> <sup class="star text-blue-500">*</sup> 
        <br>
        <div v-if="data.type=='password'">
            <input v-if="showPassword" :type="data.type" class="w-full p-1 mt-1 outline-blue-500 border-solid border-[1.5px] border-gray-400" :class="{'border-red-500': !isValidPw && isValidPw !== undefined}" :placeholder="data.placeholder" required v-model="inputValue" @input="$emit('update:modelValue', $event.target.value)" >
            <input v-else type="text" class="w-full p-1 mt-1 outline-blue-500 border-solid border-[1.5px] border-gray-400" :class="{'border-red-500': !isValidPw && isValidPw !== undefined}" :placeholder="data.placeholder" required v-model="inputValue" @input="$emit('update:modelValue', $event.target.value)" >
            <eye-close v-if="showPassword" class="absolute top-[54%] right-3" @click="toggleShow"></eye-close>
            <eye-open v-else class="absolute top-[54%] right-3" @click="toggleShow"></eye-open>
        </div>
        <input v-else :type="data.type" class="w-full p-1 mt-1 outline-blue-500 border-solid border-[1.5px] border-gray-400" :class="{'border-red-500': isValidEmail==false}" required :placeholder="data.placeholder" v-model="inputValue" @input="$emit('update:modelValue', $event.target.value)">
    </div>
</template>
<script>
    export default {
        props: ['data', 'isValidEmail', 'isValidPw'],
        data(){
            return {
                inputValue: '',
                showPassword: true
            }
        },
        methods: {
            toggleShow(){
                this.showPassword = !this.showPassword;
            }
        },
    }
</script>