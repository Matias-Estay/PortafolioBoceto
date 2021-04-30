<template>
    <div class="d-flex"> 
        <b-modal
        id="modal-prevent-closing"
        ref="modal"
        :title="primer_login==false?'Recuperación de contraseña':'Este es tu primer ingreso, por lo que se te solicita cambiar contraseña'"
        @show="resetModal"
        @hidden="resetModal"
        @hide="Evitar_cierre"
        @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                :state="nameState"
                label="Ingresa tu correo JRI"
                label-for="name-input"
                invalid-feedback="Ingresa un email válido"
                >
                <b-form-input
                    id="name-input"
                    v-model="email"
                    placeholder="Correo JRI"
                    :state="nameState"
                    required
                ></b-form-input>
                </b-form-group>
            </form>
            <template v-slot:modal-footer="{ok}">
                <b-button variant="success" @click="ok()">Aceptar</b-button>
                <b-button variant="danger" @click="Cerrar">Cancelar</b-button>
            </template>
        </b-modal>
    </div>
</template>

<script>
const axios = require('axios').default;
const $swal = require('sweetalert2').default;
import {alerta} from '../../../helpers/alerta';
export default {
    props:{
        ruta:{
            type:String,
            required: true,
        },
        primer_login:{
            type:Boolean,
            default:false
        },
    },
    data() {
        return {
        email: '',
        nameState: null,
        }
    },
    methods: {
        Alerta : alerta.showAlert,
        Evitar_cierre:function(e){
            if(this.primer_login){
                e.preventDefault();
            }
        },
        Cerrar: function(){
            if(this.primer_login){
                axios.post('../logout').then(respuesta => {
                    if (respuesta.status == 302 || 401)
                    {
                        localStorage.clear();
                        window.location.href = respuesta.request.responseURL;
                    }
                });
            }else{
                this.$bvModal.hide("modal-prevent-closing");
            }
        },
        checkFormValidity() {
            const valid = this.$refs.form.checkValidity()
            this.nameState = valid ? true : false
            return valid
        },
        resetModal() {
            this.email = ''
            this.nameState = null
        },
        handleOk(bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.handleSubmit()
        },
        handleSubmit() {
            // Exit when the form isn't valid
            if (!this.checkFormValidity()) {
                return
            }
            // Push the name to submitted names
            this.Alerta('esperar_post','Se ha enviado el correo con éxito, por favor revisa la bandeja de entrada de tu correo.',{email:this.email},this.ruta).then((resultado)=>{
                setTimeout(()=>{
                    if(this.primer_login){
                        axios.post('/logout').then(()=>{
                            window.location.href='/login';
                        });
                    }
                },2000);
            });
            this.$nextTick(() => {
                this.$refs.modal.hide()
            })
        }
    }
};
</script>