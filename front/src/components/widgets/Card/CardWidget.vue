<template>
  <div class="shadow-lg bg-white rounded-[5px] p-3 font-poppins w-full">
    <div class="flex justify-between">
      <slot name="header"> </slot>
    </div>
    <div>
      <slot name="body"> </slot>
    </div>
    <div class="footer" v-if="isHideShow">
      <div
        @click="action"
        class="mt-4 flex justify-end align-end cursor-pointer"
      >
        <div
          :class="[active ? 'rotate-180' : '']"
          class="
            hover:bg-gray-200
            duration-700
            cursor-pointer
            ease-in-out
            rounded-full
            p-1
          "
        >
          <chevron-up-icon></chevron-up-icon>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
    props: {
      isHideShow: Boolean,
    },
    data(){
        return{
            active:false
        }
    },
    methods:{
        action(){
            this.active = !this.active;
            this.$emit('action')
        }
    }
}
</script>