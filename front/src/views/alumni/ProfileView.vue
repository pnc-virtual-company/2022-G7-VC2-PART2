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
        closeFormschoolBg(){
            this.showSchoolEdit = !this.showSchoolEdit;
            this.getSchoolBg();
            console.log('hh')
        },
        addSchool(){
            this.getSchoolBg();
        },
         //  get skill with specific alumni
            async getSkillInfor(){
                await axios.get('/skills/alumni/4')
                .then(res =>{
                    this.skills = res.data;
                    // console.log(this.skills);
                })
            },
    },
    mounted(){
        this.getAlumin();
        this.getAluminWorkExp();
        this.getSchoolBg();
        this.getSkillInfor();
    },
}
</script>


