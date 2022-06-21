<template lang="">
  <!-- component -->
  <!-- component -->
  <div class="w-full mx-auto my-4 border-b-2 pb-4">
  <div
      class="w-full flex items-center my-auto justify-center p-4 sm:flex"
      v-if="this.service == 0"
    >
      <p class="text-2xl text-primary md:text-3xl font-light leading-normal">
      ce service est desactivé par ce avocat
      </p>
    </div>
    
    <div class="flex pb-3 mx-auto w-full"  v-if="this.service == 1" >
      <div class="flex-1">
        <div
          :class="step1 ? 'bg-primary text-white ' : 'bg-white'"
          class="w-10 h-10 border-grey-light mx-auto rounded-full text-lg flex items-center"
        >
          <span class="text-center w-full">1</span>
        </div>
      </div>

      <div
        class="w-1/6 align-center items-center align-middle content-center flex"
      >
        <div
          class="w-full bg-primary rounded items-center align-middle align-center flex-1"
        >
          <div
            class="bg-primary text-xs leading-none py-1 text-center text-primary rounded"
          ></div>
        </div>
      </div>

      <div class="flex-1">
        <div
          :class="step2 ? 'bg-primary text-white ' : 'bg-white'"
          class="w-10 h-10 border-grey-light mx-auto rounded-full text-lg flex items-center"
        >
          <span class="text-center w-full">2</span>
        </div>
      </div>

      <div
        class="w-1/6 align-center items-center align-middle content-center flex"
      >
        <div
          class="w-full bg-primary rounded items-center align-middle align-center flex-1"
        >
          <div
            class="bg-primary text-xs leading-none py-1 text-center text-primary rounded"
          ></div>
        </div>
      </div>

      <div class="flex-1">
        <div
          :class="step3 ? 'bg-primary text-white ' : 'bg-white'"
          class="w-10 h-10 border-grey-light mx-auto rounded-full text-lg flex items-center"
        >
          <span class="text-center w-full">3</span>
        </div>
      </div>

      <div class="flex-1"></div>
    </div>

    <!-- step1 horaires -->
    <div
      v-if="step1 && this.service == 1"
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
    >
      <h2
        class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto"
      >
        Vos préférences horaires :
      </h2>

      <div
        class="-my-2 py-2 overflow-x-auto mx-auto max-w-xl mb-10 sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8"
      >
        <div class="col-lg-12 mt-5">
          <label
            class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
            >DATE</label
          >

          <input
            type="text"
            placeholder="date Creneau"
            class="border p-2 rounded w-full"
            onfocus="(this.type = 'date')"
            :min="this.min"
            v-model="date_creneau"
            required
          />
        </div>
        <div
          class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg"
        >
          <table class="mx-auto">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider"
                >
                  heure
                </th>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
                ></th>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
                ></th>

                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider"
                >
                  action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr v-for="elem in $store.state.creneaux" :key="elem.id">
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"
                >
                  <div class="flex items-center">
                    <div>
                      <div class="text-sm leading-5 text-gray-800">
                        {{ elem.heure_debut }}
                      </div>
                    </div>
                  </div>
                </td>
                <td></td>
                <td></td>

                <td
                  class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"
                >
                  <button
                    class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none"
                    @click="dateValidate(elem)"
                  >
                    choisie
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- step2 -->
    <div
      v-if="step2"
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
    >
      <h2
        class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto"
      >
        Entrer votre Sujet :
      </h2>
      <div class="w-full mt-4">
        <textarea
          v-model="this.rdv.sjt_RDV"
          class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
        ></textarea>
      </div>
      <button
        class="mt-3 px-5 py-2 border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none"
        @click="validationRdv"
      >
        Valider
      </button>
    </div>
    <!-- step3 -->
    <div
      v-if="step3"
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
    >
      <div class="bg-gray-100 h-screen">
        <div class="bg-white1 p-6 md:mx-auto">
          <svg viewBox="0 0 24 24" class="text-primary w-16 h-16 mx-auto my-6">
            <path
              fill="currentColor"
              d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
            ></path>
          </svg>
          <div class="text-center">
            <h3
              class="md:text-2xl text-base text-gray-900 font-semibold text-center"
            >
              votre rendez-vous est bien passé
            </h3>

            <p class="text-primary y-2">
              vous pouvez voir ton rendez-vous sur votre profile
            </p>
            <p>Passez une bonne journée !</p>
          </div>
        </div>
      </div>
    </div>

    <!-- component -->
    <!-- <div   class="max-w-xl mt-5  md:mx-auto sm:text-center lg:max-w-xl ">
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto">
           Entrer votre Sujet :                
                       
                </h2>
                
                                        <button class=" mt-3 px-5 py-2  border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none">Valider</button>

</div> -->
  </div>
</template>
<script>
import store from "../store";
import { mapActions } from "vuex";

export default {
  name: "Rendez_vous",
  data() {
    return {
      
      service: JSON.parse(sessionStorage.getItem("avocatProfile")).serviceRdv,

      rdv: {
        id_creneau: "",
        date_creneau: "",
        sjt_RDV: "",
        id_client: sessionStorage.getItem("idUser"),
        id_avocat: JSON.parse(sessionStorage.getItem("avocatProfile")).id,
      },
      date_creneau: "",

      step1: true,
      step2: false,
      step3: false,
      min: "",
    };
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "getVilles",
      "getCategorie",
      "registerUser",
      "isLogin",
      "getAvocats",
      "getAvocatsBySearch",
      "getCreneaux",
      "vaidateRdv",
    ]),

    dateValidate(elem) {
      (this.step1 = false), (this.step2 = true);
      this.rdv.date_creneau = this.date_creneau;
      this.rdv.id_creneau = elem.id;
      console.log(this.rdv);
    },
    validationRdv() {
      console.log(this.rdv);

      this.vaidateRdv(this.rdv).then((response) => {
        console.log(response);
        if (response.message == "Created") {
          this.step3 = true;
          this.step2 = false;
          // this.step1 = false;
        }
      });
    },
  },
  watch: {
    date_creneau(value) {
      this.getCreneaux(value);
    },
  },
  mounted() {
    this.min = new Date().toISOString().slice(0, 10);

    this.getCreneaux(this.rdv.date_creneau).then((response) => {
      console.log(response);
      console.log(store.state.creneaux);
    });
    // console.log(store.state.creneaux)
  },
};
</script>
<style lang=""></style>
