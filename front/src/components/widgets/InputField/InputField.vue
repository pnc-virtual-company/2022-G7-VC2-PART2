<template>
    <div class="w-full mt-2">
        <label for="First name" class="text-slate-500 text-sm">{{data.label}}</label> <sup class="star text-blue-500">*</sup> 
        <br>
        <input type="text" class="w-full p-1 mt-1 outline-blue-500 border-solid border-[1.5px] border-gray-400" :placeholder="data.placeholder" v-model="inputValue" @input="$emit('update:modelValue', $event.target.value)" >
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data(){
            return {
                inputValue: ''
            }
        },
    }
</script>