<template>
    <section>
        <div v-if="isEdit"  class="mt-2 pr-2 font-poppins">
            <div class="flex justify-between border-b-2 border-primary">
                <h1 class="text-primary font-bold text-xl">Skills</h1>
                <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                    <edit-icon @click="isEdited"></edit-icon>
                </span>
            </div>
            <div class="flex flex-wrap gap-2 py-2">
                <div class="w-full mt-2">
                    <h1 class="font-bold text-sm">Hard Skills</h1>
                    <div  class="flex flex-wrap py-1 gap-2 text-white font-bold">
                        <div v-for="skill of listSkill" :key="skill" class="-ml-2">
                            <background-widget v-if="skill.type=='hard'">
                                <template #value>
                                    <span class="text-white">{{skill.name}}</span>
                                </template>
                            </background-widget>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-2">
                    <h1 class="font-bold text-sm">Soft Skills</h1>
                    <div  class="flex flex-wrap py-1 gap-2 text-white font-bold">
                        <div v-for="skill of listSkill" :key="skill" class="-ml-2">
                            <background-widget v-if="skill.type=='soft'">
                                <template #value>
                                    <span class="text-white">{{skill.name}}</span>
                                </template>
                            </background-widget>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- edit skill  -->
        <div class="mt-2 pr-2 font-poppins" v-if="!isEdit">
            <div class="flex justify-between border-b-2 border-primary">
                <h1 class="text-primary font-bold text-xl">Skills</h1>
                <span  class="bg-white w-8 h-8 rounded-full flex justify-center cursor-pointer shadow-lg text-primary ">
                    <check-icon @click="isEdited"></check-icon>
                </span>
            </div>
            <div class="mt-4">
                <input type="radio" name="check" v-model="radioType" value="hard"> Hard Skill
                <input class="ml-14" type="radio" name="check" value="soft" v-model="radioType" > Soft Skill
            </div>
            <div class="">
                <input v-on:keyup.enter="addNewSkill" v-if="radioType=='hard'"  type="text" v-model="skill" placeholder="eg. HTML" class="mt-4 border-2 border-primary outline-none w-full px-2">
                <input v-on:keyup.enter="addNewSkill" v-if="radioType=='soft'"  type="text" v-model="skill" placeholder="eg. Time management" class="mt-4 border-2 border-primary outline-none w-full px-2">
            </div>
            <div class="flex flex-wrap gap-2 py-2">
                <div class="w-full mt-2">
                    <h1 class="font-bold text-sm">Hard Skills</h1>
                    <div  class="flex flex-wrap py-4 gap-4 text-white font-bold">
                        <div v-for="skill of listSkill" :key="skill" class="-ml-2">
                            <div v-if="skill.type=='hard'">
                                <background-widget class="relative">
                                    <template #value>
                                        <minus-icon @click="deleteSkill(skill.id)" class="text-white font-bold absolute -mt-3 right-0"></minus-icon>
                                        <span class="text-white">{{skill.name}}</span>
                                    </template>
                                </background-widget>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-2">
                    <h1 class="font-bold text-sm">Soft Skills</h1>
                    <div  class="flex flex-wrap py-4 gap-4 text-white font-bold">
                        <div v-for="skill of listSkill" :key="skill" class="-ml-4">
                            <div v-if="skill.type=='soft'">
                                <background-widget class="relative">
                                    <template #value>
                                        <minus-icon @click="deleteSkill(skill.id)" class="text-white font-bold absolute -mt-3 right-0"></minus-icon>
                                        <span class="text-white">{{skill.name}}</span>
                                    </template>
                                </background-widget>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    import EditIcon from '../../widgets/IconWidgets/EditIcon.vue'
    import axios from '../../../axios-http'
    export default{
  components: { EditIcon },
        props:{
            listSkill:Object,
        },
        data(){
            return{
                isEdit:true,
                skill:"",
                radioType:""
            }
        },
        methods:{
            addNewSkill(){
                let skills = {name:this.skill ,type:this.radioType,alumni_id:2};
                axios.post('/skills',skills).then(res=>{
                    this.$emit('getSkill')
                      console.log(res.data);
                    this.skill=""
                })
            },
            deleteSkill(index){
                axios.delete('/skills/'+ index).then(res=>{
                    this.$emit('getSkill')
                    console.log(res.data);
                    
                })
            },
            isEdited(){
                this.isEdit = !this.isEdit
            }
        },
        mounted(){
            this.$emit('getSkill')
        }
    }
</script>