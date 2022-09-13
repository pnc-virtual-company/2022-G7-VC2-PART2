<template>
    <section class="w-8/12 m-auto">
        <div class="m-auto shadow-lg h-[60vh] rounded-lg bg-white">
            <!-- // top  -->
            <div class="bg-white mt-2 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative">
                    <img class="w-[17%] rounded-full border-4 border-white absolute ml-10 -mt-14" src="../../assets/cover-img.png" alt="cover-img">
                    <man-icon/> 
                    <div class="absolute ml-[26%] block mt-1">
                        <h1 class="text-2xl font-extrabold">Mengyi Yoeng</h1>
                        <span class="text-base font-bold">Senior Frontend Developer at Amazon</span>
                        <div class="text-slate-400 flex text-xs items-center mt-2">
                            <academic-icon/>
                            <span class="ml-3">PNC2018</span>
                            <background-widget/>
                        </div>
                        <div class="flex mt-2">
                            <div class="text-slate-400 flex text-xs items-center">
                                <mail-icon/>
                                <a href="mailto:mengyi.yoeng34@gmail.com" class="ml-3 text-primary">mengyi.yoeng34@gmail.com</a>
                            </div>
                            <div class="text-slate-400 flex text-xs items-center mt-1 ml-4">
                                <phone-icon/>
                                <a href="tel:0883029295" class="ml-3 text-primary">088 3029 295</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="relative w-full h-[16%]">

                <!-- // edit icons  -->
                <span class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center right-0 bottom-0 m-3 cursor-pointer shadow-lg" @click="showFormEdit">                     
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </span>
            </div>
        </div>
        <fromEdit/>
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
                <!-- // Card  work experience -->
                <div class="flex items-center bg-slate-100 relative rounded-lg w-[49%]">
                    <img src="../../assets/z1 flexible.svg" alt="">
                    <div>
                        <h1 class="font-bold">Senior Fronted Developer</h1>
                        <p class="text-sm text-slate-400">Z1 Flexible Solution</p>
                        <p class="text-xs text-slate-400">2018 - 2019</p>
                    </div>
                    <div class="absolute right-0 top-0 mr-2 mt-1 cursor-pointer" >
                        <svg @click="openOpenCard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:text-primary">
                            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd" />
                        </svg>
                        <div v-if="isOpenOptionCard" class="absolute bg-bgColorWhite space-y-1 p-1 rounded-md z-10">
                            <div class="flex items-center hover:text-primary text-slate-400 text-sm" @click="showEdit">
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


        <!-- formEdit -->
        <div class="modal-mask" v-if="showModal==true">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
            <form @submit.prevent="editinfo">  
                <div class="card_form text-start w-[50%] m-auto p-5">
                    <div class="bg-white p-5 rounded-md">
                    <div class="flex justify-between items-start text-sky-500/80 font-bold">
                    <div class="flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <h2 class="ml-2 text-lg">General Information</h2> 
                    </div>
                    <!-- cencel icon -->
                    <div class="w-[4%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" @click="showFormEdit" >
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
                        </svg>
                    </div>
                    </div>
                    <hr>
                    <div class="flex mt-4 ">
                    <span style='font-size:10px;' class="text-blue-500">&#9733;</span>
                    <p class="ml-1 text-slate-500 text-sm">Indicates required</p>
                    </div>
                    <div class="overflow-y-auto h-[400px]">
                        <div class="w-[100%] mt-4">
                            <label for="First name" class="text-slate-500 text-sm">First name</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem" v-model="firstname">
                        </div>
                        <div class="w-[100%] mt-2">
                            <label for="Last name" class="text-slate-500 text-sm">Last name</label> <sup class="star text-blue-500">*</sup> 
                            <br> 
                            <input type="text" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Loem" v-model="lastname">
                        </div>
                        <div class="w-[100%] mt-2">
                            <label for="Gender" class="text-slate-500 text-sm">Gender</label><sup class="star text-blue-500">*</sup> 
                            <br>
                            <select id="gender" class="w-[97%] p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1px] border-gray-400 text-sm" v-model="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                        </div>
                
                        <h3 class="mt-7 text-slate-500 text-sm">Alumni info</h3>
                        <div class="w-[100%] mt-1">
                        <label for="Batch" class="text-slate-500 text-sm">Batch</label> <sup class="star text-blue-500">*</sup> 
                        <br>
                        <select id="batch" class="w-[97%] p-1.5 mt-1 text-slate-500 outline-blue-500 border-solid border-[1px] border-gray-400 text-sm" v-model="batch">
                            <option value="PNC2007">PNC2007</option>
                            <option value="PNC2008">PNC2008</option>
                            <option value="PNC2009">PNC2009</option>
                            <option value="PNC2010">PNC2010</option>
                            <option value="PNC2011">PNC2011</option>
                            <option value="PNC2012">PNC2012</option>
                            <option value="PNC2013">PNC2013</option>
                            <option value="PNC2014">PNC2014</option>
                            <option value="PNC2015">PNC2015</option>
                            <option value="PNC2016">PNC2016</option>
                            <option value="PNC2017">PNC2017</option>
                            <option value="PNC2018">PNC2018</option>
                            <option value="PNC2019">PNC2019</option>
                            <option value="PNC2020">PNC2020</option>
                            <option value="PNC2021">PNC2021</option>
                        </select>
                        </div>

                        <h3 class="mt-7 text-slate-500 text-sm">Contact info</h3>
                        <div class="w-[100%] mt-1">
                        <label for="Email" class="text-slate-500 text-sm">Email</label> <sup class="star text-blue-500">*</sup> 
                        <br>
                        <input type="email" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. example@email.com" v-model="email">
                        </div>
                        <div class="w-[100%] mt-2">
                        <label for="company" class='text-slate-500 text-sm' >Phone</label> <sup class="star text-blue-500">*</sup> 
                        <br>
                        <input type="number" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. 087 276 083" v-model="phone">
                        </div>
                    
                    </div>
                    <div class="text-end pt-5">
                        <hr >
                        <button type="submit" class="bg-sky-500/80 p-1 rounded-full w-[13%] text-white mt-2 mb-0">Save</button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div> 
        </div>

        <!-- edit workexperience -->

    <div class="modal-mask" v-if="showedit==true">
        <div class="modal-wrapper">
          <div class="modal-container rounded">
              <form @submit.prevent="editworkexperience">  
                    <div class="card_form text-start w-[50%] m-auto p-5">
                        <div class="bg-white p-5 rounded-md">
                        <div class="flex justify-between items-start text-sky-500/80 font-bold">
                        <div class="flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <h2 class="ml-2 text-lg">WorkExperience Information</h2> 
                        </div>
                        <!-- cencel icon -->
                        <div class="w-[4%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" @click="showEdit" >
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end font-bold"/>
                            </svg>
                        </div>
                        </div>
                        <hr>
                        <div class="flex mt-4 ">
                        <span style='font-size:10px;' class="text-blue-500">&#9733;</span>
                        <p class="ml-1 text-slate-500 text-sm">Indicates required</p>
                        </div>
                        <div class="overflow-y-auto h-[400px]">
                            <div class="w-[100%] mt-4">
                                <label for="startdate" class="text-slate-500 text-sm">Start_date</label> <sup class="star text-blue-500">*</sup> 
                                <br>
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Sophiem" v-model="startdate">
                            </div>
                            <div class="w-[100%] mt-2">
                                <label for="enddate" class="text-slate-500 text-sm">End_date</label> <sup class="star text-blue-500">*</sup> 
                                <br> 
                                <input type="date" class="w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. Loem" v-model="enddate">
                            </div>
                            
                            <div class="w-[100%] mt-2">
                            <label for="position" class="text-slate-500 text-sm">Position</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. web developer" v-model="position">
                            </div>
                            <h3 class="mt-7 text-slate-500 text-sm">company info</h3>
                            <div class="w-[100%] mt-1">
                            <label for="name" class="text-slate-500 text-sm">Name</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. ZINation" v-model="name">
                            </div>
                            <div class="w-[100%] mt-1">
                            <label for="address" class="text-slate-500 text-sm">Address</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="text" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. PNC" v-model="address">
                            </div>

                            <div class="w-[100%] mt-1">
                            <label for="file" class="text-slate-500 text-sm">Image</label> <sup class="star text-blue-500">*</sup> 
                            <br>
                            <input type="file" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" @change="onchangeimg" >
                            </div>
                            
                        </div>
                        <div class="text-end pt-5">
                            <hr >
                            <button type="submit" class="bg-sky-500/80 p-1 rounded-full w-[13%] text-white mt-2 mb-0">Save</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
        <!-- testing Card widget -->
        <testing-card/>


    </section>
    
