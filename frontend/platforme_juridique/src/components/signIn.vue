<template lang="">
  <div class="relative z-10 w-full max-w-2xl mt-20 lg:mt-0 lg:w-5/12">
    <form @submit="login">
      <!-- erreur message  -->
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
        <!-- end erreur message -->

        <h4 class="w-full font-serif text-4xl font-medium leading-snug">
          Connectez-vous
        </h4>

        <p class="text-md mx-auto mt-3 text-center">
          Vous êtes nouveau ?
          <a
            @click="redirectTo({ val: 'signUp' })"
            class="text-blue cursor-pointer underline"
            >inscrit-vous</a
          >
        </p>
        <div class="relative w-full mt-6 space-y-8">
          <div class="relative">
            <label
              class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
              >Email</label
            >
            <input
              v-model="user.email"
              type="email"
              class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
              placeholder="******@example.com"
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
              Valider
            </button>
          </div>
          <div class="relative">
            <button
              type="submit"
              class="inline-block w-1/2 px-3 py-2 text-md font-medium text-center text-white1 transition duration-200 bg-yellow-300 rounded-lg bg-primary ease"
            >
              je suis Avocat
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
import { mapState } from "vuex";
import store from "../store";

export default {
  name: "signInComponent",

  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      message: "",
      //
    };
  },
  methods: {
    ...mapActions(["redirectTo", "loginUser", "isLogin"]),

    //user methods
    login(ev) {
      ev.preventDefault();

      // console.log(this.$parent.$options.name)

      if (this.$parent.$options.name == "signIn") {
        // $store.state.login.email
        this.loginUser(this.user).then((response) => {
          console.log(response);
          (this.user.email = ""), (this.user.password = "");
          if (response.message == "success") {
            // this.error = true
            console.log("z");
            console.log(this.$parent.$parent.$parent.navChange());

            this.redirectTo({ val: "homeView" });
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
    // console.log(this.$store.state.login.email);
    // console.log(this.$store.state.login.pass);
  },
};
</script>
<style lang=""></style>
