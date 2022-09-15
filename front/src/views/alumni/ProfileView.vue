<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <div class="m-auto rounded-[5px]">
            <div class="mt-4 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative" >
                    <div class="w-[14%] relative ml-16 -mt-20">
                        <img class="rounded-full border-4 border-white ml-1" src="../../assets/cover-img.png" alt="cover-img">
                        <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-0 cursor-pointer shadow-lg bg-white right-0">                     
                            <camara-icon class="w-6 h-6 text-primary"/>
                        </label>
                        <input id="cover-img" hidden type="file" accept="image/*" />
                    </div>
                    <div class="mt-[8%] block text-center absolute ml-[6%]">
                        <h1 class="text-2xl font-extrabold">{{alumniData.firstName}} {{alumniData.lastName}}</h1>
                        <span class="text-base" v-if="workExperiences.length>0">{{workExperiences[0].position}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/12 h-[100vh] absolute mt-20">
            <skill-content>

            </skill-content>
        </div>
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-14">
            <div class=" block -mt-2 text-neutral-700 font-poppins" >
                <div class="flex justify-between">
                    <h1 class="text-2xl font-extrabold">{{alumniData.firstName}} {{alumniData.lastName}}</h1>
                    <div >
                        <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                            <edit-icon @click="showEditExperience = !showEditExperience"></edit-icon>
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
                        <div @click="alumniDetailInfo = !alumniDetailInfo" class="ml-10 text-sky-500 font-semibold underline cursor-pointer">
                            <span class="text-primary">Details</span>
                        </div>
                    </div>
                </div>
            </div>
            <card-widget class="mt-6">
                <template #header>
                    <header-card>
                        <template #icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary" >
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
                            </template>
                            <template #main_title>
                                {{work.company.name}}
                            </template>
                            <template #sub_title>
                                {{work.position}}
                            </template>
                            <template #lower_title>
                                {{work.start_year}} {{work.end_year}}
                            </template>
                            <template #footer>
                                <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer">
                                    <point-icon @click="openOpenCard(index)" ></point-icon>
                                    <div v-if="index==currentIndex" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                                        <div @click="showEditForm(work.id)" class="flex items-center hover:text-primary text-slate-400 text-sm">
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
    <editExperience v-if="showEditExperience" :userData="data.user" @closeDiloag="closeDiloag" :batch="data.batch">
        <template #hidenCard>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" @click="showEditExperience = !showEditExperience" >
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
            </svg>
        </template>
    </editExperience>

    <edit-work-form :work="workToEdit" v-if="showedit" @closeForm = closeForm>
        <template #hidden-form>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" class="w-6 h-6 hover:bg-gray-200 rounded-full cursor-pointer" @click="showedit = !showedit" >
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
            </svg>
        </template>
    </edit-work-form>
    
    <!-- form edit general information -->
</template>

<script>
    import FormEditWorkExperViewVue from '../../components/profile/alumni/FormEditWorkExper.vue';
    import axios from '../../axios-http';
    import editExperience from '../../components/profile/alumni/formEditExperience.vue'
    import AcademicIcon from '../../components/widgets/IconWidgets/AcademicIcon.vue';
    import EditIcon from '../../components/widgets/IconWidgets/EditIcon.vue';
    import MailIcon from '../../components/widgets/IconWidgets/MailIcon.vue';
    export default {
    components: { AcademicIcon, EditIcon, MailIcon,editExperience , 'edit-work-form': FormEditWorkExperViewVue},  
        data(){
            return {
                isOpenOptionCard: false,
                data: [],
                workExp: [],
                isFetch: false,           
                currentIndex: null,
                isOpen : false,
                showModal : true,
                showEditExperience :false,
                alumniDetailInfo:false,
                showModal : false,
                showedit: false,
                currentWorkIndex: null
            }
        },
        methods:{
            openOpenCard(){
                this.isOpenOptionCard = !this.isOpenOptionCard;
            },
            async getAlumin(){
                await axios.get('alumni/3')
                .then(resp => {
                    this.data = resp.data;
                    this.isFetch = true;
                    console.log('return data',this.data.user);   
                })
            },
            async getAluminWorkExp(){
                await axios.get('experiences/alumni/3')
                .then(resp => {
                    this.workExp = resp.data;
                    this.isFetch = true;

                })
            },
            openOpenCard(index){
                if(!this.isOpen){
                        this.currentIndex = index;
                        this.isOpen =true
                    }else{
                        this.currentIndex =null
                        this.isOpen=false
                    }
                console.log(index);
            },
            closeDiloag(value){
                this.showEditExperience = value

            },
            showDetailAlumniInfo(){
                this.alumniDetailInfo =! this.alumniDetailInfo
            },
            onchangeimg(event) {
                let fileExtension = event.target.files[0].name.split(".").pop();
                if (this.allowExtension.includes(fileExtension.toLowerCase())) {
                    this.image = event.target.files[0];
                    console.log(this.image);
                }
            },
            showDetailAlumniInfo(){
                this.alumniDetailInfo =! this.alumniDetailInfo
            },
            showFormEdit(){
                this.showModal = !this.showModal
            },
            showEditForm(index){
                this.currentWorkIndex = index;
                this.showedit = !this.showedit;
                // console.log(index);
            },
            closeForm(value){
                this.showedit = value;
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
                return this.workExp
            },
            workToEdit(){
                return this.workExp.filter((work) => work.id == this.currentWorkIndex)[0]
            }
        },
        mounted() {
            this.getAlumin();
            this.getAluminWorkExp();
        }
    }
</script>


