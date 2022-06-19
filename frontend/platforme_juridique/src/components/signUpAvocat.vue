<template lang="">
  <div class="relative z-10 w-full max-w-2xl lg:mt-0 lg:w-5/12">
    <form name="form" @submit="register">
      <div
        class="relative z-10 flex flex-col items-start justify-start p-10 bg-white shadow-2xl rounded-xl"
      >
        <div
          v-if="message"
          class="flex w-full max-w-sm mx-auto overflow-hidden bg-white1 rounded-lg shadow-md dark:bg-gray-800"
        >
          <div class="flex items-center justify-center w-12 bg-red">
            <svg
              class="w-6 h-6 text-white1 fill-current"
              viewBox="0 0 40 40"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"
              />
            </svg>
          </div>

          <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
              <span class="font-semibold text-red dark:text-red">Erreur</span>
              <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ this.message }}
              </p>
            </div>
          </div>
        </div>

        <h4 class="w-full font-serif text-4xl font-medium leading-snug">
          Inscription
        </h4>

        <p class="text-md mx-auto mt-3 text-center">
          Déja inscrit ?
          <a
            @click="redirectTo({ val: 'signIn' })"
            class="text-blue cursor-pointer underline"
            >Connectez-vous</a
          >
        </p>
        <div class="relative w-full mt-6 space-y-8">
          <div class="items-center md:flex">
            <div class="relative">
              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Nom</label
              >
              <input
                v-model="avocat.nom"
                type="text"
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                placeholder="Nom"
                required
              />
            </div>
            <div class="relative ml-4">
              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Prenom</label
              >
              <input
                v-model="avocat.prenom"
                type="text"
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                placeholder="Prenom"
                required
              />
            </div>
          </div>

          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >Email</label
            >
            <input
              v-model="avocat.email"
              type="text"
              class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="******@example.com"
              required
            />
          </div>
          <div class="items-center w-full md:flex">
            <div class="relative w-full mr-3">
              <!-- <option>{{ this.categEdit }}</option> -->

              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Ville</label
              >
              <select
                v-model="this.avocat.ville_id"
                required
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              >
                <option v-for="elem in $store.state.villes" :value="elem.id">
                  {{ elem.nom }}
                </option>
              </select>
            </div>
            <div class="relative w-full">
              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >telephone</label
              >
              <input
                v-model="avocat.tel"
                type="number"
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                placeholder="tel"
                required
              />
            </div>
          </div>
          <div class="items-center w-full md:flex">
            <div class="relative w-full">
              <label
                class="absolute text-xs px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Date naissance</label
              >
              <input
                v-model="avocat.date_naissance"
                type="date"
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                placeholder="tel"
                required
              />
            </div>

            <div class="relative w-full ml-3">
              <!-- <option>{{ this.categEdit }}</option> -->

              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >sexe</label
              >
              <select
                v-model="this.avocat.sexe"
                required
                class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              >
                <option :value="'homme'">homme</option>
                <option :value="'femme'">femme</option>
              </select>
            </div>
          </div>
          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >Adresse</label
            >
            <input
              v-model="avocat.adresse"
              type="text"
              class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="Adresse"
              required
            />
          </div>
          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >password</label
            >
            <input
              v-model="avocat.password"
              type="password"
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="password"
              required
            />
          </div>
          <div class="relative w-full mr-3">
            <!-- <option>{{ this.categEdit }}</option> -->

            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >specialité</label
            >
            <select
              v-model="this.avocat.categorie"
              required
              class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
            >
              <option v-for="elem in categories" :value="elem.id">
                {{ elem.nom_categorie }}
              </option>
            </select>
          </div>
          <div class="relative">
            <button
              type="submit"
              class="inline-block w-full px-5 py-4 text-xl font-medium text-center text-primary transition duration-200 bg-yellow-300 rounded-lg hover:bg-gray ease"
            >
              Submit
            </button>
          </div>
        </div>
      </div>
    </form>

    <svg
      class="absolute top-0 left-0 z-0 w-32 h-32 -mt-12 -ml-12 text-gray-200 fill-current"
      viewBox="0 0 91 91"
      xmlns="http://www.w3.org/2000/svg"
    >
      <g stroke="none" stroke-width="1" fill-rule="evenodd">
        <g fill-rule="nonzero">
          <g>
            <g>
              <circle cx="3.261" cy="3.445" r="2.72"></circle>
              <circle cx="15.296" cy="3.445" r="2.719"></circle>
              <circle cx="27.333" cy="3.445" r="2.72"></circle>
              <circle cx="39.369" cy="3.445" r="2.72"></circle>
              <circle cx="51.405" cy="3.445" r="2.72"></circle>
              <circle cx="63.441" cy="3.445" r="2.72"></circle>
              <circle cx="75.479" cy="3.445" r="2.72"></circle>
              <circle cx="87.514" cy="3.445" r="2.719"></circle>
            </g>
            <g transform="translate(0 12)">
              <circle cx="3.261" cy="3.525" r="2.72"></circle>
              <circle cx="15.296" cy="3.525" r="2.719"></circle>
              <circle cx="27.333" cy="3.525" r="2.72"></circle>
              <circle cx="39.369" cy="3.525" r="2.72"></circle>
              <circle cx="51.405" cy="3.525" r="2.72"></circle>
              <circle cx="63.441" cy="3.525" r="2.72"></circle>
              <circle cx="75.479" cy="3.525" r="2.72"></circle>
              <circle cx="87.514" cy="3.525" r="2.719"></circle>
            </g>
            <g transform="translate(0 24)">
              <circle cx="3.261" cy="3.605" r="2.72"></circle>
              <circle cx="15.296" cy="3.605" r="2.719"></circle>
              <circle cx="27.333" cy="3.605" r="2.72"></circle>
              <circle cx="39.369" cy="3.605" r="2.72"></circle>
              <circle cx="51.405" cy="3.605" r="2.72"></circle>
              <circle cx="63.441" cy="3.605" r="2.72"></circle>
              <circle cx="75.479" cy="3.605" r="2.72"></circle>
              <circle cx="87.514" cy="3.605" r="2.719"></circle>
            </g>
            <g transform="translate(0 36)">
              <circle cx="3.261" cy="3.686" r="2.72"></circle>
              <circle cx="15.296" cy="3.686" r="2.719"></circle>
              <circle cx="27.333" cy="3.686" r="2.72"></circle>
              <circle cx="39.369" cy="3.686" r="2.72"></circle>
              <circle cx="51.405" cy="3.686" r="2.72"></circle>
              <circle cx="63.441" cy="3.686" r="2.72"></circle>
              <circle cx="75.479" cy="3.686" r="2.72"></circle>
              <circle cx="87.514" cy="3.686" r="2.719"></circle>
            </g>
            <g transform="translate(0 49)">
              <circle cx="3.261" cy="2.767" r="2.72"></circle>
              <circle cx="15.296" cy="2.767" r="2.719"></circle>
              <circle cx="27.333" cy="2.767" r="2.72"></circle>
              <circle cx="39.369" cy="2.767" r="2.72"></circle>
              <circle cx="51.405" cy="2.767" r="2.72"></circle>
              <circle cx="63.441" cy="2.767" r="2.72"></circle>
              <circle cx="75.479" cy="2.767" r="2.72"></circle>
              <circle cx="87.514" cy="2.767" r="2.719"></circle>
            </g>
            <g transform="translate(0 61)">
              <circle cx="3.261" cy="2.846" r="2.72"></circle>
              <circle cx="15.296" cy="2.846" r="2.719"></circle>
              <circle cx="27.333" cy="2.846" r="2.72"></circle>
              <circle cx="39.369" cy="2.846" r="2.72"></circle>
              <circle cx="51.405" cy="2.846" r="2.72"></circle>
              <circle cx="63.441" cy="2.846" r="2.72"></circle>
              <circle cx="75.479" cy="2.846" r="2.72"></circle>
              <circle cx="87.514" cy="2.846" r="2.719"></circle>
            </g>
            <g transform="translate(0 73)">
              <circle cx="3.261" cy="2.926" r="2.72"></circle>
              <circle cx="15.296" cy="2.926" r="2.719"></circle>
              <circle cx="27.333" cy="2.926" r="2.72"></circle>
              <circle cx="39.369" cy="2.926" r="2.72"></circle>
              <circle cx="51.405" cy="2.926" r="2.72"></circle>
              <circle cx="63.441" cy="2.926" r="2.72"></circle>
              <circle cx="75.479" cy="2.926" r="2.72"></circle>
              <circle cx="87.514" cy="2.926" r="2.719"></circle>
            </g>
            <g transform="translate(0 85)">
              <circle cx="3.261" cy="3.006" r="2.72"></circle>
              <circle cx="15.296" cy="3.006" r="2.719"></circle>
              <circle cx="27.333" cy="3.006" r="2.72"></circle>
              <circle cx="39.369" cy="3.006" r="2.72"></circle>
              <circle cx="51.405" cy="3.006" r="2.72"></circle>
              <circle cx="63.441" cy="3.006" r="2.72"></circle>
              <circle cx="75.479" cy="3.006" r="2.72"></circle>
              <circle cx="87.514" cy="3.006" r="2.719"></circle>
            </g>
          </g>
        </g>
      </g>
    </svg>
    <svg
      class="absolute bottom-0 right-0 z-0 w-32 h-32 -mb-12 -mr-12 text-yellow-400 fill-current"
      viewBox="0 0 91 91"
      xmlns="http://www.w3.org/2000/svg"
    >
      <g stroke="none" stroke-width="1" fill-rule="evenodd">
        <g fill-rule="nonzero">
          <g>
            <g>
              <circle cx="3.261" cy="3.445" r="2.72"></circle>
              <circle cx="15.296" cy="3.445" r="2.719"></circle>
              <circle cx="27.333" cy="3.445" r="2.72"></circle>
              <circle cx="39.369" cy="3.445" r="2.72"></circle>
              <circle cx="51.405" cy="3.445" r="2.72"></circle>
              <circle cx="63.441" cy="3.445" r="2.72"></circle>
              <circle cx="75.479" cy="3.445" r="2.72"></circle>
              <circle cx="87.514" cy="3.445" r="2.719"></circle>
            </g>
            <g transform="translate(0 12)">
              <circle cx="3.261" cy="3.525" r="2.72"></circle>
              <circle cx="15.296" cy="3.525" r="2.719"></circle>
              <circle cx="27.333" cy="3.525" r="2.72"></circle>
              <circle cx="39.369" cy="3.525" r="2.72"></circle>
              <circle cx="51.405" cy="3.525" r="2.72"></circle>
              <circle cx="63.441" cy="3.525" r="2.72"></circle>
              <circle cx="75.479" cy="3.525" r="2.72"></circle>
              <circle cx="87.514" cy="3.525" r="2.719"></circle>
            </g>
            <g transform="translate(0 24)">
              <circle cx="3.261" cy="3.605" r="2.72"></circle>
              <circle cx="15.296" cy="3.605" r="2.719"></circle>
              <circle cx="27.333" cy="3.605" r="2.72"></circle>
              <circle cx="39.369" cy="3.605" r="2.72"></circle>
              <circle cx="51.405" cy="3.605" r="2.72"></circle>
              <circle cx="63.441" cy="3.605" r="2.72"></circle>
              <circle cx="75.479" cy="3.605" r="2.72"></circle>
              <circle cx="87.514" cy="3.605" r="2.719"></circle>
            </g>
            <g transform="translate(0 36)">
              <circle cx="3.261" cy="3.686" r="2.72"></circle>
              <circle cx="15.296" cy="3.686" r="2.719"></circle>
              <circle cx="27.333" cy="3.686" r="2.72"></circle>
              <circle cx="39.369" cy="3.686" r="2.72"></circle>
              <circle cx="51.405" cy="3.686" r="2.72"></circle>
              <circle cx="63.441" cy="3.686" r="2.72"></circle>
              <circle cx="75.479" cy="3.686" r="2.72"></circle>
              <circle cx="87.514" cy="3.686" r="2.719"></circle>
            </g>
            <g transform="translate(0 49)">
              <circle cx="3.261" cy="2.767" r="2.72"></circle>
              <circle cx="15.296" cy="2.767" r="2.719"></circle>
              <circle cx="27.333" cy="2.767" r="2.72"></circle>
              <circle cx="39.369" cy="2.767" r="2.72"></circle>
              <circle cx="51.405" cy="2.767" r="2.72"></circle>
              <circle cx="63.441" cy="2.767" r="2.72"></circle>
              <circle cx="75.479" cy="2.767" r="2.72"></circle>
              <circle cx="87.514" cy="2.767" r="2.719"></circle>
            </g>
            <g transform="translate(0 61)">
              <circle cx="3.261" cy="2.846" r="2.72"></circle>
              <circle cx="15.296" cy="2.846" r="2.719"></circle>
              <circle cx="27.333" cy="2.846" r="2.72"></circle>
              <circle cx="39.369" cy="2.846" r="2.72"></circle>
              <circle cx="51.405" cy="2.846" r="2.72"></circle>
              <circle cx="63.441" cy="2.846" r="2.72"></circle>
              <circle cx="75.479" cy="2.846" r="2.72"></circle>
              <circle cx="87.514" cy="2.846" r="2.719"></circle>
            </g>
            <g transform="translate(0 73)">
              <circle cx="3.261" cy="2.926" r="2.72"></circle>
              <circle cx="15.296" cy="2.926" r="2.719"></circle>
              <circle cx="27.333" cy="2.926" r="2.72"></circle>
              <circle cx="39.369" cy="2.926" r="2.72"></circle>
              <circle cx="51.405" cy="2.926" r="2.72"></circle>
              <circle cx="63.441" cy="2.926" r="2.72"></circle>
              <circle cx="75.479" cy="2.926" r="2.72"></circle>
              <circle cx="87.514" cy="2.926" r="2.719"></circle>
            </g>
            <g transform="translate(0 85)">
              <circle cx="3.261" cy="3.006" r="2.72"></circle>
              <circle cx="15.296" cy="3.006" r="2.719"></circle>
              <circle cx="27.333" cy="3.006" r="2.72"></circle>
              <circle cx="39.369" cy="3.006" r="2.72"></circle>
              <circle cx="51.405" cy="3.006" r="2.72"></circle>
              <circle cx="63.441" cy="3.006" r="2.72"></circle>
              <circle cx="75.479" cy="3.006" r="2.72"></circle>
              <circle cx="87.514" cy="3.006" r="2.719"></circle>
            </g>
          </g>
        </g>
      </g>
    </svg>
  </div>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div
    class="relative z-10"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
  >
    <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->

    <div class="fixed z-10 inset-0 overflow-y-auto" v-if="succus">
      <div
        class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0"
      >
        <div
          class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div
                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
              >
                <!-- Heroicon name: outline/exclamation -->
              </div>
              <FIcons
                v-if="!this.user"
                id="delete"
                :icon="['fas', 'check']"
                class="h-6 w-6 cursor-pointer"
              />
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900"
                  id="modal-title"
                >
                  Bien inscrit
                </h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    votre compte a bien été créé mais non activé notre équipe
                    vous appellera pour le validé.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              @click="redirectTo({ val: 'sign-in' })"
              type="button"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-primary hover:text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
            >
              compris
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</template>
<script>
import { mapActions } from "vuex";
import store from "../store";

