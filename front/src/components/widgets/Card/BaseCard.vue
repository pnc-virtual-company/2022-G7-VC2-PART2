<template>
    <div class="flex items-center bg-slate-100 relative rounded-lg w-[49%] h-[100px] p-1">
        <div class="absolute w-[20%] ml-1">
            <slot name="logo">
    
            </slot>
        </div>
        <div class="w-full ml-[25%]">
            <h1 class="font-bold w-[85%] truncate" @mouseover="$event.target.classList.remove('truncate')" @mouseout="$event.target.classList.add('truncate')">
                <slot name="main_title">

                </slot>
            </h1>
            <p class="text-sm text-slate-400">
                <slot name="sub_title">
    
                </slot>
            </p>
            <p class="text-xs text-slate-400">
                <slot name="lower_title">
    
                </slot>
            </p>
            <slot name="footer">
            </slot>
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
            },
        }
}
</script>

<style>

</style>