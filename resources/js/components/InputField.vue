<template>
   <div class="relative pb-4">
        <label :for="name" class="absolute pt-2 text-blue-500 uppercase text-xs font-bold">{{ label }}</label>
        <input type="text" :id="name" name="" class="pt-8 w-full text-gray-900 border-b pb-2 focus:outline-none focus:border-blue-400"  :placeholder="placeholder" :class="errorClassObject()" v-model="value" @input="updateField()">

        <p class="text-red-600 text-sm" v-text="errorMessage()">Error Here</p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: ['name','label','placeholder','errors','data'],
        data: function () {
            return {
                value: '',
            }
        },
        computed: {
            hasError(){
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0;
            }
        },
        methods: {
            updateField: function () {
                this.clearErrors(this.name);

                this.$emit('update_field', this.value);
            },
            errorMessage(){
                if(this.hasError){
                    return this.errors[this.name][0];
                }
            },
            clearErrors(){
                if(this.hasError){
                    this.errors[this.name] = null;
                }
            },
            errorClassObject(){
                return {
                    'error-field': (this.hasError)
                }
            },
        },
        watch:{
            data: function(val){
                this.value = val;
            }
        }
    }
</script>
<style scoped>
    .error-field{
        @apply .border-red-500 .border-b-2
    }
</style>
