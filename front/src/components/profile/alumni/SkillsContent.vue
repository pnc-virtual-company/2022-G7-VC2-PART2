<template>
    <div class="mt-2 pr-2 font-poppins">
        <div class="flex justify-between border-b-2 border-primary">
            <h1 class="text-primary font-bold text-xl">Skills</h1>
            <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg -mt-2">
                <edit-icon class="text-primary" />
            </span>
        </div>
        <div class="flex flex-wrap gap-2 py-2">
            <div class="w-full">
                <h1 class="font-bold text-sm">Hard Skills</h1>
                <div class="flex flex-wrap py-1 gap-2 text-white font-bold">
                    <span class="bg-secondary p-1 rounded-full text-xs shadow-xl">HTML</span>
                </div>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg mt-2">
                    <add-icon class="text-primary" />
                </span>
            </div>

            <div class="w-full mt-2">
                <h1 class="font-bold text-sm">Soft Skills</h1>
                <div class="flex flex-wrap py-1 gap-2 text-white font-bold">
                    <span class="bg-secondary p-1 rounded-full text-xs shadow-xl">Public Speaking</span>
                </div>
                <span class="bg-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg mt-2">
                    <add-icon class="text-primary" />
                </span>
            </div>
        </div>
    </div>
</template>