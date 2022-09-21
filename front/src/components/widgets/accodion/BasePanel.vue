<template>
  <!-- bg-white w-8 h-8 rounded-full flex justify-end cursor-pointer shadow-lg items-end -->
  <div class="w-full m-auto bg-white rounded drop-shadow-lg p-4 my-2 duration-700 ease-in-out font-pop">
    <div class="flex items-center justify-between">
      <slot name="header"> </slot>
    </div>
    <div class="w-full md:flex flex-wrap justify-between">
      <slot name="limit"> </slot>
    </div>
    <div  @click="action" class="mt-4 flex justify-end align-end cursor-pointer">
      <div   :class="[active ? 'rotate-180': '']"  class="hover:bg-gray-200 duration-700 cursor-pointer ease-in-out rounded-full p-1">
        <chevron-up-icon></chevron-up-icon>

      </div>
    </div>
  
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: false,
    }
  },
    methods:{
      action(){
        this.active = !this.active
        this.$emit('action')
      }
    }
};
</script>

<style scoped>
body {
  background-color: #f1f5f8;
}
</style>