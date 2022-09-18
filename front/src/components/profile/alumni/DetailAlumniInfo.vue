<template>
    <!--    Detail Information Alumni profile -->
    <section  class="mt-5 bg-blue-600">
        <div class="font-poppins">
        <card-widget class="w-5/12 absolute right-5" >
            <template #header>
                <div class="flex font-bold text-primary">
                    <info-icon></info-icon>
                    <h1 class="ml-3">General Information</h1>
                </div>
            </template>
            <template #body>
                <div class="flex mt-4">
                    <mail-icon class="w-6 h-6"></mail-icon>
                    <span class=" ml-3">{{alumniData.email}}</span>
                </div>
            </template>
                
            </card-widget>
        </div>
    </section>
</template>
<script>
    export default {
        props: ['alumniData']
    }
</script>