<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <div class="m-auto rounded-[5px]">
            <!-- // top  -->
            <div class="mt-4 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative">
                    <div class="w-[14%] relative ml-16 -mt-20">
                        <img class="rounded-full border-4 border-white ml-1" src="../../assets/cover-img.png" alt="cover-img">
                        <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-0 cursor-pointer shadow-lg bg-white right-0">                     
                            <camara-icon class="w-6 h-6 text-primary"/>
                        </label>
                        <input id="cover-img" hidden type="file" accept="image/*" />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/12 h-[100vh] absolute mt-20">
            <skill-content>

            </skill-content>
        </div>
        <!-- General Information  -->
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-14">
            <div class=" block -mt-2 text-neutral-700 font-poppins" >
                <div class="flex justify-between">
                    <h1 class="text-2xl font-extrabold">{{alumniData.firstName}} {{alumniData.lastName}}</h1>
                    <div @click="showFormEdit">
                        <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                            <edit-icon ></edit-icon>
                        </span>
                    </div>
                </div>
                <div class="flex mt-4">
                    <phone-icon ></phone-icon>
                    <h1 class="-mt-1 ml-2 text-xl font-semibold">{{alumniData.phone}}</h1>
                    <copy-icon class="ml-3 w-5 -mt-1 cursor-pointer"></copy-icon>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center mt-4">
                        <academic-icon></academic-icon>
                        <span class=" ml-2">{{batch.generation}}</span>
                        <background-widget>
                            <template #value>
                                <span class="text-center">{{major.name}}</span>
                            </template>
                        </background-widget>
                    </div>
                    <div class="flex items-center mt-4">
                        <img src="../../assets/gender.svg" alt="" class="w-4 ml-10">
                        <span class="ml-3">Gender</span>
                        <background-widget >
                            <template #value>
                                <span>{{alumniData.gender}}</span>
                            </template>
                        </background-widget>
                        <div @click="showDetailAlumniInfo" class="ml-10 text-sky-500 font-semibold underline cursor-pointer">
                            <span class="text-primary">Details</span>
                        </div>
                    </div>
                </div>
            </div>
            <card-widget class="mt-6">
                <template #header>
                    <header-card>
                        <template #icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                                <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                            </svg>
                        </template>
                        <template #title>
                            Work Experience
                        </template>
                        <template #action_icon>
                            <add-icon class="text-primary"/>
                        </template>
                    </header-card>
                </template>
                <template #body>
                    <div class="flex flex-wrap gap-2 py-4" v-if="workExperiences.length>0">
                        <base-card v-for="(work, index) in workExperiences" :key="index">
                            <template #logo>
                                <img :src="work.company.image" alt="" class="w-[100px]">
                                <!-- <img src="../../assets/workplacelogos/work_experience_defaul_logo.svg" alt=""> -->
                            </template>
                            <template #main_title>
                                {{work.position}}
                            </template>
                            <template #sub_title>
                                {{work.company.name}}
                            </template>
                            <template #lower_title>
                                {{work.start_year}} {{work.end_year}}
                            </template>
                            <template #footer>
                                <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer">
                                    <point-icon @click="openOpenCard(index)" ></point-icon>
                                    <div v-if="index==currentIndex" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                                        <div @click="showEdit" class="flex items-center hover:text-primary text-slate-400 text-sm">
                                            <edit-icon ></edit-icon>
                                            <span class="ml-1">Edit</span>
                                        </div>
                                        <div class="flex items-center hover:text-secondary text-slate-400 text-sm">
                                            <cancel-icon></cancel-icon>
                                            <span class="ml-1">Remove</span> 
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </base-card>
                    </div>
                </template>
            </card-widget>
            <card-widget class="mt-4">
                <template #header>
                    <header-card>
                        <template #icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                            </svg>
                        </template>
                        <template #title>
                            Education Backgound
                        </template>
                        <template #action_icon>
                            <add-icon class="text-primary"/>
                        </template>
                    </header-card>
                </template>
                <template #body>
                    <div class="flex flex-wrap gap-2 py-4">
                        <base-card>
                            <template #logo>
                                <img src="../../assets/schoollogos/pnc.svg" alt="" class="w-[15%] m-4">
                            </template>
                            <template #main_title>
                                PNC
                            </template>
                            <template #sub_title>
                                Association’s in Web Development
                            </template>
                            <template #lower_title>
                                2016 - 2018
                            </template>
                        </base-card>
                    </div>
                </template>
            </card-widget>
        </div>
    </section>


    <!-- form edit general information -->
    <div class="modal-mask" v-if="showModal==true">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" @click="showFormEdit" >
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
                        </svg>
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

    <!--    Detail Information Alumni profile -->
    <section  v-if="isFetch" v-cloak class="mr-40 mt-14">
        <div v-if="!alumniDetailInfo" class="font-poppins flex justify-end">
        <card-widget class="w-1/4 absolute" >
            <template #header>
                <div class="flex font-bold text-primary">
                    <info-icon></info-icon>
                    <h1 class="ml-3">General Information</h1>
                </div>
            </template>
            <template #body>
                <div class="flex mt-4">
                    <mail-icon class="w-6 h-6"></mail-icon>
                    <span class=" ml-3">{{alumniData.email}}</span>
                </div>
            </template>
                
            </card-widget>
        </div>
    </section>
    <!-- form edit work experience -->
    <section>
        <div class="modal-mask" v-if="showedit==true">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" @click="showEdit" >
                                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
                                </svg>
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
                                    <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem" v-model="startdate">
                                </div>
                                <div class="w-[50%] mt-2">
                                    <label for="enddate" class="text-slate-500 text-sm">End_date</label> <sup class="star text-blue-500">*</sup> 
                                    <br> 
                                    <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Loem" v-model="enddate">
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
                                        <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. ZINation" v-model="name">
                                    </div>
                                    <div class="w-[100%] mt-1">
                                        <label for="address" class="text-slate-500 text-sm">Address</label> <sup class="star text-blue-500">*</sup> 
                                        <br>
                                        <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. PNC" v-model="address">
                                    </div>
                                </div>

                                <div class="w-[100%] mt-1">
                                <label for="file" class="text-slate-500 text-sm">Image</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="file" class="text-sm w-[98.7%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" accept="images/*"  @change="onchangeimg">
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
    import axios from '../../axios-http';
