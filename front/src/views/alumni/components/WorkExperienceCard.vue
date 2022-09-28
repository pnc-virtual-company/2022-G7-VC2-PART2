<template>
    <div class="w-[100%] flex flex-wrap">
        <card-widget class="mt-4" @action="isLimited = !isLimited">
          <template #header>
            <header-card>
              <template #icon>
                <academic-icon></academic-icon>
              </template>
              <template #title> Work Experience </template>
              <template #action_icon>
                <add-icon class="text-primary" @click="isShowForm = !isShowForm" />
              </template>
            </header-card>
          </template>
          <template #body>
            <div class="flex flex-wrap gap-2 py-4">
              <company-card
                v-for="(work, index) in experiencesFilter"
                :key="index"
                :work="work"
                @refresh-data="load"
              
              />
            </div>
          </template>
        </card-widget>

    </div>
  <add-work-form v-if="isShowForm"  @refresh-data="formAction">
    <template #hidden-form>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        @click="isShowForm = !isShowForm"
        fill="none"
        viewBox="0 0 24 24"
        stroke-Width="{1.5}"
        stroke="currentColor"
        class="w-6 h-6 hover:bg-gray-200 rounded-full cursor-pointer"
      >
        <path
          strokeLinecap="round"
          strokeLinejoin="round"
          d="M6 18L18 6M6 6l12 12"
          class="text-end font-bold"
        />
      </svg>
    </template>
  </add-work-form>
</template>
<script>
import Swal from "sweetalert2";
import axios from '../../../axios-http';
import AddWorkExperienceVue from "../../../components/profile/alumni/AddWorkExperience.vue";
import CompanyCard from "./CompanyCard.vue";
export default {
  components: {
    "add-work-form": AddWorkExperienceVue,
    "company-card": CompanyCard,
  },
  data() {
    return {
      isShowForm: false,
      isLimited: false,
      workExp: [],
    };
  },
  computed: {
    experiencesFilter() {
      let limit = 2;
      let workExperiences = [];
      if (this.isLimited) {
        workExperiences = this.workExp;
      } else {
        for (let i = 0; i < this.workExp.length; i++) {
          if (limit > 0) {
            limit -= 1;
            workExperiences.push(this.workExp[i]);
          }
        }
      }
      return workExperiences;
    },
  },
  methods: {
       async getAluminWorkExp() {
      await axios.get("experiences/alumni/1").then((resp) => {
        this.workExp = resp.data;
      })
    },
    formAction(){
      this.isShowForm =!this.isShowForm;
      this.getAluminWorkExp();
    },
    load() {
      this.getAluminWorkExp();
    }
  },
  mounted() {
    this.getAluminWorkExp();
  }
};
</script>
<style>
</style>