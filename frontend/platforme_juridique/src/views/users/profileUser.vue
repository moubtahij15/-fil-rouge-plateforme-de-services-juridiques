<template lang="">


<div class="bg-gray-100">

    <!-- End of Navbar -->

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{avocat.nom}} {{avocat.nom}}</h1>
                  
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
               
                <!-- End of friends card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
              
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->

                   
					<!-- Navigation Bar -->

				<div class="flex flex-wrap mt-8 bg-white pb-3 rounded-2xl border-primary border-solid">
					<!-- <div class="grid gap-8 row-gap-8 ">
            class="grid gap-8 row-gap-8 lg:grid-cols-4"
          </div> -->
          <div class="grid lg:grid-cols-4 bg-white pb-3 rounded-2xl border-primary border-solid">

   
                    
                 	<div @click="choix('profile')" class="  py-3 w-full cursor-pointer md:w-1/2 lg:w-full   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/adistance.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Consultation Juridique</h3>
							</div>
					</div>   
          <div @click="choix('rdv')" class="  py-3 w-full cursor-pointer md:w-1/2 lg:w-full   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Consultation Juridique</h3>
							</div>
					</div>   
                    
					<div @click="choix('consultation')" class=" py-3 w-full cursor-pointer md:w-1/2 lg:w-full  border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/adistance.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Consultation Juridique</h3>
							</div>
					</div>
					<div  @click="choix('document')" class="w-full cursor-pointer md:w-1/2 lg:w-full     border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Télécharger ou rédiger  un document juridique </h3>
							</div>
					</div>
            
          </div>
         
					
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
                    <!-- rdv -->
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
					<div v-if="rdv">
											<Rendez_vous />

					</div>
                    <!-- <div c>
											<Rendez_vous />

					</div>
                    <div c>
											<Rendez_vous />

					</div> -->

            </div>
			
        </div>
    </div>
</div>
</template>
<script>
import store from "@/store";
import { mapActions } from "vuex";

import Rendez_vous from '@/components/rendez_vous.vue'
export default {
  name: "profileUser",
  data() {
    return {
      avocat: "",
      rdv: false,
      consultation: false,
      document: false,
      users: JSON.parse(sessionStorage.getItem('User')),

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
  components: {
    Rendez_vous
  },

  methods: {
    ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin", "getAvocats", "getAvocatsBySearch"]),

    choix(choix) {
      this.isLogin()
        .then((response) => {
          if (!response) {

            this.redirectTo({ val: "signIn" });
          }

        })
      if (choix == "rdv") {
        this.rdv = true
        this.consultation = false
        this.document = false

      } else if (choix == "consultation") {
        this.rdv = false
        this.consultation = true
        this.document = false

      } else if (choix == "document") {
        this.rdv = false
        this.consultation = false
        this.document = true

      }
    }
  },
  mounted() {
    console.log(this.users);

    this.user.email = this.users.email
    this.user.nom = this.users.nom
    this.user.prenom = this.users.prenom
    this.user.tel = this.users.tel
    this.user.ville_id = this.users.ville_id

    this.avocat = JSON.parse(sessionStorage.getItem('avocatProfile'));
    ;
  },

}
</script>
<style lang="">
    
</style>