import AcademicIcon from '../../components/widgets/IconWidgets/AcademicIcon.vue';
import EditIcon from '../../components/widgets/IconWidgets/EditIcon.vue';
import MailIcon from '../../components/widgets/IconWidgets/MailIcon.vue';
    export default {
  components: { AcademicIcon, EditIcon, MailIcon },
        data(){
            return {
                allowExtension : ["jpg", "png", "jpeg", "gif", "webp"],
                isOpenOptionCard: false,
                data: [],
                workExp: [],
                isFetch: false,           
                currentIndex: null,
                isOpen : false,
                showModal : false,
                showedit : false,
                userId :1,
                batchid :1,
                gender : "",
                firstname:"",
                lastname: "",
                generation : "",
                email:"",
                phone :"",
                name:"",
                address:"",
                image:"",
                startdate : "",
                enddate : "",
                position : "",
                alumniDetailInfo:false,
            }
        },
        methods:{
            openOpenCard(){
                this.isOpenOptionCard = !this.isOpenOptionCard;
            },
            async getAlumin(){
                await axios.get('alumni/2')
                .then(resp => {
                    this.data = resp.data;
                    this.isFetch = true;
                    console.log(resp.data)
                })
            },
            async getAluminWorkExp(){
                await axios.get('experiences/alumni/2')
                .then(resp => {
                    this.workExp = resp.data;
                    this.isFetch = true;
                    // console.log(resp.data)
                })
            },
            openOpenCard(index){
                if(!this.isOpen){
                        console.log(index);
                        this.currentIndex = index;
                        this.isOpen =true

                    }else{
                        this.currentIndex =null
                        this.isOpen=false
                    }
            },
            showDetailAlumniInfo(){
                this.alumniDetailInfo =! this.alumniDetailInfo
            },
            showFormEdit(){
                this.showModal = !this.showModal
            },
            showEdit(){
                this.showedit = !this.showedit
            },
            editinfo(){
                axios.put('http://127.0.0.1:8000/api/users/'+this.userId,{
                    firstName:this.firstname,
                    lastName:this.lastname,
                    email:this.email,
                    password:"pupd",
                    gender:this.gender,
                    phone:this.phone
                })
                axios.put('http://127.0.0.1:8000/api/batches/'+this.batchid,{
                    generation:this.generation
                }).then((response) =>{

                    this.getAlumin();
                })
                this.showModal = !this.showModal;
            },
            
    
    onchangeimg(event) {
        let fileExtension = event.target.files[0].name.split(".").pop();
        if (this.allowExtension.includes(fileExtension.toLowerCase())) {
            this.image = event.target.files[0];
            console.log(this.image);
        }
    },
    editworkexperience(){
        let Fd = new FormData();
        Fd.append('_method','PUT');
        Fd.append('name',this.name);
        Fd.append('address',this.address);
        Fd.append('image',this.image);
        console.log(this.Fd);
        axios.post("http://127.0.0.1:8000/api/companies/2",Fd).then((response)=>{
            console.log(response.data)
        })

        axios.put('http://127.0.0.1:8000/api/experiences/5',{
            startYear:this.startdate,
            endYear:this.enddate,
            position:this.position
        }).then((result) => {
            console.log(result.data);
            this.getAluminWorkExp();
        })
        this.showedit = !this.showedit;
    }


        },
        computed: {
            alumniData(){
                return this.data.user
            },
            batch(){
                return this.data.batch
            },
            major(){
                return this.data.major
            },
            workExperiences(){
                return this.workExp;
            }
        },
        mounted() {
            this.getAlumin();
            this.getAluminWorkExp();
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
</style>
    
    
