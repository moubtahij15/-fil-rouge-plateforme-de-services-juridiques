<template lang="">
  <div>
    <!-- form for update info -->
    <form @submit="updateAvocatInfo">
      <!-- alert success update -->
      <div v-if="showSucess" class="w-full text-white bg-primary">
        <div
          class="container flex items-center justify-between px-6 py-4 mx-auto"
        >
          <div class="flex">
            <FIcons
              id="delete"
              :icon="['fas', 'check']"
              class="h-6 w-6 cursor-pointer"
            ></FIcons>
            <p class="mx-3">Bien modifié</p>
          </div>

          <button
            class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none"
            @click="this.showSucess = false"
          >
            <svg
              class="w-5 h-5"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M6 18L18 6M6 6L18 18"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
      </div>
      <!--  end alert success update -->
      <!--  start alert error update -->

      <div v-if="this.msgError" class="w-full text-white bg-red">
        <div
          class="container flex items-center justify-between px-6 py-4 mx-auto"
        >
          <div class="flex">
            <FIcons
              id="delete"
              :icon="['fas', 'circle-exclamation']"
              class="h-6 w-6 cursor-pointer"
            ></FIcons>

            <p class="mx-3">{{ this.msgError }}</p>
          </div>

          <button
            class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none"
            @click="this.msgError = ''"
          >
            <svg
              class="w-5 h-5"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M6 18L18 6M6 6L18 18"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
      </div>
      <!--  end alert error update -->

      <div class="bg-white p-3 mt-6 shadow-sm rounded-sm">
        <div
          class="flex items-center space-x-2 font-semibold text-gray-900 leading-8"
        >
          <span clas="text-green-500">
            <svg
              class="h-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              />
            </svg>
          </span>
          <span class="tracking-wide">About</span>
        </div>
        <div class="text-gray-700">
          <div class="grid md:grid-cols-2 text-sm">
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">Prenom</div>
              <input
                v-model="avocat.prenom"
                placeholder="prenom"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                required="required"
                type="text"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">Nom</div>
              <input
                placeholder="Nom"
                v-model="avocat.nom"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                required="required"
                type="text"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">email</div>
              <input
                placeholder="Email "
                v-model="avocat.email"
                class="appearance-none w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 py-2"
                required="required"
                type="email"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">ville</div>

              <select
                v-model="this.avocat.ville"
                required
                class="border p-2 rounded w-full"
              >
                <option
                  v-for="elem in $store.state.villes"
                  :value="elem.id"
                  :selected="avocat.ville == elem.id"
                >
                  {{ elem.nom }}
                </option>
              </select>
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">telephone</div>
              <input
                placeholder="tel"
                v-model="avocat.Tel"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                type="number"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">sexe</div>
              <select
                v-model="this.avocat.sexe"
                required
                class="border p-2 rounded w-full"
              >
                <option :value="'homme'" :selected="this.avocat.sexe == 'homme'">
                  homme
                </option>
                <option :value="'femme'" :selected="this.avocat.sexe == 'femme'">
                  femme
                </option>
              </select>
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">adresse</div>
              <input
                placeholder="tel"
                v-model="avocat.adresse"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                type="text"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">date_naissance</div>
              <input
                placeholder="date naissance"
                v-model="avocat.date_naissance"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                type="date"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
          </div>
        </div>
        <button
          type="submit"
          class="block w-full text-primary text-sm font-semibold rounded-lg hover:bg-primary focus:outline-none focus:shadow-outline hover:text-white hover:shadow-xs p-3 my-4"
        >
          Update
        </button>
      </div>
    </form>
    <!-- form for update password -->

    <form @submit="updateUserPass">
      <div class="flex mt-4">
        <FIcons :icon="['fas', 'lock']" class="h-6 w-6 cursor-pointer"></FIcons>

        <p
          class="px-4 text-primary hover:border-b-2 font-medium cursor-pointer"
        >
          changez le mot de Passe
        </p>
      </div>

      <div class="bg-white p-3 mt-6 shadow-sm rounded-sm">
        <div
          class="flex items-center space-x-2 font-semibold text-gray-900 leading-8"
        >
          <span clas="text-green-500">
            <svg
              class="h-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              />
            </svg>
          </span>
          <span class="tracking-wide">mot de passe</span>
        </div>
        <div class="text-gray-700">
          <div class="grid md:grid-cols-3 text-sm">
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">Mot de passe actuel</div>
              <input
                v-model="userPass.oldPass"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 py-2"
                required="required"
                type="password"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">Nouveau Mot de passe</div>
              <input
                v-model="userPass.newPass"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                required="required"
                type="password"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
            <div class="grid grid-cols-2 mt-4">
              <div class="px-4 py-2 font-semibold">
                Confirmez le Nouveau Mot de passe
              </div>
              <input
                v-model="userPass.confirm"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3 py-2"
                type="password"
                name="integration[shop_name]"
                id="integration_shop_name"
              />
            </div>
          </div>
        </div>
        <button
          type="submit"
          class="block w-full text-primary text-sm font-semibold rounded-lg hover:bg-primary focus:outline-none focus:shadow-outline hover:text-white hover:shadow-xs p-3 my-4"
        >
          Update
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import store from "../../../store";
import { mapActions } from "vuex";
export default {
  name: "formProfile",
  data() {
    return {
      showSucess: false,
      users: "",
      msgError: "",
      avocat: {
        id: "",
        nom: "",
        prenom: "",
        ville: "",
        Tel: "",
        password: "",
        email: "",
        date_naissance: "",
        sexe: "",
      },

      userPass: {
        newPass: "",
        oldPass: "",
        confirm: "",
        id: "",
      },
    };
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "updatePassUser",
      "updateInfoAvocat",
      "getVilles",
      "getCategorie",
      "registerUser",
      "isLogin",
      "getAvocats",
      "getAvocatsBySearch",
    ]),

    updateAvocatInfo(ev) {
      ev.preventDefault();
      console.log(this.avocat);
      this.updateInfoAvocat(this.avocat).then((response) => {
        this.showSucess = true;
        console.log(response);
      });
    },

    updateUserPass(ev) {
      ev.preventDefault();
      if (this.userPass.confirm == this.userPass.newPass) {
        this.updatePassUser(this.userPass).then((response) => {
          (this.userPass.confirm = ""), (this.userPass.oldPass = "");
          this.userPass.newPass = "";
          if (response.result == "erreur") {
            this.showSucess = false;
            this.msgError = response.message;
          } else {
            this.msgError = "";
            this.showSucess = true;
            // this.redirectTo({ val: "profileUser" });
          }
          console.log(response);
        });
      } else {
        (this.userPass.confirm = ""), (this.userPass.oldPass = "");
        this.userPass.newPass = "";
        this.showSucess = false;

        this.msgError =
          "La confirmation du mot de passe ne correspond pas au mot de passe";
      }
    },
  },
  mounted() {
    //
    //
    this.avocat = JSON.parse(sessionStorage.getItem("Avocat"));
    //     this.userPass.id = this.users.id;
    //     this.user.id = this.users.id;
    //     this.user.email = this.users.email;
    //     this.user.nom = this.users.nom;
    //     this.user.prenom = this.users.prenom;
    //     this.user.tel = this.users.tel;
    //     this.user.ville_id = this.users.ville_id;
    //

    this.getVilles().then((response) => {
      console.log(response);
      console.log(store.state.villes);
    });
  },
};
</script>
<style lang=""></style>
