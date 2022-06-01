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
               
                    <img src="../../assets/Profile.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Profile</h3>
							</div>
					</div>   
          <div @click="choix('rdv')" class="  py-3 w-full cursor-pointer md:w-1/2 lg:w-full   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl">Rendez-vous</h3>
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
					<div  @click="choix('document')" class=" py-3 w-full cursor-pointer md:w-1/2 lg:w-full     border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/document.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl">mes document</h3>
							</div>
					</div>
            
          </div>
         
					
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
                    <!-- rdv -->
                    
					<div v-if="this.profile">
											<ProfilFormUser />

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

import ProfilFormUser from '@/components/profileFormUser.vue'
export default {
  name: "profileUser",
  data() {
    return {
      avocat: "",
      profile: true,
      consultation: false,
      document: false,
      users: JSON.parse(sessionStorage.getItem('User')),

    }
  },
  components: {
    ProfilFormUser
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