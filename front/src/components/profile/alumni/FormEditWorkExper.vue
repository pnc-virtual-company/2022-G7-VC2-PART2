<template>
    <!-- form edit work experience  -->
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
                <form @submit.prevent="editworkexperience">  
                      <div class="card_form text-start w-[50%] m-auto p-5">
                          <div class="bg-white p-5 rounded-md">
                          <div class="flex justify-between items-start text-sky-500/80 font-bold">
                          <div class="flex ">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-[6%]" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                              </svg>
                              <h2 class="ml-2 text-lg">Edit Work Experience Information</h2> 
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
                                <label for="name" class="text-slate-500 text-sm">Name</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. ZINation" v-model="company">
                                    <small style="color :red" v-show="company.length <= 0 && submit">Please fill your company!</small>
                              </div>
                              <div class="w-[100%] mt-1">
                                    <label for="position" class="text-slate-500 text-sm">Position</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="text" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. web developer" v-model="position">
                                    <small style="color:red" v-show="position.length <= 0 && submit">Please fill your position!</small>
                              </div>
                          </div>
                              <div class="w-[100%] mt-2">
                                    <br>
                                    <input type="checkbox" id="current" class="cursor-pointer mt-2" v-model="current">
                                    <label for="current" class="ml-3">currently is working at this role!</label>
                              </div>
                              <div class="flex w-[100%]" v-if="current==false">
                            <div class="w-[50%] mt-2">
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Start day"  v-model="start_year">
                                <small style="color :red" v-show="start_year == 0 && submit"> Please fill your start date!</small>
                            </div>
                            <div class="w-[50%] mt-2">
                                <label for="enddate" class="text-slate-500 text-sm">End_date</label> <sup class="star text-blue-500">*</sup> 
                                <br> 
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. End date" :min="start_year" v-model="end_year">
                                <small style="color :red" v-show="end_year == 0 && submit" > Please fill your end date!</small>
                            </div>
                        </div>
                        <div class="flex w-[100%]" v-else>
                            <div class="w-[100%] mt-2">
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem"  v-model="start_year">
                                <small style="color :red" v-show="start_date == 0 && submit"> Please fill your start date!</small>
                            </div>
                        </div>
                              <div class="w-[100%] mt-1 relative">
                                    <label for="file" class="text-slate-500 text-sm">Image</label> <sup class="star text-blue-500">*</sup> 
                                    <br>
                                    <input type="file" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" accept="images/*"  @change="onChangeImg">
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
</template>

<script>
import axios from '../../../axios-http';
export default {
    emits:['getWork'],
    props:{
        work:Object,
    },
    data(){
        return { 
            start_year:"",
            end_year:"",
            start_year: this.work.start_year,
            end_year: this.work.end_year,
            company: this.work.company.name,
            position: this.work.position,
            formid:this.work.id,
            companyid:this.work.company.id,
            image: this.work.company.image,
            current:this.work.current,
            submit : false,
            allowExtension : ["jpg", "png", "jpeg", "gif", "webp","jfif", "svg"],
        }
    },
    methods: {
        onChangeImg(event) {
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
            formdata.append('image',this.image);
            console.log(formdata);
            axios.post("/companies/"+this.companyid,formdata)
            let experiences = {
                startYear: this.start_year,
                endYear: this.end_year,
                position: this.position, 
                current:this.current,                
            }
          
            this.submit = true;
            if (this.company != 0 && this.position != 0 && this.start_year != 0 && this.end_year != 0){
            axios.put('/experiences/'+this.formid,experiences).then((result) => {
                this.$emit('getWork');
                return result.data;
            })
            }
        },
    }
}
</script>



