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
        </div>
        <div class="w-[95%] m-auto shadow-md items-center rounded-sm pb-[10%]">
            <div class="w-full m-auto text-gray-600 p-2 border-b">
                <nav class="w-[60%] text-gray-600 flex justify-between align-center ml-3 text-[14px]">
                    <h3>Fullname</h3>
                    <h3 class="mr-[30%]">Email</h3>
                </nav>
            </div>
            <card_item_ERO v-for="item in FilterDataERO" :key="item" :eroData ='item' />
        </div>
    </div>
</template>

<script>
    import cardItemERO from './CardItemERO.vue'
    import axios from '../../../axios-http'
export default {
    components:{
        'card_item_ERO':cardItemERO
    },
    data(){
        return{
            EroData:[],
            searchValue:''
        }
    },
    methods:{
        getEroData(){
            axios.get('ero').then((res)=>{
                this.EroData = res.data
                console.log("Ero Data here",this.EroData);
            })
        }
    },

    computed:{
        FilterDataERO(){
            let EroFilter =[]
            if(this.searchValue.trim().length >0){
                return this.EroData.filter((search)=>(search.firstName+" "+search.lastName).toLowerCase().includes(this.searchValue.trim()))
            }
            else{
                EroFilter = this.EroData;
            }
            return EroFilter;
        }
    },

    mounted(){
        this.getEroData();
    }
}
</script>

<style>

</style>