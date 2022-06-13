<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
    <div class="w-full text-primary shadow bg-white">
      <div
        class="container flex items-center justify-between px-6 py-4 mx-auto"
      >
        <div class="flex">
          <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
            <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
            ></path>
          </svg>

          <p class="mx-3 font-bold">
            vous pouvez annuler votre rendez-vous (d'une limite 1 h avant le
            rendez-vous).​
          </p>
        </div>

        <button
          class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none"
        >
          <svg
            class="w-5 h-5"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6 18L18 6M6 6L18 18"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </div>
    <!-- alert update sucess -->
    <div v-if="this.msg" class="w-full text-white bg-primary">
      <div
        class="container flex items-center justify-between px-6 py-4 mx-auto"
      >
        <div class="flex">
          <FIcons
            id="delete"
            :icon="['fas', 'check']"
            class="h-6 w-6 cursor-pointer"
          ></FIcons>

          <p class="mx-3">
            {{ this.msg }}
          </p>
        </div>

        <button
          class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none"
          @click="this.msg = ''"
        >
          <svg
            class="w-5 h-5"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6 18L18 6M6 6L18 18"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </div>

    <!--  alert erro canceling  -->

    <div v-if="this.msg1" class="w-full text-white bg-red">
      <div
        class="container flex items-center justify-between px-6 py-4 mx-auto"
      >
        <div class="flex">
          <FIcons
            id="delete"
            :icon="['fas', 'check']"
            class="h-6 w-6 cursor-pointer"
          ></FIcons>

          <p class="mx-3">
            {{ this.msg1 }}
          </p>
        </div>

        <button
          class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none"
          @click="this.msg = ''"
        >
          <svg
            class="w-5 h-5"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6 18L18 6M6 6L18 18"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </div>

    <!-- table rdv -->
    <!-- component -->
    <section
      v-if="!this.consultation.sujet"
      class="container mx-auto p-6 font-mono"
    >
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">avocat</th>
                <th class="px-4 py-3">sujet</th>
                <th class="px-4 py-3">date</th>

                <th class="px-4 py-3">heure</th>
                <th class="px-4 py-3">type</th>
                <th class="px-4 py-3">etat</th>
                <th class="px-4 py-3">montant</th>
                <th class="px-4 py-3">Voir</th>
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in this.consultations"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom }} {{ elem.prenom }}</p>
                </td>

                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center cursor-pointer"
                >
                  {{ elem.sujet }}
                </td>
                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center"
                >
                  {{ elem.date_creneau }}
                  {{ elem.date }}
                </td>

                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.heure_debut }}
                    {{ elem.heure }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.type }}
                  </span>
                </td>
                <td class="text-xs">
                  <span
                    class="bg-primary w-1/2 px-4 py-3 text-white rounded-md px-2"
                  >
                    {{ elem[0].etat }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.prix }}DH
                  </span>
                </td>

                <td class="px-4 py-3 text-sm">
                  <button
                    @click="voirConsultationEcrite(elem)"
                    class="flex-no-shrink px-5 py-2 text-xs shadow-sm hover:shadow-lg font-bold tracking-wider border-2 hover:bg-primary hover:text-white text-primary rounded-full transition ease-in duration-300"
                  >
                    VOIR
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <div
      v-if="this.consultation.type == 'telephonique'"
      class="w-full h-64 flex flex-col justify-between dark:bg-gray-800 bg-white dark:border-gray-700 rounded-lg border border-gray-400 mb-6 py-5 px-4"
    >
      <div>
        <h3
          class="text-gray-800 dark:text-gray-100 leading-7 font-semibold w-11/12"
        >
          Votre Sujet :
        </h3>

        <p
          class="text-start flex-start mt-10 text-gray-800 dark:text-gray-100 leading-2"
        >{{this.consultation.sujet}}
        </p>
      </div>
      <div>
        <div class="flex items-center">
          <div
            class="border border-gray-300 dark:border-gray-700 rounded-full px-3 py-1 dark:text-gray-400 text-gray-600 text-xs flex items-center"
            aria-label="due on"
            role="contentinfo"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-alarm"
              width="16"
              height="16"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z"></path>
              <circle cx="12" cy="13" r="7"></circle>
              <polyline points="12 10 12 13 14 13"></polyline>
              <line x1="7" y1="4" x2="4.25" y2="6"></line>
              <line x1="17" y1="4" x2="19.75" y2="6"></line>
            </svg>
            <p class="ml-2 dark:text-gray-400">7 Sept, 23:00</p>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="this.consultation.type == 'ecrite'"
      class="w-full px-5 flex flex-col mb-8 overflow-hidden rounded-lg shadow-lg justify-between"
    >
      <div class="flex flex-col mt-5">
        <div class="flex justify-end mb-4">
          <div
            class="mr-2 py-3 px-4 bg-white rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-primary"
          >
            {{ this.consultation.sujet }}
          </div>

          <img
            src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
            class="object-cover h-8 w-8 rounded-full"
            alt=""
          />
        </div>
        <div class="flex justify-start mb-4">
          <img
            src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
            class="object-cover h-8 w-8 rounded-full"
            alt=""
          />
          <div
            class="ml-2 py-3 px-4 bg-primary rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
          >
            {{ this.consultation.reponse }}
          </div>
        </div>
      </div>
      <!--<div class="py-5">
          <input
            class="w-full bg-gray-300 py-5 px-3 rounded-xl"
            type="text"
            placeholder="type your message here..."
          />
        </div>-->
    </div>
    <!-- end message -->
    <div class="w-2/5 border-l-2 px-5"></div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import store from "../../../store";
