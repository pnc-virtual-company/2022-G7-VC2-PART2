<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <profile-cover-img />
        <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
            <skill-content />
        </div>
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
            <general-info :alumniData="alumniData" :batch="batch" :major="major" />
            <education-background>
                <template #card>
                    <school-card/>
                </template>
            </education-background>
            <work-experiences>
                <template #card>
                    <company-card v-for="(work, index) in workExperiences" :key="index" :work="work" />
                </template>
            </work-experiences>
        </div>

        <edit-work-form :work="workToEdit" v-if="showedit" @closeForm = closeForm>
            <template #hidden-form>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" class="w-6 h-6 hover:bg-gray-200 rounded-full cursor-pointer" @click="showedit = !showedit" >
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
                </svg>
            </template>
        </edit-work-form>
    </section>
</template>

<script>
    import axios from '../../axios-http';
    import FormEditWorkExperViewVue from '../../components/profile/alumni/FormEditWorkExper.vue';
    import WorkExperienceCard from '../alumni/components/WorkExperienceCard.vue'
    import CompanyCard from '../alumni/components/CompanyCard.vue'
    import EducationBackgroundCard from '../alumni/components/EducationBackgroundCard.vue'
    import SchoolCard from '../alumni/components/SchoolCard.vue'
    import GeneralInfoVue from '../../components/profile/alumni/GeneralInfo.vue';
    import CoverAndProfileImgVue from '../../components/profile/alumni/CoverAndProfileImg.vue';
    export default {
        components: { 
             'work-experiences': WorkExperienceCard,
             'company-card': CompanyCard,
             'education-background': EducationBackgroundCard,
             'school-card': SchoolCard,
             'general-info': GeneralInfoVue,
             'profile-cover-img': CoverAndProfileImgVue
        },  
        data(){
            return {
                data: [],
                workExp: [],
                isFetch: false,   
                user_id: this.$store.state.user_id,
                alumni_id: null        
            }
        },
        methods:{
            async getAlumin(){
                await axios.get('/alumni/user/'+this.user_id)
                .then(resp=>{
                    console.log(resp.data[0].id);
                    this.data = resp.data[0]
                    this.alumni_id = resp.data[0].id
                    this.isFetch = true;
                    this.getAluminWorkExp();
                })
            },
            async getAluminWorkExp(){
                await axios.get('/experiences/alumni/'+this.alumni_id)
                .then(resp => {
                    this.workExp = resp.data;
                    this.isFetch = true;
                })
            },
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

        },
        mounted() {
            this.getAlumin();
        },
    }
</script>


