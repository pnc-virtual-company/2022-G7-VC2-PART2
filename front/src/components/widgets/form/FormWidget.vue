<template>
    <div class="w-[50%] bg-white shadow-md rounded-sm py-4 m-auto z-20 mt-5 px-5" v-cloak>
        <div class="text-primary font-bold text-2xl text-center">
            <slot name="header"></slot>
        </div>
        <slot name="body"></slot>
        <div class="w-full flex justify-center">
            <slot name="footer"></slot>
        </div>
    </div>
</template>