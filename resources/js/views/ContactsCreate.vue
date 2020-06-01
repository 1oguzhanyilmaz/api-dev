<template>
    <div>
        <form @submit.prevent="submitForm" action="">
            <input-field name="name" label="Contact Name" placeholder="Contact Name" :errors="errors"
                @update_field="form.name = $event"></input-field>

            <input-field name="email" label="Contact Email" placeholder="Contact Email" :errors="errors"
                @update_field="form.email = $event"></input-field>

            <input-field name="company" label="Company" placeholder="Company" :errors="errors"
                @update_field="form.company = $event"></input-field>

            <input-field name="birthday" label="Birthday" placeholder="MM/DD/YYYY" :errors="errors"
                @update_field="form.birthday = $event"></input-field>

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Add New Contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "ContactsCreate",
        components: {
            "input-field": InputField,
        },
        data: function () {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': '',
                },
                errors: null,
            }
        },
        methods: {
            submitForm(){
                axios.post('/api/contacts', this.form)
                    .then((response) => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>
<style scoped>

</style>
