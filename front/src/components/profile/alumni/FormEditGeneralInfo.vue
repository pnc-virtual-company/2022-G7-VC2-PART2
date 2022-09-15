<template>
     <!-- form edit general information -->
     <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
            <form @submit.prevent="editinfo">  
                <div class="card_form text-start w-[50%] m-auto p-5">
                        <div class="bg-white p-5 rounded-md">
                        <div class="flex justify-between items-start text-sky-500/80 font-bold">
                        <div class="flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <h2 class="ml-2 text-lg">General Information</h2> 
                        </div>
                        <!-- cencel icon -->
                        <div class="w-[4%]">
                            <slot name="hidenCard">
                            </slot>
                        </div>
                    </div>
                    <hr>
                    <div class="flex mt-4 ">
                        <span style='font-size:10px;' class="text-blue-500">&#9733;</span>
                        <p class="ml-1 text-slate-500 text-sm">Indicates required</p>
                    </div>
                    <div class="flex w-[100%]">

                        <div class="w-[50%] mt-2">
                            <label for="First name" class="text-slate-500 text-sm">First name</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem" v-model="firstname" >
                        </div>
                        <div class="w-[50%] mt-2">
                            <label for="Last name" class="text-slate-500 text-sm">Last name</label> <sup class="star text-blue-500">*</sup> 
                            <br> 
                            <input type="text" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Loem" v-model="lastname">
                        </div>
                    </div>
                    <div class="flex w-[100%] mt-2">
                        <div class="w-[50%]">
                            <label for="Gender" class="text-slate-500 text-sm">Gender</label><sup class="star text-blue-500">*</sup><br>
                            <select id="gender" class="w-[97%] p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1px] border-gray-400 text-sm" v-model="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="w-[50%]">
                            <label for="Batch" class="text-slate-500 text-sm">Batch</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <select id="batch" class="w-[97%] p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1px] border-gray-400 text-sm" v-model="generation">
                                <option value="PNC2007">PNC2007</option>
                                <option value="PNC2008">PNC2008</option>
                                <option value="PNC2009">PNC2009</option>
                                <option value="PNC2010">PNC2010</option>
                                <option value="PNC2011">PNC2011</option>
                                <option value="PNC2012">PNC2012</option>
                                <option value="PNC2013">PNC2013</option>
                                <option value="PNC2014">PNC2014</option>
                                <option value="PNC2015">PNC2015</option>
                                <option value="PNC2016">PNC2016</option>
                                <option value="PNC2017">PNC2017</option>
                                <option value="PNC2018">PNC2018</option>
                                <option value="PNC2019">PNC2019</option>
                                <option value="PNC2020">PNC2020</option>
                                <option value="PNC2021">PNC2021</option>
                            </select>
                        </div>
                    </div>

                        <h3 class="mt-5 text-slate-500 text-sm font-bold">Contact info</h3>
                        <div class="flex w-[100%]">
                            <div class="w-[50%] ">
                                <label for="Email" class="text-slate-500 text-sm">Email</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="email" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. example@email.com" v-model="email">
                            </div>
                            <div class="w-[50%] ">
                                <label for="company" class='text-slate-500 text-sm' >Phone</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="number" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. 087 276 083" v-model="phone">
                            </div>
                        
                        </div>
                    <div class="text-end pt-5">
                        <hr >
                        <button type="submit" class="bg-sky-500/80 p-1 rounded-full w-[13%] text-white mt-2 mb-0">Save</button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div> 
    </div>
</template>

<script>
    import axios from '../../../axios-http';
    export default {
        props:{
            userData:Object,
            batch:Object,
        },
        data(){
            return{
                userId :1,
                batchid :1,
                gender :"",
                firstname:"",
                lastname: "",
                generation : "",
                email:"",
                phone :"",
            }
        },
        methods:{
            getData(){
                this.firstname = this.userData.firstName;
                this.lastname = this.userData.lastName;
                this.email= this.userData.email;
                this.phone= this.userData.phone;
                this.gender=this.userData.gender;
                this.generation=this.batch.generation
            },
            editinfo(){
                let userdata = {
                    firstName:this.firstname,
                    lastName:this.lastname,
                    email:this.email,
                    password:"pupd",
                    gender:this.gender,
                    phone:this.phone,
                }
                axios.put('http://127.0.0.1:8000/api/users/'+this.userId,userdata).then((response) =>{
                    return (response.data);
                })
               
                axios.put('http://127.0.0.1:8000/api/batches/'+this.batchid,{ generation:this.generation}).then((response) =>{
                    return (response.data);
                })
                this.showModal = !this.showModal;
                this.$forceUpdate()
                this.$emit('closeDiloag')
                this.$emit('refreshData')
            },
        },
        mounted(){
            this.getData();
        },
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 10;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        padding: 15px 28px;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
        z-index: 10;
    }
    .modal-body {
        margin: 20px 0;
    }
    .modal-default-button {
        float: right;
    }
    .modal-enter-from, .modal-leave-to {
        opacity: 0;
    }
    .modal-enter-active .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    };
    form {
        width: 95%;
    }
    .ellipsis-start {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 150px;
        direction: rtl;
        text-align: left;
    }
</style>

