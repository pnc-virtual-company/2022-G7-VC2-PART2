<template>
    <div  class="w-full mt-5">
        <div class="w-[95%] m-auto shadow-md items-center rounded-sm pb-[10%]">
            <div class="w-full m-auto text-gray-600 p-2 border-b">
                <nav class="w-full text-gray-600 flex justify-between align-center ml-3 text-[14px] relative">
                    <h3>Fullname</h3>
                    <h3 class="absolute left-[20%]">Phone</h3>
                    <h3 class="absolute left-[44%]">Batch</h3>
                    <h3 class="absolute left-[65%]">Gender</h3>
                </nav>
            </div>
            <card_item_alumni v-for="alumni in getAlumniRequest" :key="alumni" :alumniDatas="alumni.user" :batch="alumni.batch" :major="alumni.major" :id="alumni.id" :requestCheck="requestCheck">
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
            orderBy:'',
            batchData: [],
            majorData: [],
            requestAlumni: [],
            requestCheck: true
        }
    },
    methods:{
        async getAlumniData(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
            })
        },
        getBatch(){
            axios.get('batches').then(result=>{
                this.batchData=result.data
            })
        },
        getMajor(){
            axios.get('majors').then(result=>{
                this.majorData=result.data
            })
        },
       
    },
    mounted(){
        this.getAlumniData();
        this.getBatch();
        this.getMajor();
    },
    computed:{
        getAlumniRequest(){
            return this.alumniData.filter(data=>(data.user.invited == 0))
        }
    }
}
</script>

<style>
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

