<template>
	<section class="w-100 h-100">
		<article class="h-75 p-5">
			<img src="/Imagenes/logo_vue.png" style="height:125px; width:140px; position: absolute; margin-top:25%" class="image-fluid"/>
		</article>
		
		<footer class="pl-5 pr-5">
			<button class="btn btn-light w-100" @click="Expander">
				<font-awesome-icon v-if="size_b==0" icon="angle-double-up"/>
				<font-awesome-icon v-if="size_b!=0" icon="angle-double-down"/>
			</button>
			<div :style="{height:size_b+'px', transition:1+'s'}">
				<b-card header="Contacto" header-tag="header">
					<b-card-text>
						<div class="row">
							<div class="col">
								<b-list-group>
									<b-list-group-item>
										<font-awesome-icon icon="envelope-square"/>
										Correo: matias.estay@hotmail.com
									</b-list-group-item>
									<b-list-group-item>
										<font-awesome-icon icon="phone-square-alt"/>
										Teléfono: +569 79994195
									</b-list-group-item>
									<b-list-group-item>
										<b-icon icon="linkedin"/>
										<a href="https://www.linkedin.com/in/mat%C3%ADas-ignacio-estay-cubillos-30295217a/">
										Linkedin: https://www.linkedin.com/in/mat%C3%ADas-ignacio-estay-cubillos-30295217a/
										</a>
									</b-list-group-item>
								</b-list-group>
							</div>
							<div class="col">
								<b-list-group>
									<b-list-group-item>
										<font-awesome-icon icon="map-marker-alt"/>
										Dirección: Luis Uribe 2343, Ñuñoa, Santiago.
									</b-list-group-item>
								</b-list-group>
							</div>
						</div>      
					</b-card-text>
				</b-card>
			</div>
		</footer>
	</section>
</template>
<script>
export default {
	data(){
		return{
			size_b:0,
		}
	},
	methods:{
		Expander:function(){
			this.size_b=this.size_b==0?230:0;
		}
	}
}
</script>
<style scoped>
footer{
	position: absolute;
	bottom: 0;
	width: 100%;      
}
</style>