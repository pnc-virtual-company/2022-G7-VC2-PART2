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
                    <span>{{firstName}} {{lastName}}</span>
                    <drop-down></drop-down>
                </div>
            </div>
            <div v-if="isProfileShow" class="mt-2 absolute z-20  -ml-2 w-[200px]" @mouseleave="isProfileShow = false">
                <card-widget>
                    <template #body>
                        <div class="flex mt-1 hover:text-primary cursor-pointer text-[14px] text-gray-400">
                            <user-icon></user-icon>
                            <span class="ml-1">Profile</span>
                        </div>
                        <div class="flex mt-1 hover:text-rose-600 text-gray-400 cursor-pointer  text-[14px]">
                            <key-icon></key-icon>
                            <span class="ml-1">Reset Password</span>
                        </div>
                        <div class="flex mt-1 hover:fill-rose-600 hover:text-rose-600 text-gray-400 fill-gray-400  cursor-pointer text-[14px]" @click="$emit('logout')">
                            <logout-icon></logout-icon>
                            <span class="ml-1">Logout</span>
                        </div>
                    </template>
                </card-widget>
            </div>
        </div>
    </nav>
</template>

<script>
    export default{
        props: {
            firstName: String,
            lastName: String,
        },
        data(){
            return{
                isProfileShow:false
            }
        }
    }
</script>