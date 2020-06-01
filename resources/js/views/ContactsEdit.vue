<template>
    <div>
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                Back
            </a>
        </div>

        <form @submit.prevent="submitForm" action="">
            <input-field name="name" label="Contact Name" placeholder="Contact Name" :errors="errors" :data="form.name"
                @update_field="form.name = $event"></input-field>

            <input-field name="email" label="Contact Email" placeholder="Contact Email" :errors="errors" :data="form.email"
                @update_field="form.email = $event"></input-field>

            <input-field name="company" label="Company" placeholder="Company" :errors="errors" :data="form.company"
                @update_field="form.company = $event"></input-field>

            <input-field name="birthday" label="Birthday" placeholder="MM/DD/YYYY" :errors="errors" :data="form.birthday"
                @update_field="form.birthday = $event"></input-field>

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "ContactsEdit",
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
        mounted(){
            axios.get('/api/contacts/' + this.$route.params.id)
                .then((response) => {
                    // console.log(response);
                    this.form = response.data.data;
                    // console.log(this.form);
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    if (error.response.status === 404) {
                        this.$router.push('/contacts');
                    }
                });
        },
        methods: {
            submitForm(){
                axios.patch('/api/contacts/' + this.$route.params.id, this.form)
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
