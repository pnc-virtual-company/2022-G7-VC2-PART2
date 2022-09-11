<template>
  <div class="about">
    <button class="text-red-500 ">Edit Now</button>
    <form action="#">  
        <div class="card_form text-start w-[50%] m-auto bg-blue-300 p-5">
          <div class="flex justify-between items-start">
            <div class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
              <h2>General Information</h2> 
            </div>
            <div class="w-[4%]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width={1.5} stroke="currentColor" className="w-6 h-6" >
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" class="text-end"/>
              </svg>
            </div>
          
          </div>

          <hr>
          <div class="flex mt-4 ">
            <span style='font-size:10px;'>&#9733;</span>
            <p class="ml-1">Indicates required</p>
          </div>
          
              <div class="w-[100%] mt-4">
                  <label for="First name">First name</label> <sup class="star text-blue-500">*</sup> 
                  <br>
                  <input type="text" class="w-[100%] p-2.5 mt-1">
              </div>
              <div class="w-[100%] mt-4">
                  <label for="Last name">Last name</label> <sup class="star text-blue-500">*</sup> 
                  <br>
                  <input type="text" class="w-[100%] p-2.5 mt-1" >
              </div>
            
              <div class="w-[100%] mt-4">
                  <label for="Gender">Gender</label><sup class="star text-blue-500">*</sup> 
                  <br>
                  <select id="gender" class="w-[100%] p-2.5 mt-1">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
              <h3 class="mt-7">Current position</h3>
              <div class="w-[100%] mt-1">
                <label for="position">Position</label> <sup class="star text-blue-500">*</sup> 
                <br>
                <input type="text" class="w-[100%] p-2.5 mt-1" >
              </div>
              <div class="w-[100%] mt-4">
                <label for="company">Company</label> <sup class="star text-blue-500">*</sup> 
                <br>
                <input type="text" class="w-[100%] p-2.5 mt-1">
              </div>
              <div class="text-end pt-5">
                <button class="bg-teal-500  ">Cancel</button>
                <button>Save</button>
              </div>
     
        </div>
      
    </form>
  </div>
</template>
