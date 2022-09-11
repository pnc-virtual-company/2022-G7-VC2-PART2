<template>
    <div class="w-full m-auto flex flex-wrap bg-sky-500">
        <router-link to="/home">
            <div class="w-12/11 bg-white m-3 p-2 flex justify-between cursor-pointer">
                <div class="w-3/4 mt-2 ml-1.5">
                    <img src="../../assets/aluminai.png" class="w-1/4">
                </div>
                <div class="w-3/4  -ml-32 text-center">
                    <h3 class="text-blue-600">CAMBODIA</h3>
                    <h2 class="font-bold">Alumni</h2>
                </div>
            </div>
        </router-link>
        <div class="w-10/12 flex justify-end">
            <router-link to="/" class="w-2/4 flex items-center justify-end cursor-pointer">
                <div class="w-1/4 flex items-center justify-end cursor-pointer">
                    <h1 class="font-bold text-gray-50 rounded-3xl p-3 bg-orange-400">Mengyi Yoeng</h1>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
import "../../assets/tailwind.css"
export default {

}
</script>

<style>

</style>