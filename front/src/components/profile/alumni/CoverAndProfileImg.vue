<template>
    <div class="m-auto rounded-[5px]">
        <div class="mt-4 relative font-poppins">
            <div class="bg-profile relative">
                <img src="../../../assets/bg-profile.png" alt="bg-profile">
                <label for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                    <camara-icon class="w-6 h-6 text-primary"/>
                </label>
                <input id="bg-profile" hidden type="file" accept="image/*" />
            </div>
            <div class="flex w-full relative" >
                <div class="w-[16%] relative ml-16 -mt-20">
                    <img class="rounded-full border-4 border-white ml-1" src="../../../assets/cover-img.png" alt="cover-img">
                    <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-1 cursor-pointer shadow-lg bg-white right-0">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="cover-img" hidden type="file" accept="image/*" />
                </div>
            </div>
        </div>
    </div>
</template>