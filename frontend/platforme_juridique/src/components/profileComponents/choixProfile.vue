<template lang="">
    <div class="grid lg:grid-cols-4 bg-white pb-3 rounded-2xl border-primary border-solid">

   
                    
                 	<div   @click="choix(1)" class="  py-3 w-full cursor-pointer md:w-1/2 lg:w-full   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2"
                                     :class = "($store.state.choix==1)?'  shadow-xl  transform transition duration-300  -translate-y-2 ':''">
                            
                            <div class="px-6">
               
                    <img src="../../assets/Profile.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Profile</h3>
							</div>
					</div>   
                    <div @click="choix(2)" class="  py-3 w-full cursor-pointer md:w-1/2 lg:w-full   border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2"
                                               :class = "($store.state.choix==2)?'  shadow-xl  transform transition duration-300  -translate-y-2 ':''">
							<div class="px-6">
                    <img src="../../assets/Calendarsvg.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl">Rendez-vous</h3>
							</div>
					</div>   
                    
					<div   :class = "($store.state.choix==3)?'  shadow-xl  transform transition duration-300  -translate-y-2 ':''"

                    @click="choix(3)" class=" py-3 w-full cursor-pointer md:w-1/2 lg:w-full  border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/adistance.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl"> Consultation Juridique</h3>
							</div>
					</div>
					<div    :class = "($store.state.choix==4)?'  shadow-xl  transform transition duration-300  -translate-y-2 ':''"

                     @click="choix(4)"  class=" py-3 w-full cursor-pointer md:w-1/2 lg:w-full     border-solid lg:mb-0    px-12  bg-white1 border-b hover:bg-white hover:shadow-xl border-primary transform transition duration-300  hover:-translate-y-2">
							<div class="px-6">
                    <img src="../../assets/document.svg"  class=" w-12 h-12  mx-auto text-deep-purple-accent-400 sm:w-20 sm:h-20">
						</div>
						<div class="px-6">
						<h3 class="m-0 text-xl font-medium leading-tight border-0 border-gray-300 lg:text-xl md:text-2xl">mes document</h3>
							</div>
					</div>
            
          </div>
</template>
<script>
// import store from "../store";
import { mapActions } from "vuex";
export default {
    name: "choixProfile",
    methods: {
        ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin", "getAvocats", "getAvocatsBySearch", "getCreneaux", "vaidateRdv", "getChoixProfile"]),

        choix(choix) {
            this.isLogin()
                .then((response) => {
                    if (!response) {

                        this.redirectTo({ val: "signIn" });
                    }

                })
            this.getChoixProfile(choix)
        }
    },
}
</script>
<style lang="">
    
</style>