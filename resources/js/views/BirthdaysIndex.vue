<template>
    <contacts-list endpoint="/api/birthdays"></contacts-list>
</template>

<script>
    import ContactsList from '../components/ContactsList';

    export default {
        name: "BirthdaysIndex",
        components: {
            "contacts-list": ContactsList,
        },
    }
</script>

<style scoped>

</style>
