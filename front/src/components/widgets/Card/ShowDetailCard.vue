<template>
    <div class="flex w-[20%] bg-white shadow-md p-3 rounded-sm cursor-pointer">
        <span  class="bg-amber-500 w-16 h-16 rounded-full flex justify-center cursor-pointer text-primary items-center">
            <slot name="icon"></slot>
        </span>
        <span class="ml-2 mt-2 text-start">
            <h3 class="font-bold">
                <slot name="amount"></slot>
            </h3>
            <h3>
                <slot name="decription"></slot>
            </h3>
        </span>
    </div>
</template>