export default {
  name: "signUpAvocat",

  data() {
    return {
      avocat: {
        nom: "",
        prenom: "",
        email: "",
        tel: "",
        password: "",
        ville_id: "",
        adresse: "",
        date_naissance: "",
        sexe: "",
        categorie:""
      },
      message: "",
      succus: false,
      categories:"",
    };
  },

  methods: {
    ...mapActions(["redirectTo", "getVilles", "registerAvocat", "isLogin","getCategorie"]),

    // register user
    register(ev) {
      ev.preventDefault();

      console.log(this.avocat);

      // $store.state.login.email
      this.registerAvocat(this.avocat).then((response) => {
        console.log(response);
        // this.user = ""
        this.avocat.email = "";
        this.avocat.nom = "";
        this.avocat.prenom = "";
        this.avocat.password = "";
        this.avocat.tel = "";
        this.avocat.ville_id = "";
        this.avocat.sexe = "";
        this.avocat.date_naissance = "";
        this.avocat.adresse = "";
        if (response.message == "bien creer") {
          // this.error = true
          this.succus = true;
          //   this.redirectTo({ val: "sign-up" });
        } else {
          this.message = response.message;
        }
        // this.redirectTo({ val: "HomePage" });
      });

      //  else if (this.$parent.$options.name == 'LoginAdmin') {

      //     this.admin.reff_admin = this.user.email;
      //     this.admin.pass = this.user.pass;

      //     store
      //         .dispatch('loginAdmin', this.admin)
      //         .then((response) => {

      //             console.log(response);
      //             if (response.message != "success") {
      //                 this.error = true

      //             } else if (response.message == "success") {

      //                 this.redirectTo({ val: "dashboardAdmin" });

      //             }
      //         })

      // }
    },
  },
  mounted() {
     this.getCategorie().then((response) => {
      console.log(response);
      this.categories = response;
    });
    this.getVilles().then((response) => {
      console.log(response);
      console.log(store.state.villes);
    });
    this.isLogin().then((response) => {
      if (response) {
        this.redirectTo({ val: "homeView" });
      }
    });
  },
};
</script>
<style lang=""></style>
