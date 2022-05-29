import { createStore } from 'vuex'
import router from "../router";
import axiosClient from "../axios";


const store = createStore({
  state: {
    user: {

    },
    login: {
      email: "",
      pass: ""
    }


  },
  getters: {},

  actions: {

    redirectTo({ commit }, payload) {
      // eslint-disable-next-line no-undef
      commit("redirectTo", payload.val);
    },
    // start user actions
    // login user

    loginUser({ commit }, user) {

      return axiosClient.post('client/login', user)
        .then(response => {
          if (response.data.message == "success") {
            commit('setUser', response.data.client);
          }

          return response.data
        });
    },
    // end login user

    //  end user actions


  },
  mutations: {

    redirectTo(state, payload) {
      router.push({ name: payload });
    },
    // start user mutations
    // login user

    setUser: (state, user) => {
      state.user = user;

      // state.user.id = user.id;

      sessionStorage.setItem('idUser', state.user.id);
      // sessionStorage.setItem('userInfo', JSON.stringify(state.user.data));
      // sessionStorage.setItem('userInfos', "state.user.data");


    },
    // end login user
    //  end user mutations

  },
  modules: {},


})
export default store;
