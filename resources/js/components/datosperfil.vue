<template>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> Bienvenido a tu perfil {{ nombre }}
                    </strong>
                </div><!--card-header-->
                
                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                 <picture-input 
                                    :prefill="localUser.img"
                                      ref="pictureInput" 
                                      @change="onChange" 
                                      width="400" 
                                      height="400" 
                                      margin="16" 
                                      accept="image/jpeg,image/png" 
                                      size="10" 
                                      buttonClass="btn"
                                      :customStrings="{
                                        upload: '<h1>Bummer!</h1>',
                                        drag: 'Drag a 😺 GIF or GTFO'
                                      }">
                                </picture-input>
                                <div class="card-body">
                                   <h4 align="center" class="card-title">
                                        Informacion Usuario <br/></br>
                                    </h4> 

                                    <p class="card-text">
                                        <small>
                                           <H4> <P> Nombre :  {{ localUser.name }}<br/> </P></H4>
                                           <H4> <P> Apellido : {{ localUser.lastname }} <br/> </P> </H4>
                                           <H4> <P> Cedula : {{ localUser.identification_card }}<br/></P> </H4>
                                           <H4> <P> Correo : {{ localUser.email }}<br/></P> </H4>
                                            
                                        </small>
                                    </p>

                                    <p class="card-text">

                                       <!--  <a href="cambiar_contraseña" type="Submit" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> Cambiar contraseña
                                        </a> -->

                                    </p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div><!--card-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            
                                        </div><!--card-header-->

                            <div class="card-body"> 
                                               <div class="card-body">
                                        <form method="POST" action="register"> 

                           <div class="form-group row">
                                 <label for="name" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

                            <div class="col-md-6">
                                <input v-model="pas.password" id="password" type="password" class="form-control" name="name" value="" required autocomplete="password" autofocus >
                            </div>
                        </div>
                                      

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input v-model="pas.new_password" id="new_password" type="password" class="form-control" name="new_password" required autocomplete="nueva.password">
     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input v-model="pas.confirm_password" id="confirm_password" type="password" class="form-control" name="confirmar.password" required autocomplete="confirmar.password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <span @click="changePassword" class="btn btn-primary">Guardar
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                                            
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <!-- Subir Archivos  -->
                                        </div><!--card-header-->

                                        <div class="form-group row mb-0">
                                           <div class="col-md-6 offset-md-4"></div>
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <archivos></archivos>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="w-100"></div>

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
</template>
<script>
    import PictureInput from 'vue-picture-input'
    export default {
      name: 'app',
      props: {
            user: String,
            path: String
        },
    data: () => ({
        localUser: Object,
        pas: {},
        nombre: ''
    }),
    created(){
        this.localUser = JSON.parse(this.user)
    },
    components: {
        PictureInput
    },
    methods: {
        onChange (image) {
          console.log('New picture selected!')
          if (this.$refs.pictureInput.image) {
            axios.post('uploadimage', {image: image}).then( response => {
                console.log(response)
                this.localUser = response.data
            })
            console.log('Picture loaded.')
          } else {
            console.log('FileReader API not supported: use the <form>, Luke!')
          }

        },
        changePassword () {
          axios.post('changepassword', this.pas).then(response => {
            alert(response.data.message)
          })
        },
      }

    } 

    

</script>