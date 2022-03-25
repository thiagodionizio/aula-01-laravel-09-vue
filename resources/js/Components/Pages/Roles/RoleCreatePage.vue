<template>
    <div class="container-fluid">
        <div class="row">
            <div class="content text-center" v-if="loading">
                <i class="fas fa-spin fa-sync-alt"></i>
            </div>
            <div v-else class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Perfil</h3>

                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" :class="this.errors.name?'is-invalid':''"
                                       v-model="role.name" placeholder="Digite o nome">
                                <div class="invalid-feedback" v-if="this.errors.name">
                                    <strong>{{ this.errors.name }}</strong>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info" @click="createRole"> Salvar</button>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RoleCreatePage.vue",
    data() {
        return {
            loading: false,
            role:{
                name:null,
            },
            errors:{
                name:null
            }
        }
    },
    methods:{
        createRole(){
            this.loading = true;
            let url = `/api/v1/roles`;
            axios.post(url, this.role)
                .then((response) => {
                    Swal.fire({
                        title: "Sucesso",
                        html: response.data.message,
                        timer: 800,
                        timerProgressBar: true,
                        position: 'top-end',
                    })

                }).catch(e => Swal.fire('Opps', e.toString(), 'error')).finally(() => this.loading = false);
        }
    }
}
</script>

<style scoped>

</style>
