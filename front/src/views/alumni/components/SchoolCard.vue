<template>
    <base-card>
        <template #logo>
            <img src="../../../assets/schoollogos/pnc.svg" alt="" class="w-[100px]">
        </template>
        <template #main_title>
            Passerellesnumeriques Cambodia
        </template>
        <template #sub_title>
            Association’s in Web Development
        </template>
        <template #lower_title>
            2016 - 2018 
        </template>
        <template #footer>
            <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer" @mouseleave="showOption=false">
                <point-icon  @mouseover="showOption=true" ></point-icon>
                <div v-if="showOption" @mouseleave="showOption=false" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10"> 
                    <div @click="showEditForm()" class="flex items-center hover:text-primary text-slate-400 text-sm">
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
</template>
<script>   
    export default {
        components: {
            
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