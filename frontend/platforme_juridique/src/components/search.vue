<template lang="">
   <div
                        class="w-full mx-auto   flex items-center  justify-center  rounded-md p-4  bg-white">

                        <div class="flex gap-2 flex-col  mx-auto  md:flex-row center wid">
                            <div class="relative flex-1">
                                <!-- <select class=""> -->
                                <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">nom</label>

                                     <select  v-model="this.avocat.idAvocat" required class="border p-2 rounded w-full" >
                                                                 <option ></option>
                                     <option v-for="elem in $store.state.avocats"  :value="elem.id" > {{ elem.prenom}}  {{elem.nom}}
                                                                </option>
                               
                            </select>

                                    <!-- <input  :value="tesst" class="form-select border p-2 rounded w-full " list="list" />
                            <datalist  id="list">
                            <option v-for="elem in $store.state.avocats"  :value="elem.prenom+' '+elem.nom " > 
                                </option>
                            </datalist> -->


                            </div>
                            <div class="relative self-center">

                            </div>
                            <div class="relative flex-1">
                                 <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">categorie</label>

                                     <select  v-model="this.avocat.idCategorie" required class="border p-2 rounded w-full" >
                                                                 <option ></option>
                              
                              <option v-for="elem in this.categories" :value="elem.id">{{elem.nom_categorie}} 
                                            </option>
                               
                            </select>
                            </div>
                            <div></div>
                            <div class="relative flex-1">
                                <!-- <select class=""> -->
                              <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">Ville</label>

                                     <select  v-model="this.avocat.idVille" required class="border p-2 rounded w-full" >
                                                                 <option ></option>
                             
                             <option v-for="elem in $store.state.villes" :value="elem.id">{{elem.nom}}</option>
                               
                            </select>


                            </div>
                           
                            
                            <div class=" relative flex-1  ">
                                <button @click="search"
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
                idVille: "",
                idCategorie: "",
                idAvocat: ""


            }, avocats: {
                idVille: "1",
                idCategorie: "3",
                idAvocat: "3"


            },
            categories: {

            },
            tesst: ""
        }
    },
    methods: {
        ...mapActions(["redirectTo", "getVilles", "getCategorie", "registerUser", "isLogin", "getAvocats", "getAvocatsBySearch"]),
        search() {
            console.log(this.avocat);
            this.getAvocatsBySearch(this.avocat)
                .then((response) => {
                    console.log(response);
                })
        }

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


        if (this.avocat.idAvocat == "" && this.avocat.idCategorie == "" && this.avocat.idVille == "") {


            this.getAvocatsBySearch(this.avocat)
                .then((response) => {
                    console.log(response);
                })
        }



    },


}
</script>
<style lang="">
    
</style>