<template>
    <div class="modal-mask">
      <div class="modal-wrapper">
          <div class="modal-container rounded">
              <form @submit.prevent="addSchool">  
                    <div class="card_form text-start w-[50%] m-auto p-5">
                        <div class="bg-white p-5 rounded-md">
                        <div class="flex justify-between items-start text-sky-500/80 font-bold">
                        <div class="flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-[6%]" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <h2 class="ml-2 text-lg">Education Background</h2> 
                        </div>
                         <!-- cencel icon -->
                         <div class="w-[4%]">
                            <slot name="hidden-form">
                            </slot>
                        </div>
                        
                        </div>
                        <hr>
                         
                        <div class="flex mt-4 ">
                        <span style='font-size:10px;' class="text-blue-500">&#9733;</span>
                        <p class="ml-1 text-slate-500 text-sm">Indicates required</p>
                        </div>
                            <div class="flex w-[100%]">
                                <div class="w-[100%] mt-1">
                                    <label for="name" class="text-slate-500 text-sm">School Name</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. PNC" v-model="school_name">
                                </div>
                                <div class="w-[100%] mt-1">
                                    <label for="address" class="text-slate-500 text-sm">Degree</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. bachelor's degree" v-model="degree">
                                </div>
                            </div>

                            <div class="w-[100%] mt-2">
                            <br>
                            <input type="checkbox" id="current" class="cursor-pointer mt-2" v-model="current">
                            <label for="current" class="ml-3">currently is studying at this school!</label>
                            </div>

                        <div class="flex w-[100%]">
                            <div class="w-[50%] mt-2" v-if="!current" >
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400 cursor-pointer" placeholder="e.g. Sophiem" v-model="start_date">
                            </div>
                            
                            <div class="w-[100%] mt-2" v-else >
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400 cursor-pointer" placeholder="e.g. Sophiem" v-model="start_date">
                            </div>

                            <div class="w-[50%] mt-2" v-if="!current">
                                <label for="enddate"  class="text-slate-500 text-sm">End_date</label> <sup class="star text-blue-500">*</sup> 
                                <br> 
                                <input type="date"  class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400 cursor-pointer" placeholder="e.g. Loem" v-model="end_date">
                            </div>
                        </div>
                            
                            <div class="w-[100%] mt-1 relative">
                            <label for="file" class="text-slate-500 text-sm">School's Logo</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="file" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" accept="images/*"  @change="onchangeScprofile">
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
import Swal from "sweetalert2";
export default {
    emits:['add-school'],
    data(){
        return {
            start_date:"",
            end_date:"",
            school_name:"",
            degree:"",
            current:'',
            school_profile:"",
            allowExtension:['jpg','png'],
            disable:false,
        }
    },
    methods:{
        addSchool(){
            if (this.start_date != "" && this.degree != "" && this.school_name != "" &&(this.current !='' || this.end_date != "")){
                let formdata = new FormData();
                formdata.append('school_name',this.school_name);
                formdata.append('start_date',this.start_date);
                formdata.append('end_date',this.end_date);
                formdata.append('school_logo',this.school_profile);
                formdata.append('degree',this.degree);
                formdata.append('alumni_id',1);
                if (this.current==true){
                    formdata.append('current',1);
                }else {
                    formdata.append('current',0);
                }
                axios.post('http://127.0.0.1:8000/api/school',formdata).then((response)=>{
                    if (response.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Alumni School have been add',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                })
            }else {
                Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Fail to add alumni school',
                        showConfirmButton: false,
                        timer: 1500,
                })
            }
            this.$emit('add-school')
        },
        onchangeScprofile(event){
            let fileExtension = event.target.files[0].name.split(".").pop();
            if (this.allowExtension.includes(fileExtension.toLowerCase())) {
                this.school_profile = event.target.files[0];
            }
        },
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
    .whendisable {
        width: 100%;
    }
</style>