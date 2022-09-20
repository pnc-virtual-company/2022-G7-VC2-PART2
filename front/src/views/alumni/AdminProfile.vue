<template>
    <div class="w-[90%] m-auto bg-zinc-100 drop-shadow-xl p-3 rounded-lg ">
        <Card_Detail> </Card_Detail>
        <User_List_Data> </User_List_Data>
    </div>
    <!-- <route-view></route-view> -->
</template>

<script>
    import CardDetail from './components/AdminComponents/CardDetail.vue'
    import UserListData from './components/AdminComponents/UserListData.vue'
// import UserListData from '../alumni/components/AdminComponents/UserListData.vue'
export default {
    components:{
        'Card_Detail':CardDetail,
        'User_List_Data':UserListData,
    }
}
</script>

<style>

</style>