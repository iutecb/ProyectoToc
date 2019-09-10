<template>
    <div class="card">
        <div class="card-header"> Archivos de Usuario</div>
            <div class="card-body" >
                <div class="col-md-12 table-responsive">
                    <span @click="mostrarModal()" class="btn btn-primary my-4" style="float: right;">Subir</span>
                    <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                        <thead>
                            <tr >
                                <th class="text-center">
                                    ID 
                                </th>
                                <th class="text-center">
                                    Nombre
                                </th>
                                <th class="text-center">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="file in files" :key="file.id" id='addr0'>
                                <td>
                                    {{ file.id }}
                                </td>
                                <td>
                                    {{ file.name }}
                                </td>
                                <td>
                                <button class="btn btn-success" @click="changeStatus(user)">Ver</button>
                                <button class="btn btn-warning" @click="mostrarModal('editar', file)">Editar</button>
                                <button class="btn btn-danger" @click="deleteFile(file)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
 
<script>
    import Swal from 'sweetalert2'
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                files: [],
                html: '',
                titulo: ''
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            changeStatus(user) {
                axios.post('changeUserStatus', {user: user.id}).then( response => {
                        this.getResults()
                    }  
                )
            },
            getResults() {
                axios.get('/file').then(response => {
                    this.files = response.data;
                })      
            },
            deleteFile(file){
                Swal.fire(
                    'Está seguro?',
                    'Esta acción no se puede deshacer',
                    'question'
                ).then( response => {
                    if(response.value){
                        axios.delete(`file/${file.id}`).then( response => {
                            Swal.fire('Eliminado','', 'success')
                            this.getResults()
                        })
                    }
                })
            },
            mostrarModal (accion = 'nuevo', archivo = null) {
                if(accion == 'nuevo'){
                    this.titulo = 'Guardar Archivo'
                    this.html = '<form name="" id="formpack">' +
                    '<input type="text" id="nombre" name="nombre" data-rule-required="true" data-msg-required="Ingrese nombre" id="name" class="swal2-input" placeholder="Nombre del archivo">' +
                    '<br>' +
                    '<input type="file" accept=".pdf" id="archivo" name="archivo" data-rule-required="true" data-msg-required="Debe ingresar un archivo" id="archivo" class="swal2-input"> ' +
                    '<br>' +
                    '</form>'
                }else if(accion == 'editar'){
                    this.titulo = 'Editar Archivo'
                    this.html = '<form name="" id="formpack">' +
                    '<input type="text" id="editar" name="nombre" data-rule-required="true" data-msg-required="Ingrese nombre" id="name" class="swal2-input" value="' + archivo.name + '" placeholder="Nombre del archivo">' +
                    '<br>' +
                    '<input type="file" accept=".pdf" id="archivoEdit" name="archivo" data-rule-required="true" data-msg-required="Debe ingresar un archivo" class="swal2-input"> ' +
                    '<br>' +
                    '</form>'
                }
            Swal.fire({
                width: 500,
                title: '<h3> ' + this.titulo + ' </h3>',
                html: this.html,
                showCancelButton: true,
                showConfirmButton: true,
                showLoaderOnConfirm: true,
                preConfirm: (params) => {
                    let ajax
                    if(accion == 'nuevo'){
                        let request = new FormData()
                        request.append('name', $("#nombre").val())
                        request.append('file', $('#archivo')[0].files[0])
                        ajax = axios.post('file', request)
                    }else if(accion == 'editar'){
                        let otro = new FormData()
                        otro.append('name', $("#editar").val())
                        otro.append('file', $('#archivoEdit')[0].files[0], $("#editar").val())
                        ajax = axios.patch(`file/${archivo.id}`, otro)
                    }
                    ajax.then(response => {
                        console.log(response)
                        this.getResults()
                        Swal.fire(
                            '¡Listo!',
                            'Sí, listo.',
                            'success'
                        );
                    },
                    error => {
                        console.log(error)
                        this.getResults()
                        if(error.status == 422){
                            Swal.fire(
                                ' Error!',
                                'Maldito, te dije que PDF!',
                                'error'
                            );
                        }else if(error.status >= 500){
                            Swal.fire(
                                ' Error!',
                                'La cagamos, marico :(',
                                'error'
                            );
                        }
                    })
                },
                confirmButtonText: 'Solicitar informacion',
                cancelButtonColor: '#ff0000 ',
                cancelButtonText: '<i class="fa fa-times" aria-hidden="true"></i> Cerrar'
            })
        }
        }
    }
</script>
<
  

</body>