<template>
    <div class="d-flex min- h-100">
        <div class="card mx-auto my-auto" style="width: 500px">
            <div class="card-header bg-dark">
                <h3 class="text-white">Reiniciar Contraseña</h3>
            </div>
            <div class="card-body bg-secondary">
                <form @submit.prevent="handleSubmit" >
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="user" />
                            </span>
                        </div>
                        <input v-model="email" name="usuario" v-validate="'required'" placeholder="Usuario JRI" class="form-control" :class="{ 'is-invalid': enviado && errors.has('usuario') }"/>
                    </div>
                    <div v-if="enviado && errors.has('usuario')" class="invalid-feedback text-light">Completa este campo</div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="key" />
                            </span>
                         </div>
                        <input type="password" v-model="password" placeholder="Password" v-validate="{ required: true, min: 8 }" name="password" class="form-control" :class="{ 'is-invalid': enviado && errors.has('password') }"  ref="password" />          
                        <div v-if="enviado && errors.has('password')" class="invalid-feedback text-light">Tu password debe tener almenos 8 carácteres</div>  
                    </div>
                        
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <font-awesome-icon icon="key"/>
                            </span>
                        </div>
                            <input type="password" placeholder="Confirmar Password"  v-validate="'required|confirmed:password'" name="confirm_password" class="form-control" :class="{ 'is-invalid': enviado && errors.has('confirm_password') }">
                            <div v-if="enviado && errors.has('confirm_password')" class="invalid-feedback text-light">Las contraseñas no coinciden</div>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-light float-right login_btn mr-2">
                            Reiniciar Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
import {alerta} from '../../../helpers/alerta.js';
export default {
    props:{
        ruta:{
            type:String,
        },
        token:{
            type:String,
        },
        email:{
            type:String,
        }
    },
    data(){
        return{
            password:'',
            enviado: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods:{
        Alerta:alerta.showAlert,
        handleSubmit() {
            this.enviado = true;
            this.$validator.validate().then(valid => {
                if (valid) {
                    this.Alerta("esperar_post","Se actualizó correctamente tu contraseña",{email: this.email,new_password:this.password,token:this.token},'/cambiar_pass').then((resultado)=>{
                        setTimeout(()=>{    
                            Axios.post('/logout').then((resultado)=>{
                                localStorage.clear();
                                window.location.href = "/login";
                            });
                        },2000)
                    });
                }
            });
        }
    },
};
</script>