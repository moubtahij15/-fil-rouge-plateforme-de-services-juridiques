<template lang="">
   <div
                        class="w-full mx-auto   flex items-center  justify-center  rounded-md p-4  bg-white">

                        <div class="flex gap-2 flex-col  mx-auto  md:flex-row center wid">
                            <div class="relative flex-1">
                                <!-- <select class=""> -->
                              <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">nom</label>

                                    <input  :value="tesst" class="form-select border p-2 rounded w-full " list="list" />
                            <datalist  id="list">
                            <option v-for="elem in $store.state.avocats"  :value="elem.prenom+' '+elem.nom+' '+elem.id " > 
                                </option>
                            </datalist>
{{this.tesst}}

                            </div>
                            <div class="relative self-center">

                            </div>
                            <div class="relative flex-1">
                                 <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">categorie</label>

                                     <select  v-model="this.avocat.categorie_id" required class="border p-2 rounded w-full" >
                                <option v-for="elem in this.categories" :value="elem.id">{{elem.nom_categorie}} 
                                            </option>
                               
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

            },
            tesst: ""
        }
    },
    methods: {
        ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin", "getAvocats"]),

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
        this.getAvocats()
            .then((response) => {
                console.log(response);
                console.log(store.state.avocats);
            })

    },


}
</script>
<style lang="">
    
</style>