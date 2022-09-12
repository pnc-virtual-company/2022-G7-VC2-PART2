<template>
    <div class="flex items-center bg-slate-100 relative rounded-lg w-[49%]">
            <img src="../../../assets/z1 flexible.svg" alt="">
            <div>
                <h1 class="font-bold">Senior Fronted Developer</h1>
                <p class="text-sm text-slate-400">Z1 Flexible Solution</p>
                <p class="text-xs text-slate-400">2018 - 2019</p>
            </div>
            <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer">
                <div @click="openOpenCard">
                    <point-icon/>
                </div>
                <div v-if="isOpenOptionCard" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10">
                    <div class="flex items-center hover:text-primary text-slate-400 text-sm">
                        <edit-icon/>
                        <span class="ml-1">Edit</span>
                    </div>
                    <div class="flex items-center hover:text-secondary text-slate-400 text-sm">
                        <cancel-icon/>
                        <span class="ml-1">Remove</span>
                    </div>
                </div>
            </div>
        </div>
        
</template>
<script>
export default {
    data(){
            return {
                isOpenOptionCard: false
            }
        },
        methods:{
            openOpenCard(){
                this.isOpenOptionCard = !this.isOpenOptionCard;
            }
        }
}
</script>

<style>

</style>