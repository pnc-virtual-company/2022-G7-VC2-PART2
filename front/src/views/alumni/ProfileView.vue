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
            }
        },
        methods:{
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


