import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);



const dialog = {
    state:{
          dialog_pertanyaan: false,
          dialog_jawaban: false
    }
}

const items = {
    state:{
        items:[]
    }
}

export const store = new Vuex.Store({
    modules:{
        dialog: dialog,
        items: items
    },
    state: {
            loader: false
        },
        mutations: {
            LOADER(state, payload) {
                state.loader = payload
            }
        }
   
})