<template>
    <card-widget class="mt-6" @action="isLimited=!isLimited">
      <template #header>
        <header-card>
          <template #icon>
          <academic-icon></academic-icon>
          </template>
          <template #title> Education Backgound </template>
          <template #action_icon>
            <add-icon class="text-primary" @click="openAddedu" />
          </template>
        </header-card>
      </template>
      <template #body>
        <div class="flex flex-wrap gap-2 py-4">
           <school-card
            v-for="(school, index) in schoolFilter.slice().reverse()"
            :key="index"
            :school="school"
          />
        </div>
      </template>
    </card-widget>

    <!-- add education background form -->
    <add-educ @add-school="addSc" v-if="hiddeaddedu" />

 

</template>
<script>
import AcademicIcon from '../../../components/widgets/IconWidgets/AcademicIcon.vue';
import SchoolCard from '../components/SchoolCard.vue'    ;
import AddeducationbackgroundForm from "./AddedubgForm.vue";
export default {
  components: {
    "add-educ": AddeducationbackgroundForm,
     'school-card': SchoolCard,
    AcademicIcon,
  },
  props:['schools'],
  data() {
    return {
      hiddeaddedu: false,
      isLimited:false,
      isShow:false,
      schoolId:null
  
    };
  },
  computed:{
    schoolFilter() {
      let limit = 2;
      let schoolData = [];
      if (this.isLimited) {
        schoolData = this.schools;
      } else {
        for (let i = 0; i < this.schools.length; i++) {
          if (limit > 0) {
            limit -= 1;
            schoolData.push(this.schools[i]);
          }
        }
      }
      return schoolData;
    },
  },
  methods: {
    addSc() {
      this.hiddeaddedu = !this.hiddeaddedu;
    },
    openAddedu() {
      this.hiddeaddedu = !this.hiddeaddedu;
    },

  },
  
};
</script>