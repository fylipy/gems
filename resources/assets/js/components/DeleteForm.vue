<template>
    <div>
        <button class="btn btn-danger" v-on:click="confirmDelete">Eliminar</button>
    </div>
</template>

<script>
    export default {
        props: [
            'product_id'
        ],
        methods: {
            confirmDelete(){
                var id = this.product_id
                swal({
                    title: "Se eliminará el producto!",
                    text: "Está seguro de eliminar este prodcuto?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, elimínalo!",
                    cancelButtonText: "No, cancelar.",
                    closeOnConfirm: true,
                },
                function(){
                    axios.delete('/products/'+id)
                        .then(response => {
                            swal({
                                title: "Eliminado!",
                                text: "El producto ha sido eliminado correctamente.",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(location.reload.bind(location), 2100);
                        }).catch(response => {
                         console.log(response)
                    })
                });
            }
        },
    }
</script>
