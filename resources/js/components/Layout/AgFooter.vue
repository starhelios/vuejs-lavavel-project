<template>

    <div class="w-full bottom-footer  bottom-0 left-0 right-0 bg-gray-900   mt-32 ">
        <div class="w-full flex justify-between items-center">
            <div class=" items-center px-10 py-5">
                <p class="text-white text-sm">© Copyright {{year}} all rights reserved</p>
            </div>
            <div class=" items-center px-10 py-5 flex flex-row text-right">
                <a class="text-white text-right text-sm px-2" href="/imprint">Imprint</a>
                <a class="text-white text-right text-sm px-2" href="/policy">Privacy Policy</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            year() {
                var date = new Date();
                var year = date.getFullYear();
                return year;
            }
        }
    }
</script>
