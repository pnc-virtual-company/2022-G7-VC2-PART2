<template>
    <div class=" w-[95%] m-auto text-center shadow-md rounded-sm items-center mt-3 bg-white mb-10">
        <div class="flex">
            <div class="flex w-full justify-between items-center p-5">
                <span class="flex  text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="ml-2 font-bold text-xl">List of users</h1>
                </span>
                <span class="flex text-white font-bold" @click="showEroForm=!showEroForm">
                    <base-button v-if="this.$store.state.role == 'admin'" class="px-3 flex items-center justify-center">
                        <template #name>
                            <plus-icon />
                            Invite ERO
                        </template>
                    </base-button>
                    <base-button v-else class="px-3 flex items-center justify-center">
                        <template #name>
                            <plus-icon />
                            Invite Alumni
                        </template>
                    </base-button>
                </span>
            </div>
        </div>
        <div class=" mt-3 ml-5 flex ">
            <button class="mr-4" :class="{'text-primary font-bold':showAlunmi}" @click="showAlunmilist">Alumni</button>
            <button v-if="this.$store.state.role == 'admin'" :class="{'text-primary font-bold':showERO}" @click="showEROList" >ERO</button>
            <button v-if="this.$store.state.role == 'ero'" :class="{'text-primary font-bold': showAlumniRequest}" @click="showAlumniRequestList" >Request</button>
        </div>
        <hr>
        <list_alumni v-if="showAlunmi">
        </list_alumni>
        <list_ERO v-if="showERO">
        </list_ERO>
        <list_alumni_request v-if="showAlumniRequest">
        </list_alumni_request>
    </div>
    <div v-if="showEroForm" class="z-50 top-0 flex justify-center items-center w-full h-full bg-[rgba(105,105,105,0.57)] absolute left-0">
        <ero-form v-click-outside="hideForm" class="m-10" @invite="getInvited" />
    </div>

</template>

<script>
import ListOfDataAlumni from './ListOfDataAlumni.vue'
import ListOfDataERO from './ListOfDataERO.vue'
import ListOfDataAlumniRequest from './ListOfDataAlumniRequest.vue';
import InviteFormVue from '../../../components/form/InviteForm.vue';
export default {
    components:{
        'list_alumni':ListOfDataAlumni,
        'list_alumni_request':ListOfDataAlumniRequest,
        'list_ERO':ListOfDataERO,
        'ero-form': InviteFormVue
    },
    data(){
        return{
            showAlunmi:true,
            showERO:false,
            showEroForm: false,
            showAlumniRequest: false
        }
    },
    methods:{
        showAlunmilist(){
            this.showERO = false,
            this.showAlunmi=true
            this.showAlumniRequest=false,
            this.color = 'text-red-500'
        },
        showEROList(){
            this.showERO=true,
            this.showAlunmi=false
            this.color='text-red-500'
        },
        showAlumniRequestList(){
            this.showAlumniRequest=true,
            this.showERO=false,
            this.showAlunmi=false
            this.color='text-red-500'
        },
        getInvited(value){
            console.log(value);
            this.showEroForm = value
        },
        hideForm(){
            this.showEroForm = false
        }
    }
}
</script>

<style>
.tooltip {
  position: relative;
  display: inline-block;
  cursor: pointer;

}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 80px;
  color:black;
  background-color: rgb(200, 229, 247);
  color: #fff;
  text-align: center;
  font-size: 14px;
  border-radius: 2.5px;
  padding: 2px 0;
  position: absolute;
  z-index: 1;
  bottom: 120%;
  left: 50%;
  margin-left: -40px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color:  rgb(200, 229, 247) transparent transparent transparent;

}

.tooltip:hover .tooltiptext {
  visibility: visible;
  color: black;
}

</style>