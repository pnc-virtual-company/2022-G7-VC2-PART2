<template>
    <div class="flex w-[95%] m-auto text-center gap-3">
        <user-detail-card>
            <template #icon>
                <total-user-icon />
            </template>
            <template #amount>
                {{amountOfUser}}
            </template>
            <template #decription>
                Total
            </template>
        </user-detail-card>
        <user-detail-card>
            <template #icon>
                <ero-icon />
            </template>
            <template #amount>
                {{amountOfEro}}
            </template>
            <template #decription>
                ERO
            </template>
        </user-detail-card>
        <user-detail-card>
            <template #icon>
                <alumni-icon />
            </template>
            <template #amount>
                {{amountOfUser + amountOfEro}}
            </template>
            <template #decription>
                Alumni
            </template>
        </user-detail-card>
    </div>
</template>

<script>
import axios from '../../../axios-http'
export default {
    data(){
        return {
            user: []
        }
    },
    methods: {
        getUser(){
            axios.get('users').then(response=>{
                this.user = response.data
                console.log(response.data);
            })
        }
    },
    computed: {
        amountOfUser(){
            return this.user.filter(data=>(data.role == 'alumni')).length
        },
        amountOfEro(){
            return this.user.filter(data=>(data.role == 'ero')).length
        }
    },
    mounted(){
        this.getUser();
    }
}
</script>

<style>

</style>