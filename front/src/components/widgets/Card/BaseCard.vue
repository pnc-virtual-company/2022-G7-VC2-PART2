<template>
    <div class="flex items-center bg-slate-100 relative rounded-lg w-[49%] p-1">
        <slot name="logo">

        </slot>
        <div class="w-full">
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

        <!-- <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer">
            <svg @click="openOpenCard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-primary">
                <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd" />
            </svg>
            <div v-if="isOpenOptionCard" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10">
                <div class="flex items-center hover:text-primary text-slate-400 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                    <span class="ml-1">Edit</span>
                </div>
                <div class="flex items-center hover:text-secondary text-slate-400 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1">Remove</span>
                </div>
            </div>
        </div> -->
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