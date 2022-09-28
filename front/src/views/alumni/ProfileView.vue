<template>
    <section class="w-10/12 m-auto" v-if="isFetch" v-cloak>
        <profile-cover-img />
        <div class="w-3/12 h-[100vh] absolute mt-20 px-5">
            <skill-content :listSkill="skills"  @getSkill="getSkillInfor"/>
        </div>
        <div class="w-7/12 mr-[8.4%] absolute right-0 -mt-10">
            <general-info :alumniData="alumniData"/>
            <education-background>
            </education-background>
            <work-experiences>
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
 

  methods: {
    async getAlumin() {
      await axios.get("alumni/"+this.user_id).then((resp) => {
        this.user = resp.data.user;
        this.batch = resp.data.batch;
        this.major = resp.data.major;
        this.isFetch = true;
        console.log(resp.data);
      }).catch(err => {console.log(err);})
    },
    //  get skill with specific alumni
    async getSkillInfor() {
      await axios.get("/skills/alumni/" + this.user_id).then((res) => {
        this.skills = res.data;
        console.log(this.skills);
      });
    },
        closeFormschoolBg() {
          this.showSchoolEdit = !this.showSchoolEdit;
          this.getSchoolBg();
        },
  },

  mounted() {
    this.getAlumin();
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