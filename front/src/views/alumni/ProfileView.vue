<template>
  <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
    <profile-cover-img />
    <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
      <skill-content :listSkill="skills" />
    </div>
    <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
      <general-info :alumniData="alumniData" :batch="batch" :major="major" />
      <!--========= education background======================================== -->
      <education-background @add-school="addSchool" :schools="schoolBgData">
      </education-background>

      <!--==== form eidt schoool =================================================================-->
      <work-experiences>
        <template #card>
          <company-card
            v-for="(work, index) in workExperiences"
            :key="index"
            :work="work"
          />
        </template>
      </work-experiences>
    </div>
  </section>
</template>
<script>
import axios from "../../axios-http";
import FormEditWorkExperViewVue from "../../components/profile/alumni/FormEditWorkExper.vue";
import WorkExperienceCard from "../alumni/components/WorkExperienceCard.vue";
import CompanyCard from "../alumni/components/CompanyCard.vue";
import EducationBackgroundCard from "../alumni/components/EducationBackgroundCard.vue";
import SchoolCard from "../alumni/components/SchoolCard.vue";
import GeneralInfoVue from "../../components/profile/alumni/GeneralInfo.vue";
import CoverAndProfileImgVue from "../../components/profile/alumni/CoverAndProfileImg.vue";
import FormEditSchoolBg from "../../components/profile/alumni/FromEditSchoolBg.vue";
export default {
  props: ["listSkill"],
  components: {
    "work-experiences": WorkExperienceCard,
    "company-card": CompanyCard,
    "education-background": EducationBackgroundCard,
    "school-card": SchoolCard,
    "general-info": GeneralInfoVue,
    "profile-cover-img": CoverAndProfileImgVue,
    "edit-school-form": FormEditSchoolBg,
  },
  data() {
    return {
      data: [],
      workExp: [],
      schoolBgData: [],
      isFetch: false,
      skills: [],
      isLimited:false
    };
  },
  computed: {
       schoolEdit() {
      return this.schools.filter((school) => school.id == this.schoolId);
    },

    schoolFilter() {
      let limit = 2;
      let schoolData = [];
      if (this.isLimited) {
        schoolData = this.schoolBgData;
      } else {
        for (let i = 0; i < this.schoolBgData.length; i++) {
          if (limit > 0) {
            limit -= 1;
            schoolData.push(this.schoolBgData[i]);
          }
        }
      }
      return schoolData;
    },
    alumniData() {
      return this.data.user;
    },
    batch() {
      return this.data.batch;
    },
    major() {
      return this.data.major;
    },
    workExperiences() {
      return this.workExp;
    },
  },
  methods: {
    async getAlumin() {
      await axios.get("alumni/2").then((resp) => {
        this.data = resp.data;
        this.isFetch = true;
      });
    },
    async getAluminWorkExp() {
      await axios.get("experiences/alumni/2").then((resp) => {
        this.workExp = resp.data;
        this.isFetch = true;
      });
    },
    async getSchoolBg() {
      await axios.get("school").then((resp) => {
        this.schoolBgData = resp.data;
      });
    },
    closeFormschoolBg() {
      this.showSchoolEdit = !this.showSchoolEdit;
      this.getSchoolBg();
      console.log("hh");
    },
    addSchool() {
      this.getSchoolBg();
    },
    //  get skill with specific alumni
    async getSkillInfor() {
      await axios.get("/skills/alumni/2").then((res) => {
        this.skills = res.data;
        console.log(this.skills);
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