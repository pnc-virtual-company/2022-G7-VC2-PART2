<template>
    <div class="w-full m-auto p-3 rounded-lg ">
        <h1 class="text-xl ml-6 font-bold text-primary py-4">User Management</h1>
        <!-- <Card_Detail> </Card_Detail> -->
        <User_List_Data> </User_List_Data>
    </div>
</template>

<script>
import DetailPeopleCard from './AdminProfile/DetailPeopleCard.vue'
import UserListData from './AdminProfile/UserListData.vue'

export default {
    components:{
        'Card_Detail':DetailPeopleCard,
        'User_List_Data':UserListData,
    },
}
</script>

<style>

</style>