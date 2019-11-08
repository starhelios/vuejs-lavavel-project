<template>
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-250  items-center flex flex-col mt-14">
            <p class="text-center text-2xl py-6 text-brand-500 ">Platform</p>
            <div class="w-full flex justify-center">
                <ag-platform-box
                    v-for="(plat, index) in platforms"
                    :name="plat.name"
                    :active="choosen === index ? true : false "
                    :icon="plat.icon"
                    :activeIcon="plat.activeIcon"
                    :comingSoon="plat.comingSoon"
                    @click="selectPlatform(plat.id, plat.slug)"
                    :key="index"
                ></ag-platform-box>
            </div>
            <div class="w-full flex justify-center mt-8">
                <ag-button title="Continue"
                           @click="access()"
                           :class="!accept ? 'opacity-50 cursor-not-allowed' : 'opacity-100 cursor-pointer'"
                            type="full"
                >

                </ag-button>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout from '../../Layouts/Default'
    export default {
        layout: Layout,
        data(){
            return {
                platform : '',
                accept : false,
                platforms : [
                    {id: 0 , name: 'DV360' , slug: 'dv360', icon: '/assets/logos/DV360.svg', activeIcon: '/assets/logos/DV360-white.svg' , active : false , comingSoon : false},
                    {id: 1 , name: 'Youtube' , slug: 'youtube' , icon: '/assets/logos/youtube.svg', activeIcon: '/assets/logos/youtube.svg' , active : false, comingSoon : true},
                    {id: 2 , name: 'Facebook' , slug: 'facebook' , icon: '/assets/logos/facebook.svg', activeIcon: '/assets/logos/facebook.svg' , active : false, comingSoon : true},
                    {id: 3 , name: 'IO' , slug: 'io', icon: '/assets/logos/Io.svg', activeIcon: '/assets/logos/Io.svg' , active : false, comingSoon : true},
                ],
                choosen: null,
            }
        },
        methods: {
            selectPlatform(id , currentPlatform) {
                this.choosen =  id;
                this.accept = true;
                axios.post('/platform', {
                    current_platform: currentPlatform
                }).then(response => {

                })

            },
            access(){
                if(this.accept)
                    this.$inertia.visit('/');
            }
        }
    }
</script>

