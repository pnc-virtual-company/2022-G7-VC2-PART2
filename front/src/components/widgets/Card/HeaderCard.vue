<template>
    <h1 class="text-primary font-bold flex py-4">
        <span>
            <slot name="icon">
    
            </slot>
        </span>
        <span class="ml-2">
            <slot name="title">

            </slot>
        </span>
    </h1>
    <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg">
        <slot name="action_icon">
    
        </slot>
    </span>
</template>