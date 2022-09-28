<template>
    <section class="w-[95%] bg-white shadow-md rounded-sm py-4 m-auto z-20 mt-5 px-5 space-y-5" v-if="!showEroForm">
        <h1 class="font-bold text-primary text-center text-xl border-b pb-4">
            Add User Account
        </h1>
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-md text-primary">Add list</h1>
            <div class="flex">
                <base-button class="w-2/12 flex items-center justify-center" @click="showEroForm=!showEroForm">
                    <template #name>
                        <plus-icon />
                        ERO
                    </template>
                </base-button>
                <base-button class="w-2/12 flex items-center justify-center" @click="showEroForm=!showEroForm">
                    <template #name>
                        <plus-icon />
                        Alumni
                    </template>
                </base-button>
            </div>
        </div>
    </section>
    <ero-form v-if="showEroForm" @invite="getInvited" />
</template>
<script>
    import InviteFormVue from '../../components/form/InviteForm.vue';
    export default {
        components: { 
            'ero-form': InviteFormVue
        },
        data(){
            return {
                showEroForm: false
            }
        },
        methods: {
            getInvited(value){
                console.log(value);
                this.showEroForm = value
            }
        }
    }
</script>