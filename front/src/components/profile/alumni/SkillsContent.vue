<template>
    <div class="mt-2 pr-2 font-poppins">
        <div class="flex justify-between border-b-2 border-primary">
            <h1 class="text-primary font-bold text-xl">Skills</h1>
        </div>
        <div class="flex flex-wrap gap-2 py-2" >
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
                    <add-icon class="text-primary mt-2"/>
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
                <add-icon class="text-primary mt-2"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            listSkill:Object
        }
    }
</script>