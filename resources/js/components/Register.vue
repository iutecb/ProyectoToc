<template>
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <form method="POST" action="register">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input v-model="user.name" id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input v-model="user.lastname" id="lastname" type="text" class="form-control " name="lastname" value="" required autocomplete="lastname" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identification_card" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input  v-model="user.identification_card" id="identification_card" type="text" class="form-control" name="identification_card" value="" required autocomplete="identification_card" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input  v-model="user.phone" id="phone" class="form-control " type="text" name="phone" value="" required autocomplete="phone" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                            <div class="col-md-6">
                                <input v-model="user.email" id="email" type="email" class="form-control" name="email" value="" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input v-model="user.password" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input v-model="user.password_confirmation" id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <span @click="register" class="btn btn-primary">Registrar
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
	export default{
		data(){
			return {
				user: {
					name: '',
					lastname: '',
					identification_card: '',
					phone: '',
					email: '',
					password: '',
					password_confirmation: '',
				}
			}
		},
		mounted(){
		},
		methods: {
			register(){
				console.log(this.user)
				axios.post('register', this.user).then( response => {
					console.log(response)
					if(response.data.status == 'success'){
						window.location.href = 'home'
					}else{
						alert('Error')
					}
				})
			}
		}
	}
</script>