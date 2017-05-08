<template>
    <div>
        <!--<form v-on:submit.prevent="confirmDelete">-->
            <input type="hidden" v-model="product_id">
            <input class="btn btn-danger" value="Eliminar" v-on:click="confirmDelete">
            <!--<input type="submit" value="Eliminar" class="btn btn-danger">-->
        <!--</form>-->
    </div>
</template>

<script>
    export default {
        data (){
          return{
              'product_id' : '',
          }
        },
        methods: {
            confirmDelete(){
                swal({
                    title: "Se eliminará el registro!",
                    text: "Está seguro de eliminar este registro?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, elimínalo!",
                    cancelButtonText: "No, cancelar.",
                    closeOnConfirm: true,
                },
                function(){
                    swal("Here's a message!")
                });
            }
        }
//        mounted() {
//            console.log('Component mounted.')
//        }
    }
</script>
