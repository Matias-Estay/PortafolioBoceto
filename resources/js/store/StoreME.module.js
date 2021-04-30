const state={
    usuario:null,
}

const actions = {
    Asignar_usuario({commit},usuario){
        commit('Setusuario',usuario);
    },
}

const mutations = {
    Setusuario(state,usuario){
        state.usuario=usuario;
    },
}

const getters = {
    Getusuario: state=>{
        return state.usuario;
    },
}

export const StoreME = {
    namespaced: true,
    state,
    actions,
    mutations,
    getters,
}