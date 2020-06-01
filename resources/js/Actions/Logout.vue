<template>

</template>

<script>
    export default {
        name: "Logout",
        created() {
            axios.post('/logout')
                .then(response => {

                })
                .catch(err => {

                })
                .finally(err => {
                    // every request
                    window.location = '/login';
                });
        }
    }
</script>

<style scoped>

</style>
