import { createStore } from 'vuex'
import router from "../router";
import axiosClient from "../axios";
import axios from 'axios';


const store = createStore({
  state: {
    user: JSON.parse(sessionStorage.getItem("User")),
    villes: {

    },
    avocats: {

    },
    avocat: {

    },
    avocatsSearch: {

    },
    creneaux: {},

    avocatProfile: sessionStorage.getItem("avocatProfile"),

    choix: "1",

    consultations: [

    ],
    consultationEcrite: {},
    consultationTele: {},
    documentsAvocat: {},
    documentsClient: {}


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
      // console.log(JSON.parse(sessionStorage.getItem("User")).id)
      if (JSON.parse(sessionStorage.getItem("User"))) {
        return true
      } return false

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
    },
    // get avocats 

    getAvocats({ commit }) {

      return axiosClient.get('avocat')
        .then(response => {
          if (response.status == 200) {
            commit('setAvocats', response.data.Avocat);

            return response.data.Avocat;

          }

        })
    },
    //search avocats by nom/ville/categorie
    getAvocatsBySearch({ commit }, data) {

      return axiosClient.post('avocat/search', data)
        .then(response => {
          console.log(response);

          if (response.status == 200) {
            commit('setAvocatsSearch', response.data.Avocat);

            return response.data.Avocat;

          }

        })

    },
    //send data to avocat
    setDatatoAvocat({ commit }, data) {

      commit('SetAvocatProfile', data);

    },
    // get Creneaux
    getCreneaux({ commit }, date) {
      // console.log(date);
      // console.log(JSON.parse(sessionStorage.getItem('avocatProfile')).id);

      return axiosClient.post('creneau/read', {
        date: date,
        id_avocat: JSON.parse(sessionStorage.getItem('avocatProfile')).id
      })
        .then(response => {
          // console.log(response.data);
          console.log(response);

          if (response.status == 200) {
            commit('setCreneaux', response.data);
            console.log(response.data);
            return response.data;

          }

        })
    },
    // validate rdv
    vaidateRdv({ }, data) {
      return axiosClient.post('Rdv/create', data)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response.data;

          }

        })
    },
    // get choix profile
    getChoixProfile({ commit }, choix) {

      commit('setChoixProfile', choix);

    },
    // update info user
    updateInfoUser({ commit }, user) {

      return axiosClient.post('client/updateInfo', user)
        .then(response => {
          if (response.data.message == "bien modifié") {
            commit('setUser', response.data.client);
          }
          return response.data
        });
    },
    // update pass user
    updatePassUser({ commit }, pass) {

      return axiosClient.post('client/updatePass', pass)
        .then(response => {
          if (response.data.result == "success") {
            commit('setUser', response.data.client);
          }
          return response.data
        });
    },
    // get all rdv  user
    getRdvUser({ commit }, id) {

      return axiosClient.post('Rdv/read', {
        reff: id
      })
        .then(response => {

          return response.data
        });
    },
    // update sujet rdv
    updateSjtRdv({ commit }, rdv) {

      return axiosClient.post('Rdv/update', {
        id_RDV: rdv.id,
        date_creneau: rdv.date_creneau,
        id_client: sessionStorage.getItem('idUser'),
        id_creneau: rdv.id_creneau,
        sjt_RDV: rdv.sjt_RDV,
        id_avocat: rdv.id_avocat
      })
        .then(response => {

          return response.data
        });
    },

    // delete rdv
    deleteRdv({ commit }, rdv) {


      return axiosClient.post('Rdv/delete', {
        id_rdv: rdv.id,
        heure_debut: rdv.heure_debut,
        date_creneau: rdv.date_creneau,

      })
        .then(response => {

          return response.data
        });
    },

    valideConsultationTel({ }, data) {
      return axiosClient.post('ConsultationTel/create', data)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response.data;

          }

        })

    },
    // create sessionStripe
    stripe({ }, id) {
      return axiosClient.post('Stripe/getSession/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response;

          }

        })
    },
    // create sessionStripe for document
    stripeD({ }, id) {
      return axiosClient.post('Stripe/getSessionD/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response;

          }

        })
    },




    // get price of consultation
    // create consultation
    getconsultationInfo({ }, data) {

      return axiosClient.post('ConsultationEcrite/readPrixConsultaion', data)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response.data;

          }

        })
    },
    // create consultation
    valideConsultationEcrite({ }, data) {

      return axiosClient.post('ConsultationEcrite/create', data)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response.data;

          }

        })
    },

    //  end user actions
    // get all cosultations ecrit
    getConsultationsEcrite({ commit }, id) {

      return axiosClient.post('ConsultationEcrite/readAllconultationsEcrite/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setConsultationsEcrite', response.data);

            return response.data;

          }

        })
    },
    // get all cosultations ecrit
    getConsultationsTel({ commit }, id) {

      return axiosClient.post('/ConsultationTel/readAllconultationsTel/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setConsultationsTel', response.data);

            return response.data;

          }

        })
    },
    // get all cosultations ecrit for avocat
    getDocummentAvocat({ commit }, id) {

      return axiosClient.post('/Document/readByAvocat/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setDocuments', response.data);

            return response.data;

          }

        })
    },
    // get all cosultations ecrit for client
    getDocummentClient({ commit }, id) {

      return axiosClient.post('/Document/readByClient/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setDocumentsClient', response.data);

            return response.data;

          }

        })
    },
    // save document
    validerDocument({ }, data) {
      return axiosClient.post('Document/create', data)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            return response.data;

          }

        })

    },

    // end methods client
    // start method avocat
    // login avocat

    loginAvocat({ commit }, avocat) {

      return axiosClient.post('avocat/login', avocat)
        .then(response => {
          if (response.data.message == "success") {
            commit('setAvocat', response.data.avocat);
          }

          return response.data
        });
    },
    // end login avocat
    // start rgister avocat

    registerAvocat({ commit }, user) {

      return axiosClient.post('avocat/register', user)
        .then(response => {
          if (response.status == 200) {
            return response.data;

          }

        })
    },
    // end register avocat
    // check if is login
    isLoginAvocat({ commit }) {
      // console.log(JSON.parse(sessionStorage.getItem("User")).id)
      if (JSON.parse(sessionStorage.getItem("Avocat"))) {
        return true
      } return false

    },
    // update info user
    updateInfoAvocat({ commit }, avocat) {

      return axiosClient.post('avocat/updateInfo', avocat)
        .then(response => {
          console.log(response)

          if (response.data.message == "success") {
            console.log(response.data)
            commit('setAvocat', response.data.avocat);
          }
          return response.data
        });
    },
    // update pass user
    updatePassAvocat({ commit }, pass) {

      return axiosClient.post('avocat/updatePass', pass)
        .then(response => {
          console.log(response)
          console.log("response")

          if (response.data.result == "success") {
            commit('setAvocat', response.data.avocat);
          }
          return response.data
        });
    },
    // cchange etat rdv
    chageEtatRdv({ commit }, avocat) {

      return axiosClient.post('avocat/chageEtatRdv', avocat)
        .then(response => {
          console.log(response)
          // console.log("response")

          if (response.data.message == "success") {
            commit('setAvocat', response.data.avocat);
          }
          return response.data
        });
    },
    // update pass user
    getRdvAvocat({ commit }, id) {

      return axiosClient.post('avocat/rdvAvocat/' + id)
        .then(response => {
          console.log(response)
          // console.log("response")

          if (response.data.message == "success") {
            // commit('setAvocat', response.data.avocat);
          }
          return response.data
        });
    },
    // get all cosultations ecrit
    getConsultationsEcriteAvocat({ commit }, id) {

      return axiosClient.post('ConsultationEcrite/readAllconultationsEcriteAvocat/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setConsultationsEcrite', response.data);

            return response.data;

          }

        })
    },
    // get all cosultations ecrit
    getConsultationsTelAvocat({ commit }, id) {

      return axiosClient.post('/ConsultationTel/readAllconultationsTelAvocat/' + id)
        .then(response => {
          // console.log(response.data);

          if (response.status == 200) {
            console.log(response.data);
            commit('setConsultationsTel', response.data);

            return response.data;

          }

        })
    },


  },
  mutations: {

    redirectTo(state, payload) {
      router.push({ name: payload });
    },
    // start user mutations
    // login user

    setUser: (state, user) => {
      // state.user = user;

      // state.user.id = user.id;

      sessionStorage.setItem('idUser', user.id);
      sessionStorage.setItem('User', JSON.stringify(user));
      // sessionStorage.setItem('userInfo', JSON.stringify(state.user.data));
      // sessionStorage.setItem('userInfos', "state.user.data");


    },
    // end login user
    // set villes
    setVilles: (state, villes) => {
      state.villes = villes;





    },
    // set avocats
    setAvocats: (state, avocats) => {
      state.avocats = avocats;
      // sessionStorage.setItem('Avocat', JSON.stringify(avocats));


    },

    // set avocats search
    setAvocatsSearch: (state, avocats) => {
      state.avocatsSearch = avocats;

    },
    // set avocats Profile
    SetAvocatProfile: (state, avocats) => {
      sessionStorage.setItem('idUser', avocats);

    },
    // set creneaux
    setCreneaux: (state, creneaux) => {

      state.creneaux = creneaux;
      // console.log(state.creneaux);
    },
    // set choix profile
    setChoixProfile: (state, choix) => {

      state.choix = choix;
      // console.log(state.creneaux);
    },
    // set  all Consultation user
    setConsultations: (state, data) => {
      // const array3 = array1.concat(array2);

      Array.prototype.push.apply(state.consultations, data);

      // state.consultations.push(data);
      // console.log(state.consultations)

    },
    setConsultationsEcrite: (state, data) => {
      // const array3 = array1.concat(array2);

      // Array.prototype.push.apply(state.consultations, data);

      state.consultationEcrite = data;
      // console.log(state.consultations)

    },
    setConsultationsTel: (state, data) => {
      // const array3 = array1.concat(array2);
      state.consultationTele = data;

      // Array.prototype.push.apply(state.consultations, data);

      // state.consultations.push(data);
      // console.log(state.consultations)

    },
    // set Documents Avocat
    setDocuments: (state, data) => {
      // const array3 = array1.concat(array2);
      state.documentsAvocat = data;

      // Array.prototype.push.apply(state.consultations, data);

      // state.consultations.push(data);
      // console.log(state.consultations)

    },
    setDocumentsClient: (state, data) => {
      // const array3 = array1.concat(array2);
      state.documentsClient = data;

    },

    //  end user mutations
    // start avocat mutation
    // set avocats
    setAvocat: (state, avocat) => {
      state.avocat = avocat;
      sessionStorage.setItem('Avocat', JSON.stringify(avocat));


    },

  },
  modules: {},


})
export default store;
