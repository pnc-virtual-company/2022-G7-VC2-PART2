<template>
    <div class="block -mt-4 text-neutral-700 font-poppins" ref="table">
        <div class="flex justify-between">
            <h1 class="text-2xl font-extrabold">{{alumniData.firstName}} {{alumniData.lastName}}</h1>
            <div >
                <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                    <edit-icon @click="showForm = !showForm"></edit-icon>
                </span>
            </div>
        </div>
        <div class="flex mt-4">
            <phone-icon ></phone-icon>
            <h1 class="-mt-1 ml-2 text-xl font-bold">{{alumniData.phone}}</h1>
            <copy-icon class="ml-3 w-5 -mt-1 cursor-pointer"></copy-icon>
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
                <div @click="alumniDetailInfo = !alumniDetailInfo"  class="ml-10 text-sky-500 underline cursor-pointer">
                    <span class="text-primary">Details</span>
                </div>
                <detail-info :alumniData="alumniData" v-if="alumniDetailInfo"/>
            </div>
        </div>
        <generalInfo-edit-form v-if="showForm" :userData="alumniData" @closeDiloag="showForm=false" :batch="batch" />
    </div>
</template>
<script>
    import DetailAlumniInfo from './DetailAlumniInfo.vue';
    import FormEditGeneralInfoVue from './FormEditGeneralInfo.vue';
    export default {
       components: {
        'detail-info': DetailAlumniInfo,
        'generalInfo-edit-form': FormEditGeneralInfoVue
       },
       data(){
          return {
            alumniDetailInfo: false,
            showForm: false
          }
       },
       props: ['alumniData', 'batch', 'major'],
       
    }
</script>
