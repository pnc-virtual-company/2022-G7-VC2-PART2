<template>
    <div :class="[shadowLg,bgWhite,pCard,roundedLg,mCard]">
        <slot name="header">

        </slot>
        <slot name="card">

        </slot>
    </div>
</template>

<script>
export default {
    props:['shadowLg','bgWhite','pCard','roundedLg','mCard']
}
</script>

<style>

</style>