<template>
    <base-card>
        <template #logo>
            <img :src="work.company.image" alt="" class="w-[100px]">
        </template>
        <template #main_title>
            {{work.company.name}}
        </template>
        <template #sub_title>
            {{work.position}}
        </template>
        <template #lower_title>
            {{work.start_year}} {{work.end_year}}
        </template>
        <template #footer>
            <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer" @mouseleave="showOption=false">
                <point-icon @mouseover="showOption=true" ></point-icon>
                <div v-if="showOption" @mouseleave="showOption=false" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                    <div @click="showEditForm(work.id)" class="flex items-center hover:text-primary text-slate-400 text-sm">
                        <edit-icon ></edit-icon>
                        <span class="ml-1">Edit</span>
                    </div>
                    <div class="flex items-center hover:text-secondary text-slate-400 text-sm">
                        <cancel-icon></cancel-icon>
                        <span class="ml-1">Remove</span> 
                    </div>
                </div>
            </div>
        </template>
    </base-card>
    <edit-work-form :work="work" v-if="showedit"  @closeForm=closeForm>
        <template #hidden-form>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" class="w-6 h-6 hover:bg-gray-200 rounded-full cursor-pointer" @click="showedit = !showedit" >
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
            </svg>
        </template>
    </edit-work-form>
</template>
<script>   
    import FormEditWorkExperViewVue from '../../../components/profile/alumni/FormEditWorkExper.vue'
    export default {
        components: {
            'edit-work-form': FormEditWorkExperViewVue
        },
        props: {
            work: Array,
        },
        data(){
            return {
                showOption: false,
                showedit: false
            }
        },
        methods: {
            showEditForm(){
                this.showedit = !this.showedit;
            },
            closeForm(value){
                this.showedit = !this.showedit;
                console.log(value)
            }
        },
    }
</script>