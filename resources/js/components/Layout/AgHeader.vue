<template>
    <div class="w-full flex justify-between border-b-2 border-gray-300">
        <div class="w-full logo py-4 mx-8 flex justify-start">
            <inertia-link class="flex" href="/"><img src="/assets/images/sanofi-logo.svg" alt="" class="px-2"></inertia-link>
            <img src="assets/images/agni-logo.svg" alt="" class="px-4 h-8">
        </div>
        <div class="w-full flex justify-end px-8 py-2">
            <a class="py-2 px-4 text-xl text-brand-600 font-bold" href="/platform">Platform</a>
            <a class="py-2 px-4 text-xl text-brand-600 font-bold" href="/admin" target="_blank">Admin</a>
            <a class="py-2 px-4 text-xl text-brand-600 font-bold" href="#"
                          @click="logout">
                Logout
            </a>

            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="token">
            </form>

        </div>
    </div>
</template>

<script>
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    export default {
        data(){
            return {
                token : csrf_token
            }
        },
        methods: {
            logout(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit()
            }
        }
    }
</script>
