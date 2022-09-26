<template>
    <div class="m-auto rounded-[5px]">
        <div class="mt-4 relative font-poppins">
            <div class="bg-profile relative">
                <img v-if="images.cover" :src="images.cover" alt="bg-profile">
                <div v-else class="w-full h-[250px] bg-gray-200 p-3 rounded-sm">
                    <label for="bg-profile" class="w-full h-full flex items-center justify-center cursor-pointer rounded-sm border-dashed border-2 border-primary">
                        <div class="w-[200px]">
                            <img src="../../../assets/default_img/image.png" alt="" class="w-[60px] m-auto">
                            <h1 class="font-bold">Upload your image here</h1>
                        </div>
                    </label>
                </div>
                <label v-if="images.cover" for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                    <camara-icon class="w-6 h-6 text-primary"/>
                </label>
                <input id="bg-profile" hidden type="file" accept="image/*" />
            </div>
            <div class="flex w-full relative" >
                <div class="w-[16%] relative ml-16 -mt-20">
                    <img  v-if="images.cover == null" class="rounded-full border-4 border-white ml-1" src="../../../assets/default_img/user.svg" alt="cover-img">
                    <img v-else class="rounded-full border-4 border-white ml-1" :src="images.cover" alt="cover-img">
                    <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-1 cursor-pointer shadow-lg bg-white right-0 mr-5">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="cover-img" hidden type="file" accept="image/*" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            images:Object,
        }
    }
</script>