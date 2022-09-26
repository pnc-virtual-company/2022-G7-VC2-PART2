<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <profile-cover-img />
        <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
            <skill-content :listSkill="skills"  @getSkill="getSkillInfor"/>
        </div>
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
            <general-info :alumniData="alumniData"/>
            <education-background @add-school="addSchool" :schools="schoolBgData">
                <template #card>
                    <school-card v-for="(school, index) in schoolBgData" :key="index" :school="school"/>
                </template>
            </education-background>
            <work-experiences :experiences="workExp">
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
import axios from '../../axios-http'
import WorkExperienceCard from '../alumni/components/WorkExperienceCard.vue'
import CompanyCard from '../alumni/components/CompanyCard.vue'
import EducationBackgroundCard from '../alumni/components/EducationBackgroundCard.vue'
import SchoolCard from '../alumni/components/SchoolCard.vue'
import GeneralInfoVue from '../../components/profile/alumni/GeneralInfo.vue';
import CoverAndProfileImgVue from '../../components/profile/alumni/CoverAndProfileImg.vue';
export default {
    props:['listSkill'],
    components: { 
        'work-experiences': WorkExperienceCard,
        'company-card': CompanyCard,
        'education-background': EducationBackgroundCard,
        'school-card': SchoolCard,
        'general-info': GeneralInfoVue,
        'profile-cover-img': CoverAndProfileImgVue,     
    },  
    data(){
        return {
            alumniData: [],
            workExp: [],
            schoolBgData:[],
            isFetch: false,      
            skills:[],  
             user_id: this.$store.state.user_id,
                alumni_id: null        
        }
    },
    methods:{
        async getAlumin(){
            await axios.get('alumni/4')
            .then(resp => {
                this.alumniData = resp.data;
                this.isFetch = true;
            })
        },
        async getAluminWorkExp(){
            await axios.get('experiences/alumni/4')
            .then(resp => {
                this.workExp = resp.data;
                this.isFetch = true;
            })
        },
        async getSchoolBg(){
            await axios.get('school/alumni/4').then(resp => {
                this.schoolBgData = resp.data;
            })
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
            this.getAluminWorkExp();
        },
    }
</script>


