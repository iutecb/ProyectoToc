<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administración de usuarios</div>
 
                        <div class="card-body" >
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                    <thead>
                                        <tr >
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th class="text-center">
                                                Cédula
                                            </th>
                                            <th class="text-center">
                                                Nombre
                                            </th>
                                            <th class="text-center">
                                                Apellido
                                            </th>
                                            <th class="text-center">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in laravelData.data" :key="user.id" id='addr0' data-id="0" class="hidden">
                                            <td data-name="name">
                                                {{ user.id }}
                                            </td>
                                            <td data-name="mail">
                                                {{ user.identification_card }}
                                            </td>
                                            <td data-name="desc">
                                                {{ user.name }}
                                            </td>
                                            <td data-name="sel">
                                                {{ user.lastname }}
                                            </td>
                                            <td>
                                            <button class="btn btn-danger" @click="changeStatus(user)" v-if="user.status">Desactivar</button>
                                            <button class="btn btn-success" @click="changeStatus(user)" v-else>Activar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul>
                            <!-- <li >{{ user.name }}</li> -->
                        </ul>
                        <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
 
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                laravelData: {},
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
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
      
                axios.get('/users?page=' + page)
                    .then(response => {
                        return response.data;
                    }).then(data => {
                        this.laravelData = data;
                    });
            }
        }
    }
</script>
<
  

</body>