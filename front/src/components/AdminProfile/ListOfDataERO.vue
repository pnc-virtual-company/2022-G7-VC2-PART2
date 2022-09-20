<template>
    <div  class="w-full">
            <div class="flex w-full justify-between items-center p-5">
                <div class="w-[30%]">
                    <span class="form  flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mt-2">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                            </svg>
                            <input type="search" id="gsearch" name="gsearch" class="w-[30%] p-2" placeholder="search name">
                    </span> 
                </div>
                <div class=" w-[15%] items-end flex">
                    <span class="w-[100%] m-auto">
                        <select name="filter" id="1" class="p-2 w-[90%] drop-shadow-2xl">
                            <option value="none" selected disabled hidden>Filter By</option>
                            <option value="Name">Name</option>
                            <option value="Email">Email</option>
                        </select>
                    </span>
                </div>
            </div>

            <!-- list of card -->
        <div class="w-[95%] m-auto shadow-lg bg-white items-center rounded-lg">
            <div class="w-full m-auto  bg-blue-500 rounded-t p-2">
                <nav class="w-[60%] flex justify-between align-center text-white ml-5">
                    <h3>No</h3>
                    <h3>Name</h3>
                    <h3>Email</h3>
                </nav>
            </div>
            
            <Card_Item_ERO>
                
            </Card_Item_ERO>
        </div>
    </div>
</template>

<script>
    import cardItemERO from './CardItemERO.vue'
export default {
    components:{
        'Card_Item_ERO':cardItemERO
    },
    data(){
        return{
            EroData:[]
        }
    },
    methods:{
        getEroData(){
            axios.get('alumni/2').then((res)=>{
                console.log(res.data);
                this.EroData
            })
        }
    }
}
</script>

<style>

</style>