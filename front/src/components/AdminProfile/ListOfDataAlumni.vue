<template>
    <div  class="w-full">
        <div class="flex w-full justify-between items-center p-5">
            <div class="w-[30%]">
                <span class="form  flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mt-2">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                    <input type="search" id="gsearch" name="gsearch" class="w-[30%] p-2" placeholder="search name" v-model="search">
                </span> 
            </div>
            <div class="w-[35%] flex">
                <span class="w-[90%] drop-shadow-2xl">
                    <select name="filter" id="1" class="p-2 w-[90%] bg-gray-200" >
                        <option value="Major">Major</option>
                        <option value="WEB">WEB</option>
                        <option value="SNA">SNA</option>
                    </select>
                </span>
                <span class="w-[90%] drop-shadow-2xl">
                    <select name="filter" id="1" class="p-2 w-[90%] bg-gray-200" >
                        <option value="Batch">Batch</option>
                        <option value="PNC2022"> PNC2022</option>
                        <option value="PNC2023">PNC2023</option>
                    </select>
                </span>
                <span class="w-[90%] drop-shadow-2xl">
                    <select name="flter" id="2" class="p-2 w-[90%] bg-gray-200">
                        <option value="none" selected disabled hidden>Order By</option>
                        <option value="Ascending">Ascending</option>
                        <option value="Descending">Descending</option>
                    </select>
                </span>
            </div>
        </div>

        <div class="w-[95%] m-auto shadow-lg bg-white items-center rounded-lg">
            <div class="w-full m-auto  bg-blue-500 rounded-t p-2">
                <nav class="w-[60%] flex justify-between align-center text-white ml-5 ">
                    <h3>No</h3>
                    <h3>Email</h3>
                    <h3>Batch</h3>
                </nav>
            </div>
            <Card_Item_Alumni v-for="alumni in alumniData" :key="alumni" :alumniDatas="alumni.user" :batch="alumni.batch" :major="alumni.major" :id="alumni.id">
            </Card_Item_Alumni>
           
            <!-- footer of card -->
            <div class="footer flex justify-end items-end mr-10 mt-3 pb-5">
                <h2 class="mr-5">Rows per page</h2>
                <select name="numer" id="3" class="mr-2 border-2 border-gray-300 rounded-sm "> 
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <h2 class="mr-5">1-40 of 1500</h2>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from '../../axios-http'
    import CardItemAlumni from './CardItemAlumni.vue'
export default {
    components:{
        'Card_Item_Alumni':CardItemAlumni
    },
    data(){
        return{
            alumniData:[],
            major:'',
            batch:'',
            search:'',

        }
    },
    methods:{
        async getAlumniData(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
                console.log("All ERO DATA",this.alumniData);
            })
        }
    },
    mounted(){
        this.getAlumniData();
    },
    computed:{
      
        // MajorFilter(){
        //     return this.alumniData.filter(major=>major.name == this.major);
        // },
       
    }
}
</script>

<style>

</style>