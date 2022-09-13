<template>
    <card-widget :shadowLg="'shadow-lg'" :bgWhite="'bg-white'" :roundedLg="'rounded-lg'" :pCard="'p-3'" :mCard="'mt-2'">
        <template #header>
            <h1>Work Experience</h1>
        </template>
        <template #card>
            <base-card :bgColor="'bg-gray-700'" :wCard="'w-[100px]'">
                <template #header>
                    <h1>Hello</h1>
                </template>
            </base-card>
        </template>
        
    </card-widget>
</template>

<script>
export default {

}
</script>

<style>

</style>