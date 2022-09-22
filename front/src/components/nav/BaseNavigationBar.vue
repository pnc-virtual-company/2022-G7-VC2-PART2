<template>
    <nav class="bg-primary p-1 px-5 flex justify-between items-center font-poppins text-white">
        <div class="flex gap-1 border-spacing-0 p-1 border rounded bg-white">
            <img class="cursor-pointer w-[120px] rounded-l" src="../../assets/logopage/pnc.svg" alt="pnc logo">
            <img class="cursor-pointer w-[120px] rounded-r" src="../../assets/logopage/alumni_logo.svg" alt="alumni logo">
        </div>
        <div class="relative w-8/12" @mouseover="isProfileShow = false">
            <h3 class="text-end text-3xl font-bold animate-pulse">PNC Alumni</h3>
        </div>
        <div @mouseover="isProfileShow = true" v-if="$store.state.role == 'alumni'">
            <div>
                <div class="bg-secondary p-1 px-2 rounded-full font-bold text-white cursor-pointer relative flex">
                    <span>Mengyi Yoeng</span>
                    <drop-down></drop-down>
                </div>
            </div>
            <div v-if="isProfileShow" class="mt-2 absolute z-20  -ml-2" @mouseleave="isProfileShow = false">
                <card-widget >
                    <template #body>
                        <div class="flex mt-1 hover:bg-gray-200 cursor-pointer">
                            <profile-icon class="text-primary"></profile-icon>
                            <span class="text-primary ml-1">Profile</span>
                        </div>
                        <div class="flex mt-1 hover:bg-gray-200 cursor-pointer">
                            <reset-icon class="text-rose-600 "></reset-icon>
                            <span class="text-rose-600 ml-1">Reset Password</span>
                        </div>
                        <div class="flex mt-1 hover:bg-gray-200  cursor-pointer" @click="$emit('logout')">
                            <logout-icon class="text-rose-600"></logout-icon>
                            <span class="text-rose-600 ml-1">Logout</span>
                        </div>
                        <div class="flex mt-1 hover:bg-gray-200 cursor-pointer">
                            <sitting-icon class="text-gray-500 "></sitting-icon>
                            <span class="text-gray-500 ml-1">Sitting</span>
                        </div>
                    </template>
                </card-widget>
            </div>
        </div>
    </nav>

</template>

<script>
    export default{
        data(){
            return{
                isProfileShow:false
            }
        }
    }
</script>