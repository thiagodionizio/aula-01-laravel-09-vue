<template>
    <div class="container-fluid">
        <div class="row">
            <div class="content text-center" v-if="loading">
                <i class="fas fa-spin fa-sync-alt"></i>
            </div>
            <div v-else class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Perfis</h3>
                        <div class="card-tools">
                            <a href="/roles/create">Cadastrar novo perfil</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="role in this.roles">
                                    <td>{{ role.id }}</td>
                                    <td>{{ role.name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning"
                                           v-bind:href="`roles/${role.id}/edit`">Editar</a>
                                        <button class="btn btn-sm btn-danger" @click="deleteRole(role)">Apagar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loading: false,
            roles: [],
            role: {
                name: null,
            }
        }
    },

    created() {
        this.getData();
    },
    methods: {
        getData() {
            this.loading = true;
            let url = `api/v1/roles`;
            axios.get(url).then((response) => {
                this.roles = response.data;
            }).catch(e => Swal.fire('Opps', e.toString(), 'error')).finally(() => this.loading = false);
        },
        deleteRole(role) {
            let url = ` api/v1/roles/${role.id}`;
            this.loading = true;
            axios.delete(url)
                .then((response) => {
                    let index = this.roles.findIndex((roleIndex) => role.id == roleIndex.id);
                    this.roles.splice(index, 1);
                }).catch(e => Swal.fire('Opps', e.toString(), 'error')).finally(() => this.loading = false);
        }
    }
}
</script>
