<template lang="">
    <div>
          <!-- form for update info -->
         <form v-if="!showPass" @submit="updateUser">
         

            <div class="bg-white p-3 mt-6 shadow-sm rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                <span clas="text-green-500">
                  <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </span>
                <span class="tracking-wide">About</span>
              </div>
              <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                  <div class="grid grid-cols-2  mt-4 ">
                    <div class="px-4 py-2 font-semibold">Prenom</div>
                    <input v-model="user.prenom" placeholder="prenom"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold">Nom</div>
                    <input placeholder="Nom" v-model="user.nom"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold">email</div>
                    <input placeholder="Email " v-model="user.email"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 py-2"
                      required="required" type="email" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold"> ville</div>

                                     <select  v-model="this.user.ville_id" required class="border p-2 rounded w-full" >
                             
                             <option v-for="elem in $store.state.villes" :value="elem.id"
                             :selected="this.user.idVille == elem.id">{{elem.nom}}</option>
                               
                            </select>


                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold"> telephone</div>
                    <input placeholder="old password" v-model="user.tel"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  

                </div>
                 

              </div>
              <button type="submit"
                class="block w-full text-primary text-sm font-semibold rounded-lg hover:bg-primary focus:outline-none focus:shadow-outline hover:text-white hover:shadow-xs p-3 my-4">Update
              
              </button>
            </div>
          </form>
                    <!-- form for update password -->

  <form v-if="!showPass" @submit="updateUser">
           <div class=" flex  mt-4">  

                        <FIcons id="delete" :icon="['fas', 'lock']" class="h-6 w-6 cursor-pointer"></FIcons>

                    <p class="px-4 text-primary  hover:border-b-2 font-medium cursor-pointer">changez le mot de Passe </p>

                 </div>

            <div class="bg-white p-3 mt-6 shadow-sm rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                <span clas="text-green-500">
                  <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </span>
                <span class="tracking-wide">mot de passe</span>
              </div>
              <div class="text-gray-700">
                <div class="grid md:grid-cols-3 text-sm">
                  
                  
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold"> Mot de passe actuel </div>
                    <input  v-model="userPass.old"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 py-2"
                      required="required" type="email" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold">  Nouveau Mot de passe </div>
                    <input  v-model="userPass.new"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold">  Confirmez le Nouveau Mot de passe </div>
                    <input  v-model="userPass.confirm"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  

                </div>
                 

              </div>
              <button type="submit"
                class="block w-full text-primary text-sm font-semibold rounded-lg hover:bg-primary focus:outline-none focus:shadow-outline hover:text-white hover:shadow-xs p-3 my-4">Update
              </button>
            </div>
          </form>

    </div>
</template>
<script>

import store from "../store";
import { mapActions } from "vuex";
export default {

  name: "profileInfoForm",
  data() {
    return {
      showPass: false,
      user: {
        nom: "",
        prenom: "",
        ville_id: "2",
        tel: "",
        password: "",
        email: ""
      },
      ide:2,

      userPass: {
        new: "",
        old: "",
        confirm: "",

      },

    }

  },
  methods: {
    ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin", "getAvocats", "getAvocatsBySearch"]),

  },
  mounted() {
    this.getVilles()
      .then((response) => {
        console.log(response);
        console.log(store.state.villes);
      })
  }
}
</script>
<style lang="">
    
</style>