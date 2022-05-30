<template lang="">
   <div
                        class="w-full mx-auto   flex items-center  justify-center  rounded-md p-4  bg-white">

                        <div class="flex gap-2 flex-col  mx-auto  md:flex-row center wid">
                            <div class="relative flex-1">
                                <input id="departure" value="" name="departure" type="text"
                                    class=" peer h-10 w-full border border-1.5 rounded-md border-primary-300 text-primary-900 placeholder-transparent focus:outline-none focus:border-b-600 focus:border-2 p-3"
                                    placeholder=" " />
                                <label for="departure"
                                    class="absolute left-2 px-1 -top-2.5 bg-white text-primary text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-blue-600 peer-focus:text-sm">avocat?
                                    :</label>
                                <div class="absolute right-0 top-0 mt-2 mr-2">

                                </div>
                            </div>
                            <div class="relative self-center">

                            </div>
                            <div class="relative flex-1">
                                 <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">categorie</label>

                                     <select  v-model="this.avocat.categorie_id" required class="border p-2 rounded w-full" >
                                <option v-for="elem in this.categories" :value="elem.id">{{elem.nom_categorie}}</option>
                               
                            </select>
                            </div>
                            <div></div>
                            <div class="relative flex-1">
                                <!-- <select class=""> -->
                              <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">Ville</label>

                                     <select  v-model="this.avocat.ville_id" required class="border p-2 rounded w-full" >
                                <option v-for="elem in $store.state.villes" :value="elem.id">{{elem.nom}}</option>
                               
                            </select>


                            </div>
                            <div class=" relative flex-1  ">
                                <button
                                    class="bg-white py-3 px-5 text-primary font-semibold rounded-lg hover:shadow-lg  transition duration-3000 cursor-pointer">Rechercher</button>
                            </div>
                        </div>


                    </div>
</template>
<script>
import store from "../store";
import { mapActions } from "vuex";

export default {
    name: "search",
    data() {
        return {
            avocat: {
                ville_id: "",
                categorie_id: ""
            },
            categories: {

            }
        }
    },
    methods: {
        ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin"]),

    },
    mounted() {
        this.getVilles()
            .then((response) => {
                console.log(response);
                console.log(store.state.villes);
            })
        this.getCategorie()
            .then((response) => {
                console.log(response);
                this.categories = response;
            })
    },

}
</script>
<style lang="">
    
</style>