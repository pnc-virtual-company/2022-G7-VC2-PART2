<template>

  <!-- form edit work experience -->
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
                                <input type="file" class="text-sm w-[97%] p-1 mt-1 outline-blue-500 border-solid border-[1px] border-gray-400" placeholder="e.g. file" accept="images/*"  @change="onchangeimg">
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
</template>

<script>
    import axios from '../../axios-http';
export default {
    data(){
        return { 
            workExp: [],
            
        }
    }
}
</script>

<style>

</style>