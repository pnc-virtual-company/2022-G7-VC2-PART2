<template>
    <section class="w-8/12 m-auto">
        <div class="m-auto shadow-lg h-[60vh] rounded-lg bg-white">
            <!-- // top  -->
            <div class="bg-white mt-2 relative font-poppins">
                <div class="bg-profile relative">
                    <img src="../../assets/bg-profile.png" alt="bg-profile">
                    <label for="bg-profile" class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="bg-profile" hidden type="file" accept="image/*" />
                </div>
                <div class="flex w-full relative">
                    <img class="w-[17%] rounded-full border-4 border-white absolute ml-10 -mt-14" src="../../assets/cover-img.png" alt="cover-img">
                    <man-icon/> 
                    <div class="absolute ml-[26%] block mt-1">
                        <h1 class="text-2xl font-extrabold">Mengyi Yoeng</h1>
                        <span class="text-base font-bold">Senior Frontend Developer at Amazon</span>
                        <div class="text-slate-400 flex text-xs items-center mt-2">
                            <academic-icon/>
                            <span class="ml-3">PNC2018</span>
                            <background-widget/>
                        </div>
                        <div class="flex mt-2">
                            <div class="text-slate-400 flex text-xs items-center">
                                <mail-icon/>
                                <a href="mailto:mengyi.yoeng34@gmail.com" class="ml-3 text-primary">mengyi.yoeng34@gmail.com</a>
                            </div>
                            <div class="text-slate-400 flex text-xs items-center mt-1 ml-4">
                                <phone-icon/>
                                <a href="tel:0883029295" class="ml-3 text-primary">088 3029 295</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="relative w-full h-[16%]">
                <span class="bg-white rounded-full w-8 h-8 absolute items-center flex justify-center right-0 bottom-0 m-3 cursor-pointer shadow-lg">
                    <edit-icon class="text-primary"/>
                </span>
            </div>
        </div>
        <!-- testing Card widget -->
        <testing-card/>

    </section>
</template>

<script>
    import TheTesting from '../../components/Testing.vue' 
    export default {
        components:{
            'testing-card':TheTesting
        },
        data(){
            return {
                isOpenOptionCard: false
            }
        },
        methods:{
            openOpenCard(){
                this.isOpenOptionCard = !this.isOpenOptionCard;
            }
        }
    }
</script>