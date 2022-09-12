<template>
    <section class="w-8/12 m-auto">
        <div class="m-auto shadow-lg h-[60vh] rounded-lg bg-white">
            <!-- // top  -->
            <div class="bg-white mt-2 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg">                     
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                            <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative">
                    <img class="w-[17%] rounded-full border-4 border-white absolute ml-10 -mt-14" src="../../assets/cover-img.png" alt="cover-img">
                    <span class="z-20 absolute bg-secondary p-1 rounded-full mt-[6%] ml-[20%]">
                        <img class="w-4" src="../../assets/male-symbol-svgrepo-com.min.svg" alt="">
                    </span>
                    <div class="absolute ml-[26%] block mt-1">
                        <h1 class="text-2xl font-extrabold">Mengyi Yoeng</h1>
                        <span class="text-base font-bold">Senior Frontend Developer at Amazon</span>
                        <div class="text-slate-400 flex text-xs items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                            </svg>
                            <span class="ml-3">PNC2018</span>
                            <span class="bg-secondary text-black rounded-full px-1 ml-2">WEB</span>
                        </div>
                        <div class="flex mt-2">
                            <div class="text-slate-400 flex text-xs items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23" fill="currentColor" class="w-5 h-4">
                                    <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                    <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                </svg>
                                <a href="mailto:mengyi.yoeng34@gmail.com" class="ml-3 text-primary">mengyi.yoeng34@gmail.com</a>
                            </div>
                            <div class="text-slate-400 flex text-xs items-center mt-1 ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:0883029295" class="ml-3 text-primary">088 3029 295</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="relative w-full h-[16%]">
                <!-- // edit icons  -->
                <span class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center right-0 bottom-0 m-3 cursor-pointer shadow-lg">                     
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </span>
            </div>
        </div>
        <!-- display work experience  -->
        <div class="mt-2 shadow-lg bg-white rounded-lg p-3 font-poppins">
            <div class="flex justify-between">
                <h1 class="text-primary font-bold text-xl">Work Experience</h1>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
            <div class="flex flex-wrap gap-2 py-4">
                <!-- // Card  work experience -->
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
        </div>
        <!-- display skills  -->
        <div class="mt-2 shadow-lg bg-white rounded-lg p-3 font-poppins">
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
                <!-- Hard skill  -->
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
                <!-- Soft skill  -->
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
        </div>
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