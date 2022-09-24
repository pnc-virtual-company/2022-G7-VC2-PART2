<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <profile-cover-img />
        <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
            <skill-content :listSkill="skills"  @getSkill="getSkillInfor"/>
        </div>
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
            <general-info :alumniData="alumniData"/>
            <education-background @add-school="addSchool" :schools="schoolBgData">
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

  methods: {
     removeSchool(schoolid){ 
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete Education background can not be undo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('school/'+schoolid);
                    this.getSchoolBg();
                    Swal.fire({
                        title:'School deleted!'
                    })
                    this.getSchoolBg();
                }
            })
        },
    async getAlumin() {
      await axios.get("alumni/4").then((resp) => {
        this.alumniData = resp.data;
        this.isFetch = true;
      });
    },
    async getAluminWorkExp() {
      await axios.get("experiences/alumni/4").then((resp) => {
        this.workExp = resp.data;
        this.isFetch = true;
      })
    },
    async getSchoolBg() {
      await axios.get("school/alumni/4").then((resp) => {
        this.schoolBgData = resp.data;
      });
    },
    closeFormschoolBg() {
      this.showSchoolEdit = !this.showSchoolEdit;
      this.getSchoolBg();
    },
    addSchool() {
      this.getSchoolBg();
    },
    //  get skill with specific alumni
    async getSkillInfor() {
      await axios.get("/skills/alumni/4").then((res) => {
        this.skills = res.data;
      });
    },
  },

  mounted() {
    this.getAlumin();
    this.getAluminWorkExp();
    this.getSchoolBg();
    this.getSkillInfor();
  },
};
</script>


<style>
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