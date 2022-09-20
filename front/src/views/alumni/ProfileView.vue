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
        <template #card>
          <school-card
            v-for="(school, index) in schoolBgData"
            :key="index"
            :school="school"
          />
        </template>
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
  import FormEditSchoolBg from '../../components/profile/alumni/FromEditSchoolBg.vue'
export default {
  props: ["listSkill"],
  components: {
    "work-experiences": WorkExperienceCard,
    "company-card": CompanyCard,
    "education-background": EducationBackgroundCard,
    "school-card": SchoolCard,
    "general-info": GeneralInfoVue,
    "profile-cover-img": CoverAndProfileImgVue,
       'edit-school-form': FormEditSchoolBg
  },
  data() {
    return {
      data: [],
      workExp: [],
      schoolBgData: [],
      isFetch: false,
      skills: [],

    };
  },
  computed: {   
 
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


