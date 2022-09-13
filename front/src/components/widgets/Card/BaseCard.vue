<template>
    <div class="flex items-center bg-slate-100 relative rounded-lg" :class="[bgColor,wCard]">
        <div class="w-full">
            <slot name="header">
        
            </slot>

        </div>
        <div class="w-1/6">
             
        <slot name="left">
             
        </slot>

         </div>

         <div class="w-4/6">
             <slot name="cehter">
     
              </slot>
         </div>
         <div class="w-1/6">

             <slot name="right">
     
              </slot>
         </div>

    </div>
        
</template>
<script>
export default {
    props:['bgColor','wCard'],
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