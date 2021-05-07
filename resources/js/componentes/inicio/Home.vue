<template>
    <layout>
        <template v-slot:body>
            <div class="row" id="banner">
                <div class="col-md-12 col-sm-12 col-xs-12" :style="{'max-height': 300+'px'}">
                    <b-img src="/Imagenes/banner perfil.png" class="position-relative w-100 h-100" :style="{top: 0,left: 0}"/>
                    <b-container fluid>
                        <div class="row">
                            <b-img :src="imagen"  class="rounded-circle position-absolute" :style="{top: 8+'%',left: 5+'%', 'max-width': 250+'px', 'min-width': 250+'px', 'min-height': 250+'px', 'max-height': 250+'px'}"/>
                            <h1 class="position-absolute text-light" :style="{top: 12+'%',left: 24+'%','text-shadow': 0+' '+ 0+' '+' ' +12+'px black'}">{{usuario.name}}</h1>
                        </div>
                    </b-container>
                </div>
            </div>
                <div class="row" id="nav_editar">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <b-navbar toggleable="lg" type="dark" variant="secondary">
                            <b-navbar-nav>
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-inicio-tab" data-toggle="pill" href="#pills-inicio" role="tab" aria-controls="pills-inicio" aria-selected="true">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-documentos-tab" data-toggle="pill" href="#pills-documentos" role="tab" aria-controls="pills-documentos" aria-selected="true">Documentos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="pills-fht-tab" data-toggle="pill" href="#pills-fht" role="tab" aria-controls="pills-fht" aria-selected="true">Fichas de Hallazgos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="pills-pruebas-tab" data-toggle="pill" href="#pills-pruebas" role="tab" aria-controls="pills-pruebas" aria-selected="true">Pruebas ME-AM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-mesa-ayuda-tab" data-toggle="pill" href="#pills-mesa-ayuda" role="tab" aria-controls="pills-mesa-ayuda" aria-selected="false">Mesa de ayuda</a>
                                    </li>
                                </ul>
                            </b-navbar-nav>
                            <!-- Right aligned nav items -->
                            <b-navbar-nav class="ml-auto">
                                <b-nav-form>
                                    <b-button size="sm" class="my-2 my-sm-0" :href="'/inicio/perfil/editarperfil'+usuario.id" type="submit"><font-awesome-icon icon="cog"/> Editar perfil</b-button>
                                </b-nav-form>
                            </b-navbar-nav>
                        </b-navbar>
                    </div>
                </div>
                <div class="row h-100">
                    <div class="tab-content w-100" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-inicio" role="tabpanel" aria-labelledby="pills-inicio-tab">
                            <br/>
                            <br/>
                            <b-container fluid>
                                <b-form-file v-model="archivo" size="sm"/>
                                <b-button @click="Generar_excel" variant="success"><font-awesome-icon icon="file-excel"/>Descargar</b-button>
                            </b-container>
                            <b-container fluid>
                                <div class="row pl-4 pr-4">
                                    <div class="col-md-3">
                                        <b-calendar v-model="hoy" id="calendario-readonly" readonly disabled></b-calendar>
                                    </div>
                                    <div class="col-md-9">
                                        <b-container fluid>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="row card-header border border-dark ml-2 mr-2">
                                                        <font-awesome-icon icon="envelope"/>
                                                        <h6 class="ml-3">
                                                            {{usuario.email}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="row card-header border border-dark ml-2 mr-2">
                                                        <font-awesome-icon icon="phone"/>
                                                        <h6 class="ml-3">
                                                            {{usuario.anexo==''?'Anexo no disponible':usuario.anexo}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="row card-header border border-dark ml-2 mr-2">
                                                        <font-awesome-icon icon="birthday-cake"/>
                                                        <h6 class="ml-3">
                                                            {{usuario.fecha_nacimiento}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="row card-header border border-dark ml-2 mr-2">
                                                        <font-awesome-icon icon="globe-americas"/>
                                                            <h6 class="ml-3">
                                                                {{usuario.nacionalidad}}
                                                            </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </b-container>
                                    </div>
                                </div>
                            </b-container>
                        </div>
                        <div class="tab-pane fade w-100 pr-3 pl-3" id="pills-documentos" role="tabpanel" aria-labelledby="pills-documentos-tab">
                            <br/>
                            <h6>Tus Documentos:</h6>
                            <hr/>
                            
                        </div>
                        <div class="tab-pane fade w-100 pr-3 pl-3" id="pills-fht" role="tabpanel" aria-labelledby="pills-fht-tab">
                            <br/>    
                            <h6>Fichas de Hallazgos Tecnológicos:</h6>
                            <hr/>
                            <hallazgos :id="id"/>
                        </div>
                        <div class="tab-pane fade w-100 pr-3 pl-3" id="pills-pruebas" role="tabpanel" aria-labelledby="pills-pruebas-tab">
                            <br/> 
                            <b-container fluid>
                                <h6>Libreria docxtemplate: /helpers/archivos_template.js</h6>
                                <b-button size="sm" @click="Descargar_documento">Prueba de descarga template docx</b-button>
                            </b-container>
                        </div>
                        <div class="tab-pane fade w-100 pr-3 pl-3" id="pills-mesa-ayuda" role="tabpanel" aria-labelledby="pills-mesa-ayuda-tab">
                            <b-container fluid>
                                <div class="row">
                                    <div class="col-md-5">
                                        <mesa-ayuda/>
                                    </div>
                                    <div class="col-md-7">
                                        <b-container fluid class="mt-4">
                                            <h6>Tus tickets</h6>
                                            <div class="row">
                                                <div class="col-md-3">            
                                                    <b-pagination
                                                        v-model="pagina"
                                                        :total-rows="tamano"
                                                        :per-page="por_pagina"
                                                        aria-controls="tabla-tickets"
                                                    />
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="d-flex w-100" style="min-height:1.5rem;" >
                                                        <font-awesome-icon icon="search" class='mr-1'/>
                                                        <b-form-input v-model="busqueda" placeholder="Buscar"/>
                                                    </span>
                                                </div>
                                            </div>
                                        </b-container>
                                        <hr/>
                                        <b-table id="tabla-tickets" :per-page="por_pagina" :current-page="pagina" :fields="fields" :items="filtro" small>
                                            <template v-slot:cell(sigla)="rowContent">
                                                <p v-b-popover.hover.top="rowContent.item.nombre_area" class="m-0 p-0">{{rowContent.item.sigla}}</p>
                                            </template>
                                            <template v-slot:cell(opciones)="rowContent">
                                                <b-button size="sm" variant="info" @click="$bvModal.show('Detalle-ticket'+rowContent.item.id)">
                                                    <font-awesome-icon icon="eye"/>
                                                    <b-modal :id="'Detalle-ticket'+rowContent.item.id" :title="'Detalle del ticket N°: '+rowContent.item.nro_ticket" size="xl">
                                                        <detalle-ticket :id_ticket="String(rowContent.item.id)" :info_ticket="rowContent.item"/>
                                                        <template v-slot:modal-footer="{cancel}">
                                                            <b-button variant="danger" @click="cancel()">Cerrar</b-button>
                                                        </template>
                                                    </b-modal>
                                                </b-button>
                                            </template>
                                        </b-table>
                                    </div>
                                </div>
                            </b-container>
                        </div>
                    </div>
                </div>
        </template>
    </layout>
</template>
<script>
import Layout from '../reutilizables/Layout.vue';
import { mapGetters } from 'vuex';
export default {
    components:{
      'layout':Layout  
    },
    computed:{
        ...mapGetters('StoreME',{
            usuario:'Getusuario'
        })
    },
    mounted(){
        this.Fecha_actual();
    },
    data(){
        return{
            hoy:'',
			imagen: '/Imagenes/user.png',
            archivo:null,
        }
    },
    methods:{
        Generar_excel: function(){ 
            XlsxPopulate.fromDataAsync(this.archivo).then(function (workbook) {
                workbook.sheet(0).cell("A1").value("This was created in the browser!").style("fontColor", "ff0000");
                workbook.outputAsync({ type: '' }).then(function (blob) {
                if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveOrOpenBlob(blob, "out.xlsx");
                } else {
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    document.body.appendChild(a);
                    a.href = url;
                    a.download = "out.xlsx";
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                    }
                })
                .catch(function (err) {
                    alert(err.message || err);
                    throw err;
                });
            });
        },
        Fecha_actual: function(){    
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.hoy = yyyy + '-' + mm + '-' + dd;
        },
    },
}
</script>
