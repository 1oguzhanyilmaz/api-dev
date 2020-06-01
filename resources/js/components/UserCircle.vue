<template>
    <div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex items-center justify-center">
        {{ userCircleFunc }}
    </div>
</template>

<script>
    export default {
        name: "UserCircle",
        props: ['name'],
        data: function () {
            return {
            }
        },
        computed: {
            userCircleFunc(){
                // console.log('######');
                // console.log(this.name.match(/\b(\w)/g).slice(0,2).join(''));
                return this.name.match(/\b(\w)/g).slice(0, 2).join('').toUpperCase();
            }
        }
    }
</script>
<style scoped>

</style>
