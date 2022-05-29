import { createStore } from 'vuex'
import router from "../router";


const store = createStore({
  state: {


  },
  getters: {},

  actions: {
    redirectTo({ commit }, payload) {
      // eslint-disable-next-line no-undef
      commit("redirectTo", payload.val);
    },

  },
  mutations: {

    redirectTo(state, payload) {
      router.push({ name: payload });
    },

  },
  modules: {},


})
export default store;
