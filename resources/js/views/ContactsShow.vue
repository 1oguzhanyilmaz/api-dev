<template>
    <div>
        <div v-if="loading">Loading...</div>

        <div v-else>
            <div class="flex justify-between">
                <a href="#" class="text-blue-400" @click="$router.back()">
                    Back
                </a>
                <div class="relative">
                    <router-link :to="'/contacts/' + contact.contact_id + '/edit'" class="px-4 py-2 rounded text-sm text-green-500 border border-green-500 text-sm font-bold mr-2">Edit</router-link>
                    <a href="#" @click="modal = !modal" class="px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500">Delete</a>

                    <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg  z-20 p-8 w-64 right-0 mt-2 mr-4">
                        <p>Are you sure you want to delete this record ?</p>
                        <div class="flex items-center mt-6 justify-end">
                            <button class="text-white pr-4" @click="modal = !modal">Cancel</button>
                            <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white" @click="destroy">Delete</button>
                        </div>
                    </div>

                </div>
                <div v-if="modal" @click="modal = !modal" class="absolute bg-black opacity-25 right-0 left-0 bottom-0 z-10"></div>
            </div>

            <div class="flex items-center pt-6">
                <user-circle :name="contact.name"></user-circle>

                <p class="pl-5 text-xl">{{ contact.name }}</p>
            </div>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Contact</p>
            <p class="pt-2 text-blue-400">{{ contact.email }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Company</p>
            <p class="pt-2 text-blue-400">{{ contact.company }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Birthday</p>
            <p class="pt-2 text-blue-400">{{ contact.birthday }}</p>
        </div>
    </div>
</template>

<script>
    import UserCircle from '../components/UserCircle';

    export default {
        name: "ContactsShow",
        components: {
            "user-circle": UserCircle,
        },
        mounted(){
            axios.get('/api/contacts/' + this.$route.params.id)
                .then((response) => {
                    this.contact = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    if (error.response.status === 404) {
                        this.$router.push('/contacts');
                    }
                });
        },
        data: function () {
            return {
                contact: null,
                loading: true,
                modal: false,
            }
        },
        methods: {
            destroy(){
                axios.delete("/api/contacts/" + this.$route.params.id)
                    .then((response) => {
                        this.$router.push('/contacts');
                    })
                    .catch(err => {
                        alert('Unable to delete contact.');
                    })
            }
        }
    }
</script>
<style scoped>

</style>
