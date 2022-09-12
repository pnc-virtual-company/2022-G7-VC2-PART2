<template>
    <div class="mt-2 shadow-lg bg-white rounded-lg p-3 font-poppins">
        <div class="flex justify-between">
            <h1 class="text-primary font-bold text-xl">Work Experience</h1>
            <add-icon />
        </div>
        <div class="flex flex-wrap gap-2 py-4">
            <slot>
                <small-card/>
                <small-card/>
            </slot>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>