<template>
	<article class="d-flex h-100">
		<div class="card my-auto mx-auto" style="width: 500px; opacity: 0.89;">
			<div class="card-header bg-dark">
				<h3 class="text-white">Ingreso</h3>
			</div>
			<div class="card-body bg-secondary">
				<form @submit.prevent="handleSubmit">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<font-awesome-icon far :icon="'user'" />
							</span>
						</div>
						<input
							type="text"
							v-model="email"
							placeholder="Usuario"
							v-validate="'required'"
							name="usuario"
							class="form-control"
							:class="{
								'is-invalid': enviado && errors.has('usuario')
							}"
						/>
						<div
							v-if="enviado && errors.has('usuario')"
							class="invalid-feedback text-light"
						>
							Completa este campo
						</div>
					</div>
					<div class="input-group form-group d-flex">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<font-awesome-icon icon="key" />
							</span>
						</div>
						<input
							type="password"
							v-model="password"
							name="contraseña"
							v-validate="'required'"
							class="form-control"
							:class="{
								'is-invalid':
									enviado && errors.has('contraseña')
							}"
							placeholder="Contraseña"
						/>
						<div
							v-if="enviado && errors.has('contraseña')"
							class="invalid-feedback text-light"
						>
							Completa este campo
						</div>
					</div>
					<div class="form-check remember">
						<input
							class="form-check-input"
							type="checkbox"
							value
							id="recordar"
						/>
						<label
							class="form-check-label text-white"
							for="recordar"
							>Recordarme</label
						>
					</div>
					<div class="form-group row ml-1">
						<input
							type="submit"
							value="Ingresar"
							class="col-md-4 h-25 btn bg-light"
						/>
						<ul style="list-style:none; " class="col">
							<li>
								<!--<router-link class="badge badge-dark" to="/pwd_reset">Recuperar Contraseña</router-link>-->
							</li>
							<li>
								<send-email :ruta="ruta_contraseña" />
								<b-button
									class="badge btn-link bg-dark text-white"
									v-b-modal.modal-prevent-closing
									>Recuperar contraseña</b-button
								>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</article>
</template>
<script>
const axios = require("axios").default;
import { alerta } from "../../helpers/alerta";
import { mapActions } from "vuex";
export default {
	props: {
		ruta_login: {
			type: String
		},
		ruta_contraseña: {
			type: String
		},
	},
	data() {
		return {
			email: "",
			password: "",
			enviado: false,
			logeado: false
		};
	},
	mounted(){
		if(this.$route.fullPath=='/login?session_timeout=1'){
			this.showAlert("advertencia","Su sesión ha expirado")
		}
	},
	methods: {
		...mapActions("StoreME", {
			Asignar_usuario: "Asignar_usuario"
		}),
		showAlert: alerta.showAlert,
		handleSubmit() {
			this.enviado = true;
			const { email, password } = this;
			console.log("aqui");
			this.$validator.validate().then(valid => {
				if (valid && email && password) {
					console.log("aca");
					axios
						.post(this.ruta_login, this.$data)
						.then(respuesta => {
							axios
								.get("/usuario")
								.then(respuesta_usuario => {
									console.log(respuesta_usuario.data);
									this.Asignar_usuario(
										respuesta_usuario.data[0]
									);
									window.location.href = respuesta.request.responseURL;
								});
							
						})
						.catch(() => {
							this.showAlert(
								"error",
								"Usuario o contraseña incorrectos."
							);
						});
				}
			});
		}
	}
};
</script>
