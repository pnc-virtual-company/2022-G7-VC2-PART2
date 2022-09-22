<template>
    <div class="m-auto rounded-[5px]">
        <div class="mt-4 relative font-poppins">
            <div class="bg-profile relative">
                <img src="../../../assets/bg-profile.png" alt="bg-profile">
                <label for="bg-profile" class="rounded-full w-8 h-8 absolute items-center flex justify-center top-0 right-0 m-3 cursor-pointer shadow-lg bg-white">                     
                    <camara-icon class="w-6 h-6 text-primary"/>
                </label>
                <input id="bg-profile" hidden type="file" accept="image/*" />
            </div>
            <div class="flex w-full relative" >
                <div class="w-[16%] relative ml-16 -mt-20">
                    <img class="rounded-full border-4 border-white ml-1" src="../../../assets/cover-img.png" alt="cover-img">
                    <label for="cover-img" class="rounded-full w-8 h-8 absolute items-center flex justify-center bottom-1 cursor-pointer shadow-lg bg-white right-0">                     
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
    data(){
        return {
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
                axios.post('users/updateimage/1',formdata).then((response)=>{
                    if (response.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile picture have been upadtae!',
                            showConfirmButton: false,
                            timer: 1200,
                        });
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
                this.profileimg = event.target.files[0];
                let formdata = new FormData();
                formdata.append('_method','PUT');
                formdata.append('profile',this.profileimg);
                axios.post('users/updateimage/1',formdata).then((response)=>{
                    if (response.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile picture have been upadtae!',
                            showConfirmButton: false,
                            timer: 1200,
                        });
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
        }
    }
}
</script>