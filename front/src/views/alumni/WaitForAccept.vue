<template>
    <form-widget>
        <template #header>
            <div class="w-full">
                <img src="../../assets/default_img/time.png" alt="" class="w-[80px] m-auto animate-pulse">
            </div>
        </template>
        <template #body>
            <h1 class="text-center py-3">
                Your information has been sent to PNC's ERO team, please wait for confirmation from them!
            </h1>
        </template>
        <template #footer>
            
        </template>
    </form-widget>
</template>
<script>
    const ACTIVATED_SCRET_KEY = import.meta.env.VITE_APP_ACTIVATED_KEY;
    import axios from '../../axios-http'

    export default {
        methods: {
            async status() {
                await axios.get('/account/getData').then(response=>{
                    console.log(response.data.data.invited);
                    let eroAllowed = response.data.data.invited;
                    if(eroAllowed == 0){
                        eroAllowed = false
                    }else{
                        eroAllowed = true
                    }
                    if(eroAllowed){
                        document.cookie = `${'activated'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
                        const activated = encryptData(eroAllowed.toString(), ACTIVATED_SCRET_KEY)
                        this.$cookies.set('activated', activated, "1d") 
                        this.$router.go()
                    }
                })
            },
        },
        mounted(){
            this.status()
        }
    }
</script>