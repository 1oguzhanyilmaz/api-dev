<template>
    <contacts-list endpoint="/api/contacts"></contacts-list>
</template>

<script>
    import ContactsList from '../components/ContactsList';

    export default {
        name: "ContactsIndex",
        components: {
            "contacts-list": ContactsList,
        },
        methods: {

        }
    }
</script>
<style scoped>

</style>
