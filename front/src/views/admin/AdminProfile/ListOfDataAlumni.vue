<template>
    <div  class="w-full">
        <div class="flex w-full justify-between items-center p-5">
            <div class="w-[40%]">
                <span class="form flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-2 ml-2">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" class="w-[30%]" placeholder="search email" v-model="searchValue">
                </span> 
            </div>
            <div class="w-[35%] flex">
                <span class="w-[60%]">
                    <select name="filter" id="1" class=" w-[90%] bg-white border-gray-400 border" v-model="major">
                        <option value="Major">Major</option>
                        <option value="WEB">WEB</option>
                        <option value="SNA">SNA</option>
                    </select>
                </span>
                <span class="w-[60%]">
                    <select name="filter" id="1" class="w-[90%] bg-white border-gray-400 border" v-model="batch">
                        <option value="Batch">Batch</option>
                        <option value="PNC2022"> PNC2022</option>
                        <option value="PNC2023">PNC2023</option>
                    </select>
                </span>
            </div>
        </div>

        <div class="w-[95%] m-auto shadow-md items-center rounded-sm pb-[10%]">
            <div class="w-full m-auto text-gray-600 p-2 border-b">
                <nav class="w-[60%] text-gray-600 flex justify-between align-center ml-3 text-[14px]">
                    <h3>Email</h3>
                    <h3 class="mr-[12%]">Batch</h3>
                </nav>
            </div>
            <card_item_alumni v-for="alumni in BatchFilter" :key="alumni" :alumniDatas="alumni.user" :batch="alumni.batch" :major="alumni.major" :id="alumni.id">
            </card_item_alumni>
        </div>
    </div>

</template>

<script>
    import axios from '../../../axios-http'
    import CardItemAlumni from './CardItemAlumni.vue'
export default {
    components:{
        'card_item_alumni':CardItemAlumni
    },
    data(){
        return{
            alumniData:[],
            major:'Major',
            batch:'Batch',
            searchValue:'',
            filterDataAlumni : [],
            sortDirection: 'unchanged',
            orderBy:''
        }
    },
    methods:{
        async getAlumniData(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
            })
        },
       
    },
    mounted(){
        this.getAlumniData();
    },
    computed:{
        BatchFilter(){
            if(this.searchValue.trim().length >0){
                return this.alumniData.filter((search)=>search.user.email.toLowerCase().includes(this.searchValue.trim()))
            }
            if(this.major =="Major" && this.batch== "Batch"){
                this.filterDataAlumni = this.alumniData;
            }
            else if(this.major =="Major" && this.batch != ""){
                this.filterDataAlumni = this.alumniData.filter(batch=>(batch.batch.generation == this.batch))
            }
            else if(this.batch =="Batch" && this.major != ""){
                this.filterDataAlumni = this.alumniData.filter(major=>(major.major.name == this.major))
            }
            else if(this.major != "" && this.batch != ""){
                this.filterDataAlumni = this.alumniData.filter(batch=>(batch.batch.generation== this.batch) && (batch.major.name == this.major) );
            }
            else if(this.major == "" && this.batch !=""){
                this.filterDataAlumni = this.alumniData.filter(batch=>(batch.batch.generation== this.batch))
            }
            else if(this.major != "" && this.batch ==""){
                this.filterDataAlumni = this.alumniData.filter(batch=>(batch.major.name == this.major))
            }
            else{
                this.filterDataAlumni = this.alumniData;
            }
            return this.filterDataAlumni;
        },

        
    }
}
</script>

<style scoped>
.form {
  border: 1px solid rgb(167, 166, 166);
  border-radius: 2.5px;
  margin-top: 10px;
  width: 65%;
}
  input[type="text"] {
  border: none;
  outline: none;
  width: 90%;
  background: transparent;
  margin: 0;
  padding: 7px 8px;
  font-size: 14px;
}

input[type="text"]::placeholder {
  color: rgb(40, 38, 38);
}
</style>>

