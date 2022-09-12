<template>
    <section class="w-10/12 m-auto">
        <div class="m-auto rounded-[5px]">
            <!-- // top  -->
            <div class="mt-4 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative">
                    <div class="w-[14%] relative ml-16 -mt-20">
                        <img class="rounded-full border-4 border-white ml-1" src="../../assets/cover-img.png" alt="cover-img">
                        <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-0 cursor-pointer shadow-lg bg-white right-0">                     
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                                <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                            </svg>
                        </label>
                        <input id="cover-img" hidden type="file" accept="image/*" />
                    </div>
                    <div class="mt-[8%] block text-center absolute">
                        <h1 class="text-2xl font-extrabold">Mengyi Yoeng</h1>
                        <span class="text-base ">Senior Frontend Developer at Amazon</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/12 h-[100vh] absolute mt-20">
            <div class="mt-2 p-3 font-poppins">
            <div class="flex justify-between">
                <h1 class="text-primary font-bold text-xl">Skills</h1>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </span>
            </div>
            <div class="flex flex-wrap gap-2 py-2">
                <div class="w-full">
                    <h1 class="font-bold text-sm">Hard Skills</h1>
                    <div class="flex flex-wrap py-1 gap-2 text-white font-bold">
                        <span class="bg-secondary p-1 rounded-full text-xs shadow-xl">HTML</span>
                    </div>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

                <div class="w-full mt-2">
                    <h1 class="font-bold text-sm">Soft Skills</h1>
                    <div class="flex flex-wrap py-1 gap-2 text-white font-bold">
                        <span class="bg-secondary p-1 rounded-full text-xs shadow-xl">Public Speaking</span>
                    </div>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div class="w-7/12 mr-[8.4%] h-[100vh] absolute right-0 -mt-14">
            <div class="shadow-lg bg-white rounded-[5px] p-3 font-poppins w-full relative right-0 top-0">
                <div class="flex justify-between">
                    <h1 class="text-primary font-bold flex">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-2">
                            General Information
                        </span>
                    </h1>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg>
                    </span>
                </div>
                <div class="flex flex-wrap">
                    <div class="flex w-6/12">
                        <ul class="text-softGray text-sm leading-7">
                            <li>FIRST NAME</li>
                            <li>GENDER</li>
                            <li>EMAIL</li>
                        </ul>
                        <ul class="text-sm ml-8 font-bold leading-7">
                            <li>Mengyi</li>
                            <li>Male</li>
                            <li>mengyi.yoeng34@gmail.com</li>
                        </ul>
                    </div>
                    <div class="flex w-6/12">
                        <ul class="text-softGray text-sm leading-7">
                            <li>LAST NAME</li>
                            <li>BATCH</li>
                            <li>PHONE</li>
                        </ul>
                        <ul class="text-sm ml-8 font-bold leading-7">
                            <li>Yoeng</li>
                            <li>PNC2018 <span class="bg-secondary rounded-full px-1 text-white ml-2">WEB</span></li>
                            <li>088 888 29295</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shadow-lg bg-white rounded-[5px] p-3 font-poppins w-full relative right-0 mt-4">
                <div class="flex justify-between">
                    <h1 class="text-primary font-bold flex">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-2">
                            General Information
                        </span>
                    </h1>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg>
                    </span>
                </div>
                <div class="flex flex-wrap">
                    
                </div>
            </div>
        </div>
        <!-- display work experience  -->
        <!-- <div class="mt-2 shadow-lg bg-white rounded-lg p-3 font-poppins">
            <div class="flex justify-between">
                <h1 class="text-primary font-bold text-xl">Work Experience</h1>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
            <div class="flex flex-wrap gap-2 py-4">
                <div class="flex items-center bg-slate-100 relative rounded-lg w-[49%]">
                    <img src="../../assets/z1 flexible.svg" alt="">
                    <div>
                        <h1 class="font-bold">Senior Fronted Developer</h1>
                        <p class="text-sm text-slate-400">Z1 Flexible Solution</p>
                        <p class="text-xs text-slate-400">2018 - 2019</p>
                    </div>
                    <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer">
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
                    </div>
                </div>
               
            </div>
        </div> -->

        <!-- <div class="mt-2 shadow-lg bg-white rounded-lg p-3 font-poppins">
            <div class="flex justify-between">
                <h1 class="text-primary font-bold text-xl">Skills</h1>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </span>
            </div>
            <div class="flex flex-wrap gap-2 py-2">
                <div class="w-[49%]">
                    <h1 class="font-bold text-sm">Hard Skills</h1>
                    <div class="flex flex-wrap py-1 gap-2">
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                    </div>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

                <div class="w-[49%]">
                    <h1 class="font-bold text-sm">Soft Skills</h1>
                    <div class="flex flex-wrap py-1 gap-2">
                        <span class="bg-secondary px-1 rounded-full text-xs">Public Speaking</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                        <span class="bg-secondary px-1 rounded-full text-xs">HTML</span>
                    </div>
                    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div> -->
    </section>
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