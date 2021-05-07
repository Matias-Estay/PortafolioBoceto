<template>      
    <article class="d-flex min- h-100">
        <div class="card  my-auto mx-auto" style="width: 500px; opacity: 0.89;">
            <div class="card-header bg-dark">
                <h3 class="text-white">Registro</h3>
            </div>
            <div class="card-body bg-secondary">
                <form @submit.prevent="handleSubmit" >
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="user" />
                            </span>
                        </div>
                        <input v-model="email" name="usuario" v-validate="'required'" placeholder="Correo" class="form-control" :class="{ 'is-invalid': enviado && errors.has('usuario') }"/>
                        <div v-if="enviado && errors.has('usuario')" class="invalid-feedback text-light">Completa este campo</div>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="user" />
                            </span>
                        </div>
                        <input v-model="name" name="nombre" v-validate="'required'" placeholder="Nombre" class="form-control" :class="{ 'is-invalid': enviado && errors.has('nombre') }"/>
                        <div v-if="enviado && errors.has('nombre')" class="invalid-feedback text-light">Completa este campo</div>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="key" />
                            </span>
                        </div>
                        <input type="password" v-model="password" placeholder="Contraseña" v-validate="{ required: true, min: 8 }" name="password" class="form-control" :class="{ 'is-invalid': enviado && errors.has('password') }"  ref="password" />
                        <div v-if="enviado && errors.has('password')" class="invalid-feedback text-light">Tu password debe tener almenos 8 carácteres</div>        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="key" />
                            </span>
                        </div>
                            <input type="password" placeholder="Confirmar Contraseña"  v-validate="'required|confirmed:password'" name="confirm_password" class="form-control" :class="{ 'is-invalid': enviado && errors.has('confirm_password') }">
                            <div v-if="enviado && errors.has('confirm_password')" class="invalid-feedback text-light">Las contraseñas no coinciden</div>
                        </div>        
                    <div class="form-group">
                        <button type="submit" class="btn bg-light float-right login_btn mr-2">
                            Registrar
                        </button>
                    </div>     
                </form>                          
            </div>
        </div>
    </article>
</template>
<script>
const axios=require('axios').default;
import {alerta} from '../../helpers/alerta'
export default {
    props:{
        ruta:{
            type:String,
            default:'/test'
        },
    },
    data () {
        return {
            name: '',
            email: '',
            password: '',
            enviado: false
        }
    },
    methods: {
        handleSubmit() {
            this.enviado = true;
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.post(this.ruta, this.$data).then(respuesta=>{
                        window.location.href = respuesta.request.responseURL;
                    }).catch(()=>{
                        alerta.showAlert("error","No se puede registrar un usuario que ya existe");
                    });
                }
            });
        }
    }
};
</script>
