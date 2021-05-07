<template>
<div>    
    <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand href="#">Muestra</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
            <b-nav-item href="#">Menu</b-nav-item>
        </b-navbar-nav>

        <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right>
            <template v-slot:button-content>
                {{usuario.email}}
            </template>
            <b-dropdown-item @click="Logout">Salir</b-dropdown-item>
            </b-nav-item-dropdown>
        </b-navbar-nav>
        </b-collapse>
    </b-navbar>
    <b-conainer fluid>
        <slot :name="'body'"/>
    </b-conainer>
</div>
</template>
<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
    computed:{
        ...mapGetters('StoreME',{
            usuario:'Getusuario'
        })
    },
    methods:{
        Logout: function(){
            axios.post('/logout').then((resultado)=>{
                window.location.href='/';
            })
        },
    }
}
</script>
<style scoped>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
</style>