<template>
    <card-widget class="mt-4">
        <template #header>
            <header-card>
                <template #icon>
                   <academic-icon></academic-icon>
                </template>
                <template #title>
                    Work Experience
                </template>
                <template #action_icon>
                    <add-icon  class="text-primary" @click="showForm = !showForm"/>
                </template>
            </header-card>
        </template>
        <template #body>
            <div class="flex flex-wrap gap-2 py-4">
                <slot name="card">
                    
                </slot>
            </div>
        </template>
    </card-widget>
    <addWorkExperienceVue v-if="showForm" @add-WorkExperience ="addWorkExperience">
        <template #hidden-form>
            <svg xmlns="http://www.w3.org/2000/svg" @click="showForm = !showForm" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" class="w-6 h-6 hover:bg-gray-200 rounded-full cursor-pointer">
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
            </svg>
        </template>
    </addWorkExperienceVue>
</template>
<script>
import AddWorkExperienceVue from '../../../components/profile/alumni/AddWorkExperience.vue';
export default {
    components:{
        AddWorkExperienceVue,
    },
    data(){
        return{
            showForm: false,

        }
    },
    methods:{
        addWorkExperience(){
            this.showForm = !this.showForm;
        },
        closeAddWork(){
            this.showForm = !this.showForm;
        },
    },
    cancelAddWorkExperience(){
        this.$emit('add-WorkExperience')
    }
}
</script>
<style>

</style>