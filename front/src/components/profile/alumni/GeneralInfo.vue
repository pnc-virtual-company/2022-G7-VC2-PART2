<template>
    <div class="block -mt-8 relative text-neutral-700 font-poppins" ref="table">
        <div class="flex justify-between">
            <h1 class="text-2xl font-extrabold">{{alumniData.first_name}} {{alumniData.last_name}}</h1>
            <!-- <div >
                <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                    <edit-icon @click="showForm = !showForm"></edit-icon>
                </span>
            </div> -->
        </div>
        <div class="flex mt-4">
            <phone-icon ></phone-icon>
            <h1 class="-mt-1 ml-2 text-xl font-bold">{{alumniData.phone}}</h1>
            <div class="tooltip1">
                <copy-icon class="ml-3 w-5 -mt-1 cursor-pointer" @click="copy"></copy-icon>
                <span class="tooltiptext">
                    copy
                </span>
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex items-center mt-4">
                <academic-icon></academic-icon>
                <span class=" ml-2">{{batch.generation}}</span>
                <background-widget>
                    <template #value>
                        <span class="text-center">{{major.name}}</span>
                    </template>
                </background-widget>
            </div>
            <div class="flex items-center mt-4">
                <img src="../../../assets/gender.svg" alt="" class="w-4 ml-10">
                <span class="ml-3">Gender</span>
                <background-widget >
                    <template #value>
                        <span>{{alumniData.gender}}</span>
                    </template>
                </background-widget>
                <!-- <div @click="alumniDetailInfo = !alumniDetailInfo"  class="ml-10 text-sky-500 underline cursor-pointer">
                    <span class="text-primary">Details</span>
                </div> -->
                <detail-info :alumniData="alumniData" v-if="alumniDetailInfo"/>
            </div>
        </div>
        <generalInfo-edit-form v-if="showForm" :userData="alumniData" @closeDiloag="showForm=false" :batch="batch">
            <template #hidden-form>
                <cancel-icon @click="showForm = !showForm"/>
            </template>
        </generalInfo-edit-form>  
    </div>
</template>
<script>
import CancelIcon from '../../widgets/IconWidgets/CancelIcon.vue';
import DetailAlumniInfo from './DetailAlumniInfo.vue';
import FormEditGeneralInfoVue from './FormEditGeneralInfo.vue';
import Swal from 'sweetalert2'
export default {
    props: ['alumniData', 'batch', 'major'],
    components: {
        'detail-info': DetailAlumniInfo,
        'generalInfo-edit-form': FormEditGeneralInfoVue,
        CancelIcon,
    },
    data(){
        return {
        alumniDetailInfo: false,
        showForm: false,
        phoneNumber:this.alumniData.phone,
        }
    },
    methods: {
        copy(){
            try{
                navigator.clipboard.writeText(this.phoneNumber)
            }catch(copy){
                throw copy
            }
            let timerInterval
Swal.fire({
  title: 'phone number has been copied',
  html: 'please wait <b></b> a minute.',
  timer: 500,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
        }
    }
}
</script>

<style >
    .tooltip1 {
    position: relative;
    display: flex;
    cursor: pointer;
    }
    
    .tooltip1 .tooltiptext {
      visibility: hidden;
      width: 30px;
      color:black;
      text-align: center;
      border-radius: 2.5px;
      padding: 1px 0;
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
     
      /* margin-left: -40px; */
    }
    
    .tooltip1:hover .tooltiptext {
      visibility: visible;
      color: black;
      /* background: rgb(217, 202, 202); */
    }
</style>