export default {
  name: "rdvUser",
  data() {
    return {
      rdv: {},
      showModal: false,
      sjt_post: "",
      rdvUpdate: {},
      msg: "",
      msg1: "",
      consultations: [],
      consultation: {
        type: "",
        sujet: "",
        reponse: "",
        date: "",
        heure: "",
      },
    };
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "getVilles",
      "deleteRdv",
      "getCategorie",
      "registerUser",
      "isLogin",
      "getAvocats",
      "getAvocatsBySearch",
      "getCreneaux",
      "vaidateRdv",
      "getRdvUser",
      "updateSjtRdv",
      "getConsultationsEcrite",
      "getConsultationsTel",
    ]),

    toggleModal(elm) {
      this.showModal = !this.showModal;

      this.sjt_post = elm.sjt_RDV;
      this.rdvUpdate = elm;
    },
    getAllRdv() {
      this.getRdvUser(JSON.parse(sessionStorage.getItem("User")).id).then(
        (response) => {
          this.rdv = response;
          console.log(this.rdv);
        }
      );
    },
    updatePost() {
      this.rdvUpdate.sjt_RDV = this.sjt_post;

      this.updateSjtRdv(this.rdvUpdate).then((response) => {
        this.getAllRdv();

        this.showModal = !this.showModal;
        this.msg = "Bien modifié";
      });
      console.log(this.rdvUpdate);
    },
    annulerRdv(elem) {
      this.deleteRdv(elem).then((response) => {
        this.getAllRdv();
        if (response.status == "success") {
          this.msg = "Bien Annuler";
        } else if ((response.status = "echec")) this.msg1 = response.message;

        console.log(response);
      });
    },
    getConsultations(id) {
      this.getConsultationsTel(id).then((response) => {
        this.getConsultationsEcrite(id).then((response) => {
          this.consultations = store.state.consultations;
          console.log(this.consultations);
        });
      });
    },

    voirConsultationEcrite(elem) {
      if (elem.type == "ecrite") {
        this.consultation.type = "ecrite";
        this.consultation.sujet = elem.sujet;
        // console.log(elem[0].etat);
        var etat = elem[0].etat;

        if (etat != "non repondu") {
          console.log(elem[0].etat);

          this.consultation.reponse = elem[1][0].reponse;
        }
      } else if (elem.type == "telephonique") {
        this.consultation.type = "telephonique";
        this.consultation.sujet = elem.sujet;
      }
    },
  },
  mounted() {
    // this.getAllRdv();
    this.getConsultations(10);
  },
};
</script>
<style lang=""></style>
