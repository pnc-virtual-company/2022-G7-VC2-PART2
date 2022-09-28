<template>
    <card-widget class="mt-4" v-if="schoolData.length <= 0">
        <template #body>
            <div @click="isShowForm=!isShowForm" class="border-dashed flex justify-center h-[20vh] items-center border-2 rounded-[2.5px] border-primary hover:bg-blue-100 cursor-pointer">
                <div class="text-center flex flex-col py-3">
                    <div class="">
                      <img src="../../../assets/default_img/education_bg.png" alt="" class="m-auto w-[60px]">
                    </div>
                    <h1 class="font-bold">Add education background here</h1>
                </div>
            </div>
        </template>
      </card-widget>
    <card-widget  v-else :isHideShow="true" class="mt-6" @action="isLimited=!isLimited">
      <template #header>
        <header-card>
          <template #icon>
          <academic-icon></academic-icon>
          </template>
          <template #title> Education Backgound </template>
          <template #action_icon>
            <add-icon class="text-primary" @click="isShowForm=!isShowForm" />
          </template>
        </header-card>
      </template>
      <template #body>
        <div class="flex flex-wrap gap-2 py-4">
           <school-card
            v-for="(school, index) in schoolFilter"
            :key="index"
            @removeSchool="removeSchool"
            @reload-data="reload"
            :school="school"
          />
        </div>
      </template>
    </card-widget>

    <!-- add education background form -->
    <add-educ  v-if="isShowForm" @close-form="formAction" />

 

</template>
<script>
import Swal from "sweetalert2";
import axios from '../../../axios-http';
import SchoolCard from '../components/SchoolCard.vue'    ;
import AddeducationbackgroundForm from "../../../components/profile/alumni/AddedubgForm.vue";
export default {
  components: {
    "add-educ": AddeducationbackgroundForm,
     'school-card': SchoolCard,
  },
  props:["alumniId"],
  data() {
    return {
      isLimited:false,
      isShowForm:false,
      schoolData:[]
  
    };
  },
  computed:{
    schoolFilter() {
      let limit = 2;
      let schoolData = [];
      if (this.isLimited) {
        schoolData = this.schoolData;
      } else {
        for (let i = 0; i < this.schoolData.length; i++) {
          if (limit > 0) {
            limit -= 1;
            schoolData.push(this.schoolData[i]);
          }
        }
      }
      return schoolData;
    },
  },
  methods: {
      async getSchoolBg() {
      await axios.get("school/alumni/"+this.alumniId).then((resp) => {
        this.schoolData = resp.data;
      });
    },
       removeSchool(schoolId){ 
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete Education background can not be undo!",
            icon: 'warning',
            showCancelButton: true,
            width: 400,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('school/'+schoolId).then((resp) => {
                      this.reload();

                    }),
                    Swal.fire({
                        title:'School deleted!'
                    })
                }
            })
        },
        formAction(){
          this.isShowForm=!this.isShowForm;
          this.reload();
        },
        reload(){
          this.getSchoolBg();
        }
  },
  mounted() {
    this.getSchoolBg();
  }
  
};
</script>