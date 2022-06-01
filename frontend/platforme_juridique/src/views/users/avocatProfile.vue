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
                <div class="bg-white p-3 shadow-sm rounded-sm">
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
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Prenom</div>
                                <div class="px-4 py-2">{{avocat.nom}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2">{{avocat.prenom}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">sexe</div>
                                <div class="px-4 py-2">{{avocat.sexe}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact </div>
                                <div class="px-4 py-2">{{avocat.tel}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"> Address</div>
                                <div class="px-4 py-2">{{avocat.adresse}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">{{avocat.email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Avocat au Barreau</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" > {{avocat.ville}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Age</div>
                                <div class="px-4 py-2">Feb 06, 1998</div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->

                   
					<!-- Navigation Bar -->
				<div class="flex flex-wrap   mt-8 bg-white pb-3 rounded-2xl border-primary border-solid">
					<div   class="w-full cursor-pointer md:w-1/2 lg:w-1/3   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg" class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Rendez-vous</h3>
							</div>
					</div>
					<div class="w-full cursor-pointer md:w-1/2 lg:w-1/3   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/adistance.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Consultation Juridique</h3>
							</div>
					</div>
					<div  class="w-full cursor-pointer md:w-1/2 lg:w-1/3   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Télécharger ou rédiger  un document juridique </h3>
							</div>
					</div>
					
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
						<Rendez_vous/>

            </div>
			
        </div>
    </div>
</div>
</template>
<script>
import store from "@/store";
import Rendez_vous from '@/components/rendez_vous.vue'
export default {
	name: "avocatProfile",
	data() {
		return {
			avocat:""
		}
	},
	components:{
			Rendez_vous
	},
	mounted() {
		this.avocat=JSON.parse(sessionStorage.getItem('avocatProfile'));
;
	},

}
</script>
<style lang="">
    
</style>