<template>
  <section class="w-10/12 m-auto overflow-auto" v-if="isFetch" v-cloak>
    <profile-cover-img :images="user" />
    <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
      <skill-content :listSkill="skills" @getSkill="getSkillInfor"/>
    </div>
    <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
      <general-info :alumniData="user" :batch="batch" :major="major" />
      <!-- ========= education background======================================== -->
      <education-background @add-school="addSchool" @getSchoolBg="getSchoolBg" :schools="schoolBgData">
      </education-background>

      <!--==== form eidt schoool =================================================================-->
      <work-experiences :experiences="workExp" @getWork="getAluminWorkExp">
      </work-experiences>
    </div>
  </section>
</template>
<script>
import axios from '../../axios-http';
import WorkExperienceCard from '../alumni/components/WorkExperienceCard.vue'
import EducationBackgroundCard from '../alumni/components/EducationBackgroundCard.vue'
import GeneralInfoVue from "../../components/profile/alumni/GeneralInfo.vue";
import CoverAndProfileImgVue from "../../components/profile/alumni/CoverAndProfileImg.vue";
export default {
  props: ["listSkill"],
  components: {
    "work-experiences": WorkExperienceCard,
    "education-background": EducationBackgroundCard,
    "general-info": GeneralInfoVue,
    "profile-cover-img": CoverAndProfileImgVue,
  },
  data() {
    return {
      user: [],
      batch: [],
      major: [],
      workExp: [],
      schoolBgData: [],
      isFetch: false,
      skills: [],
      isLimited:false,
      user_id: this.$store.state.user_id
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
  },
  methods: {
    async getAlumin() {
      await axios.get("alumni/"+this.user_id).then((resp) => {
        this.user = resp.data.user;
        this.batch = resp.data.batch;
        this.major = resp.data.major;
        this.isFetch = true;
        console.log(resp.data);
      });
    },
    async getUser() {
      await axios.get('/account/getData').then(response=>{
        this.user = response.data.data;
        this.isFetch = true;
        console.log(response.data.data);
      })
    },
    async getAluminWorkExp() {
      await axios.get("experiences/alumni/" + this.user_id).then((resp) => {
        this.workExp = resp.data;
        this.isFetch = true;
      });
    },
    async getSchoolBg() {
      await axios.get('school/alumni/' + this.user_id).then((resp) => {
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
      await axios.get("/skills/alumni/" + this.user_id).then((res) => {
        this.skills = res.data;
        console.log(this.skills);
      });
    },
  },

  mounted() {
    this.getAlumin();
    this.getAluminWorkExp();
    this.getSchoolBg();
    console.log(this.$route.params.user_id)
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