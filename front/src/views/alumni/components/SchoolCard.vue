<template>
    <base-card>
        <template #logo>
            <img :src="school.school_profile" alt="" class="w-full">
        </template>
        <template #main_title>
            {{school.school_name}}
        </template>
        <template #sub_title>
            {{school.degree}}
        </template>
        <template #lower_title>
            <span class="mr-1">{{school.start_date}}</span> 
            <span v-if="school.current == true">~ Current</span>
            <span v-if="school.current == false">~ {{school.end_date}}</span>
        </template>
        <template #footer>
            <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer" @mouseleave="showOption=false">
                <point-icon  @mouseover="showOption=true" ></point-icon>
                <div v-if="showOption" @mouseleave="showOption=false" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                    <div @click="showEditForm" class="flex items-center hover:text-primary text-slate-400 text-sm">
                        <edit-icon ></edit-icon>
                        <span class="ml-1">Edit</span>
                    </div>
                    <div class="flex items-center hover:text-secondary text-slate-400 text-sm">
                        <cancel-icon @click="$emit('removeSchool',school.id)" ></cancel-icon>
                        <span class="ml-1">Remove</span> 
                    </div>
                </div>
            </div>
        </template>
    </base-card>
 <!-- form edit -->
    <edit-school-form v-if="showEdit" :school="school"  @close-form="closeFormschoolForm">
        <template #hidden-form>
            <cancel-icon @click="showEdit =!showEdit"/>
        </template>
    </edit-school-form>

</template>
<script>   
    import FormEditSchoolBg from '../../../components/profile/alumni/FormEditSchoolBg.vue'
    export default {
        props: {
            school:Object
        },
        components: {
            'edit-school-form': FormEditSchoolBg
        },
        emmits:['action','close-form'],
        data(){
            return {
                showOption: false,
                showEdit: false
            }
        },
        methods: {
            showEditForm(){
                this.showEdit = !this.showEdit;
                this.$emit('action',this.school.id);
            },
            closeFormschoolForm(){
                this.showEdit = !this.showEdit;
                this.$emit('reload-data');
            },
        editSchool(){
            this.showedit = !this.showedit;
            this.$emit('edit-school');
        }
        }
    }


</script>