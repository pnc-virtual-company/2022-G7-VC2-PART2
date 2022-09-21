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
           <span>
             {{work.start_year}}
           </span>
           <span v-if="work.current == 0">
              ~ {{work.end_year}}
           </span> 
           <span v-else>
             ~ current
           </span>
        </template>
        <template #footer>
            <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer" @mouseleave="showOption=false">
                <point-icon @mouseover="showOption=true" ></point-icon>
                <div v-if="showOption" @mouseleave="showOption=false" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                    <div @click="showEditForm" class="flex items-center hover:text-primary text-slate-400 text-sm">
                        <edit-icon ></edit-icon>
                        <span class="ml-1">Edit</span>
                    </div>
                    <div :work="work" @click="remove" class="flex items-center hover:text-secondary text-slate-400 text-sm">
                        <cancel-icon></cancel-icon>
                        <span class="ml-1">Remove</span> 
                    </div>
                </div>
            </div>
        </template>
    </base-card>
    <edit-work-form :work="work" v-if="showEdit"  @getWork="getWork">
        <template #hidden-form>
            <cancel-icon @click="showEdit =!showEdit"/>
        </template>
    </edit-work-form>
</template>
<script>   
    import FormEditWorkExperViewVue from '../../../components/profile/alumni/FormEditWorkExper.vue'
    import axios from '../../../axios-http'
    export default {
        emits:['getWork'],
        components: {
            'edit-work-form': FormEditWorkExperViewVue
        },
        props: {
            work: Object,
        },
        data(){
            return {
                showOption: false,
                showEdit: false
            }
        },
        methods: {
            showEditForm(){
                this.showEdit = !this.showEdit;
            },
            getWork(){
                this.showEdit = !this.showEdit;
                console.log('close form');
                this.$emit('getWork');
            },
            remove(){
            axios.delete('/experiences/' + this.work.id).then(response=>{
                this.$emit('getWork'); 
            }); 
            }
    }
    }
</script>