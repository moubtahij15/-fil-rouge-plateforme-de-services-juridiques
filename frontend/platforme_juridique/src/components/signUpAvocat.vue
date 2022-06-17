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
          <div class="items-center -mx-2 md:flex">
            <div class="w-full mx-2">
              <label
                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                >Name</label
              >

              <input
                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                type="text"
              />
            </div>

            <div class="w-full mx-2 mt-4 md:mt-0">
              <label
                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                >E-mail</label
              >

              <input
                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                type="email"
              />
            </div>
          </div>
          <div class="items-center -mx-2 md:flex">
            <div class="relative">
              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Nom</label
              >
              <input
                v-model="user.nom"
                type="text"
                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                placeholder="Nom"
                required
              />
            </div>
            <div class="relative">
              <label
                class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                >Prenom</label
              >
              <input
                v-model="user.prenom"
                type="text"
                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
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
              v-model="user.email"
              type="text"
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="******@example.com"
              required
            />
          </div>
          <div class="relative">
            <!-- <option>{{ this.categEdit }}</option> -->

            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >Ville</label
            >
            <select
              v-model="this.user.ville_id"
              required
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
            >
              <option v-for="elem in $store.state.villes" :value="elem.id">
                {{ elem.nom }}
              </option>
            </select>
          </div>
          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >telephone</label
            >
            <input
              v-model="user.tel"
              type="number"
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="tel"
              required
            />
          </div>
          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >password</label
            >
            <input
              v-model="user.password"
              type="password"
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="password"
              required
            />
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
</template>
<script>
import { mapActions } from "vuex";
import store from "../store";

export default {
  name: "signUpAvocat",

  data() {
    return {
      user: {
        nom: "",
        prenom: "",
        email: "",
        tel: "",
        password: "",
        ville_id: "",
      },
      message: "",
    };
  },

  methods: {
    ...mapActions(["redirectTo", "getVilles", "registerUser", "isLogin"]),

    // register user
    register(ev) {
      ev.preventDefault();

      // store
      //     .dispatch('login', this.user)
      //     .then((response) => {

      //         console.log(response);
      //         if (response.data.message != "success") {
      //             this.error = true
      //         }
      //         this.redirectTo({ val: "HomePage" });
      //     })
      // console.log(this.$parent.$options.name)
      // console.log(this.user)

      if (this.$parent.$options.name == "signUp") {
        // $store.state.login.email
        this.registerUser(this.user).then((response) => {
          console.log(response);
          // this.user = ""
          this.user.email = "";
          this.user.nom = "";
          this.user.prenom = "";
          this.user.password = "";
          this.user.tel = "";
          this.user.ville_id = "";
          if (response.message == "bien creer") {
            // this.error = true
            this.redirectTo({ val: "signIn" });
          } else {
            this.message = response.message;
          }
          // this.redirectTo({ val: "HomePage" });
        });
      }
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
