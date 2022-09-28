<template>
    <div class="flex w-[95%] m-auto text-center gap-3">
        <user-detail-card>
            <template #icon>
                <total-user-icon />
            </template>
            <template #amount>
                1502
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
                1
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
                1500
            </template>
            <template #decription>
                Alumni
            </template>
        </user-detail-card>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>