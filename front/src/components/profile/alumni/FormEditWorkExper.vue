<template>
    <!-- form edit work experience  -->
  <section>
    <div class="modal-mask">
      <div class="modal-wrapper">
          <div class="modal-container rounded">
              <form @submit.prevent="editworkexperience">  
                    <div class="card_form text-start w-[50%] m-auto p-5">
                        <div class="bg-white p-5 rounded-md">
                        <div class="flex justify-between items-start text-sky-500/80 font-bold">
                        <div class="flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <h2 class="ml-2 text-lg">WorkExperience Information</h2> 
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
                            <div class="w-[50%] mt-2">
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem" v-model="start_date">
                            </div>
                            <div class="w-[50%] mt-2">
                                <label for="enddate" class="text-slate-500 text-sm">End_date</label> <sup class="star text-blue-500">*</sup> 
                                <br> 
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Loem" v-model="end_date">
                            </div>
                        </div>
                            
                            <div class="w-[100%] mt-2">
                            <label for="position" class="text-slate-500 text-sm">Position</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. web developer" v-model="position">
                            </div>
                            <h3 class="mt-7 text-slate-500 text-sm font-bold">company info</h3>
                            <div class="flex w-[100%]">
                                <div class="w-[100%] mt-1">
                                    <label for="name" class="text-slate-500 text-sm">Name</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. ZINation" v-model="company">
                                </div>
                                <div class="w-[100%] mt-1">
                                    <label for="address" class="text-slate-500 text-sm">Address</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. PNC" v-model="address">
                                </div>
                            </div>

                            <div class="w-[100%] mt-1 relative">
                            <label for="file" class="text-slate-500 text-sm">Image</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="file" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" accept="images/*"  @change="onChangeimg">
                            <div class="text-xs absolute -mt-6 bg-white ellipsis-start ml-[100px]">{{image}}</div>
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
</section>
</template>

<script>
import axios from '../../../axios-http';
export default {
    props:{
        work:Object,
    },
    data(){
        return { 
            start_date: this.work.start_year,
            end_date: this.work.end_year,
            company: this.work.company.name,
            position: this.work.position,
            address: this.work.company.address,
            formid:this.work.id,
            companyid:this.work.company.id,
            image: this.work.company.image,
            allowExtension : ["jpg", "png", "jpeg", "gif", "webp","jfif", "svg"],
        }
    },
    methods: {
        onChangeimg(event) {
            let fileExtension = event.target.files[0].name.split(".").pop();
            if (this.allowExtension.includes(fileExtension.toLowerCase())) {
                this.image = event.target.files[0];
                console.log(this.image);
            }
        },
        editworkexperience(){
            let formdata = new FormData();
            formdata.append('_method','PUT');
            formdata.append('name',this.company);
            formdata.append('address',this.address);
            formdata.append('image',this.image);
            axios.post("http://127.0.0.1:8000/api/companies/"+this.companyid,formdata).then((response)=>{
                console.log('company data:',formdata)
            })
            let experiences = {
                startYear: this.start_date,
                endYear: this.end_date,
                position: this.position, 
            }
            console.log("work experiences",experiences);
            axios.put('http://127.0.0.1:8000/api/experiences/'+this.formid,experiences).then((result) => {
                return result.data;
            })
            this.$emit('closeForm',true)
        }
    }
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