</template>
<script setup>
    import {ref,onMounted} from 'vue'
    import axios from '../../axios-http';
    // const updateInfoURL = ""

    const isOpenOptionCard= ref(false);
    const showModal = ref(false);  
    const showedit = ref(false);
    // const listAllData =ref([]);
    const userId =2;
    const batchid =1;
    const gender = ref("");
    const firstname= ref("");
    const lastname= ref("");
    const batch = ref("");
    const email=ref("");
    const phone =ref("");

    // edit work experience -->
   

    function openOpenCard(){
        isOpenOptionCard.value = !isOpenOptionCard.value;
    }
    function showFormEdit(){
        showModal.value = !showModal.value
    }
    
    function showEdit(){
        showedit.value = !showedit.value
    }

    function editinfo(){
        axios.put('users/'+userId,{
            firstName:firstname.value,
            lastName:lastname.value,
            email:email.value,
            password:"pupd",
            gender:gender.value,
            phone:phone.value
        })
        axios.put('batches/'+batchid,{
            generation:batch.value
        })
        showModal.value = !showModal.value;
    }
    // onMounted(()=>{
    //     getInformations();
    // })
    const name=ref("");
    const address=ref("");
    const image=ref("");
    // const 
    
    const startdate = ref("");
    const enddate = ref("");
    const position = ref("");
    
    const  allowExtension = ["jpg", "png", "jpeg", "gif", "webp"];
    function onchangeimg(event) {
        let fileExtension = event.target.files[0].name.split(".").pop();
        if (allowExtension.includes(fileExtension.toLowerCase())) {
            image.value = event.target.files[0];
            console.log(image.value);
        }
    }
    function editworkexperience(){
        let Fd = new FormData();
        Fd.append('_method','PUT');
        Fd.append('name',name.value);
        Fd.append('address',address.value);
        Fd.append('image',image.value);
        console.log(Fd.value);
        axios.post("http://127.0.0.1:8000/api/companies/2",Fd).then((response)=>{
            console.log(response.data)
        })

        axios.put('http://127.0.0.1:8000/api/experiences/5',{
            startYear:startdate.value,
            endYear:enddate.value,
            position:position.value
        }).then((result) => {
            console.log(result.data);
        })
        showedit.value = !showedit.value;
    }
</script>
<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 10;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        padding: 15px 28px;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
        z-index: 10;
    }
    .modal-body {
        margin: 20px 0;
    }
    .modal-default-button {
        float: right;
    }
    .modal-enter-from, .modal-leave-to {
        opacity: 0;
    }
    .modal-enter-active .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    };
    form {
        width: 95%;
    }
  </style>
    
    
  