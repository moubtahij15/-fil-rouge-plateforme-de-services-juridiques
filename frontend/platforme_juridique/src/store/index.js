import { createStore } from 'vuex'
import router from "../router";
import axiosClient from "../axios";
import axios from 'axios';


const store = createStore({
  state: {
    user: {

    },
    villes: {

    },
    avocats:{

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
    // start rgister user

    registerUser({ commit }, user) {

      return axiosClient.post('client/register', user)
        .then(response => {
          if (response.status == 200) {
            return response.data;

          }

        })
    },
    // end register user
    // check if is login
    isLogin({ commit }) {
      if (sessionStorage.getItem("idUser")) {
        return true
      }return false

    },
    // get ville

    getVilles({ commit }) {

      return axiosClient.get('client/villes')
        .then(response => {
          if (response.status == 200) {
            commit('setVilles', response.data.villes);

            return response.data;

          }

        })
    },
    // get categorie
    getCategorie({ commit }) {

      return axiosClient.get('Categorie')
        .then(response => {
          if (response.status == 200) {
            // commit('setAvocats', response.data.categorie);

            return response.data.categories;

          }

        })
    }


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
    // set villes
    setVilles: (state, villes) => {
      state.villes = villes;




    },
    //  end user mutations

  },
  modules: {},


})
export default store;
