<template>
    <div class="m-auto rounded-[5px]">
        <div class="mt-4 relative font-poppins">
            <div class="bg-profile relative">
                <img v-if="coverurl" :src="coverurl" alt="bg-profile">
                <div v-else class="w-full h-[250px] bg-gray-200 p-3 rounded-sm">
                    <label for="bg-profile" class="w-full h-full flex items-center justify-center cursor-pointer rounded-sm border-dashed border-2 border-primary">
                        <div class="w-[200px] ">
                            <img src="../../../assets/default_img/image.png" alt="" class="w-[60px] m-auto">
                            <h1 class="font-bold">Upload your image here</h1>
                        </div>
                    </label>
                </div>
                <label v-if="coverurl" for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                    <camara-icon class="w-6 h-6 text-primary"/>
                </label>
                <input id="bg-profile" hidden type="file" accept="image/*" @change="changeCover" />
            </div>
            <div class="flex w-full relative" >
                <div class="w-[16%] relative ml-16 -mt-20">
                    <img  v-if="profileurl == null" class="rounded-full border-4 border-white ml-1" src="../../../assets/default_img/user.svg" alt="cover-img">
                    <img v-else class="rounded-full border-4 border-white ml-1" :src="profileurl" alt="cover-img">
                    <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-1 cursor-pointer shadow-lg bg-white right-0 mr-5">                     
                        <camara-icon class="w-6 h-6 text-primary"/>
                    </label>
                    <input id="cover-img" hidden type="file" accept="image/*" @change="changeProfile" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "../../../axios-http";
import Swal from "sweetalert2";
export default {
    props: {
        images:Object,
        userId:String,
    },
    data(){
        return {
            profileurl:"",
            coverurl:null,
            profileimg:"",
            coverimg:"",
            allowExtension:["jpg", "png", "jpeg", "gif", "webp","jfif", "svg"]
        }
    },
    methods:{
        changeProfile(event){
            let fileExtension = event.target.files[0].name.split(".").pop();
            if (this.allowExtension.includes(fileExtension.toLowerCase())) {
                this.profileimg = event.target.files[0];
                let formdata = new FormData();
                formdata.append('_method','PUT');
                formdata.append('profile',this.profileimg);
                axios.post('users/updateimage/'+this.userId,formdata).then((response)=>{
                    if (response.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile picture have been upadtae!',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                        this.getUserimage();
                    }else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Fail to update profile image',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                    }
                })
            }
        },
        changeCover(event){
            let fileExtension = event.target.files[0].name.split(".").pop();
            if (this.allowExtension.includes(fileExtension.toLowerCase())) {
                this.coverimg = event.target.files[0];
                let formdata = new FormData();
                formdata.append('_method','PUT');
                formdata.append('cover',this.coverimg);
                axios.post('users/updateimage/'+this.userId,formdata).then((response)=>{
                    if (response.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Cover picture have been upadtae!',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                        this.getUserimage();
                    }else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Fail to update Cover image',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                    }
                })
            }
        },
        getUserimage(){
            axios.get('users').then((response)=>{
                this.profileurl = response.data[0].profile;
                this.coverurl = response.data[0].cover;

            })
        }
    },
    mounted(){
        this.getUserimage();
    }
}
</script>