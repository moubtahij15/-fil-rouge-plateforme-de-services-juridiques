<template lang="">
    <div>
         <form @submit="updateUser">

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
                    <input placeholder="date de naissance" v-model="user.ville_id"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4">
                    <div class="px-4 py-2 font-semibold"> telephone</div>
                    <input placeholder="old password" v-model="user.tel"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-2 mt-4 ">
                    <div class="px-4 py-2 font-semibold">new password</div>
                    <input placeholder="new password" v-model="user.tel"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>

                </div>
              </div>
              <button type="submit"
                class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Update
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

            user: {
                nom: "",
                prenom: "",
                ville_id: "",
                tel: "",
                password: "",
                email: ""
            },  
        }
    },
}
</script>
<style lang="">
    
</style>