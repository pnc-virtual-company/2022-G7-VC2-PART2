<template>
    <div class="flex flex-wrap">
        <div class="flex w-6/12">
            <ul class="text-softGray text-sm leading-7">
                <li>FIRST NAME</li>
                <li>GENDER</li>
                <li>EMAIL</li>
            </ul>
            <ul class="text-sm ml-8 font-bold leading-7">
                <li>{{user.firstName}}</li>
                <li>Male</li>
                <li>{{user.email}}</li>
            </ul>
        </div>
        <div class="flex w-6/12">
            <ul class="text-softGray text-sm leading-7">
                <li>LAST NAME</li>
                <li>BATCH</li>
                <li>PHONE</li>
            </ul>
            <ul class="text-sm ml-8 font-bold leading-7">
                <li>{{user.lastName}}</li>
                <li>{{batch}} <span class="bg-secondary rounded-full px-1 text-white ml-2">{{major}}</span></li>
                <li>088 888 29295</li>
            </ul>
        </div>
    </div>
</template>
<script setup>
    const props = defineProps({
        user: Array,
        batch: String,
        major: String
    })
</script>