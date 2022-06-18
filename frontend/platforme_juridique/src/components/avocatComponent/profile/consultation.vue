<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
    <div
      v-if="showModal"
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="relative w-auto my-6 mx-auto w-full max-w-3xl">
        <!--content-->
        <div
          class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
        >
          <!--header-->
          <div
            class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t"
          >
            <h3 class="text-3xl font-semibold">determiner le prix</h3>
            <button
              class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
            >
              <span
                class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
              >
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto w-full">
            <form @submit="addConsultationPrix">
              <div class="items-center md:flex">
                <div class="relative">
                  <label
                    class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                    >prix</label
                  >
                  <input
                    v-model="prix.telephonique"
                    type="number"
                    class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                    placeholder="consultation telephonique"
                    required
                  />
                </div>
                <div class="relative ml-4">
                  <label
                    class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white1"
                    >prix</label
                  >
                  <input
                    v-model="prix.ecrite"
                    type="number"
                    class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white1 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                    placeholder="consultation ecrite"
                    required
                  />
                </div>
              </div>
              <div
                class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
              >
                <button
                  class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="button"
                  v-on:click="this.showModal = !this.showModal"
                >
                  Close
                </button>
                <button
                  class="text-green-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="submit"
                >
                  Save Changes
                </button>
              </div>
            </form>
          </div>

          <!--footer-->
        </div>
      </div>
    </div>
    <div class="w-full text-primary shadow bg-white" v-if="type.length == 0">
      <div
        class="container flex items-center justify-between px-6 py-4 mx-auto"
      >
        <div class="flex">
          <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
            <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
            ></path>
          </svg>

          <p class="mx-3 font-semibold">
            il faut d'abord determiner le prix et le type de consultation
          </p>
          <p
            class="mx-3 font-bold underline cursor-pointer"
            @click="toggleModal"
          >
            Appuyer ici pour determiner
          </p>
        </div>

        <button
          @click="(this.consultation.sujet = ''), (this.consultation.type = '')"
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
    <div class="flex items-center justify-center w-full mb-5">
      <label for="toggleB" class="flex items-center cursor-pointer">
        <!-- toggle -->
        <div class="relative">
          <!-- input -->
          <input @click="testt" type="checkbox" id="toggleB" class="sr-only" />
          <!-- line -->
          <div
            :class="
              value
                ? 'block bg-primary w-14 h-8 rounded-full'
                : 'block bg-red w-14 h-8 rounded-full'
            "
          ></div>
          <!-- dot -->
          <div
            :class="
              value
                ? 'dot absolute right-1 top-1 bg-white1 w-6 h-6 rounded-full transition'
                : 'dot absolute left-1 top-1 bg-white1 w-6 h-6 rounded-full transition'
            "
          ></div>
        </div>
        <!-- label -->
        <div class="ml-3 text-primary font-medium">
          <span v-if="value">ce service est activé </span>
          <span v-if="!value">ce service est desativer </span>
        </div>
      </label>
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
                <th class="px-4 py-3">client</th>
                <th class="px-4 py-3">sujet</th>
                <th class="px-4 py-3">date</th>

                <th class="px-4 py-3">heure</th>
                <th class="px-4 py-3">type</th>
                <th class="px-4 py-3">etat</th>
                <th class="px-4 py-3">montant</th>
                <th class="px-4 py-3">email</th>
                <th class="px-4 py-3">tel</th>
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
                  class="px-4 py-3 w-full text-left text-xs font-semibold text-center"
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
                <td class="text-xs bg-primary py-3 text-white rounded-md">
                  <span class="bg-primary w-full text-white">
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
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.email }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.tel }}
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
          class="text-gray-800 t dark:text-gray-100 leading-7 font-semibold w-11/12"
        >
          leur Sujet :
        </h3>

        <p
          class="w-11/12 mt-10 text-gray-800 dark:text-gray-100 w-full leading-2"
        >
          {{ this.consultation.sujet }}
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
            <p class="ml-2 dark:text-gray-400">
              {{ this.consultation.date }}, {{ this.consultation.heure }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="this.consultation.type == 'ecrite'"
      class="w-full px-5 flex flex-col mb-8 overflow-hidden rounded-lg shadow-lg justify-between"
    >
      <div class="flex flex-col mt-5">
        <div class="flex justify-end">
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
        <div
          class="justify-end dark:border-gray-700 rounded-full px-3 py-1 dark:text-gray-400 text-gray-600 text-xs flex items-center"
        >
          <p class="ml-2 dark:text-gray-400">
            {{ this.consultation.date }}, {{ this.consultation.heure }}
          </p>
        </div>

        <div class="flex justify-start">
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
        <div
          class="justify-start dark:border-gray-700 rounded-full px-3 py-1 dark:text-gray-400 text-gray-600 text-xs flex items-center"
        >
          <p class="ml-2 dark:text-gray-400">
            {{ this.consultation.dateReponse }},
            {{ this.consultation.heureReponse }}
          </p>
        </div>

        <div class="flex items-center py-5"></div>
      </div>
      <form>
        <label for="chat" class="sr-only">Your message</label>
        <div
          class="flex items-center py-2 px-3 bg-gray-50 rounded-lg dark:bg-gray-700"
        >      
          <textarea
            id="chat"
            rows="1"
            class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Your message..."
          ></textarea>
          <button
            type="submit"
            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600"
          >
            <svg
              class="w-6 h-6 rotate-90"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
              ></path>
            </svg>
          </button>
        </div>
      </form>
      <!-- <div class="py-5">
        <input
          class="w-full bg-white py-5 px-3 rounded-xl"
          type="text"
          placeholder="type your message here..."
        />
      </div> -->
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
      type: [],
      rdvUpdate: {},
      msg: "",
      msg1: "",
      prix: {
        ecrite: "",
        telephonique: "",
      },
      consultations: [],
      consultation: {
        type: "",
        sujet: "",
        reponse: "",
        date: "",
        heure: "",
        dateReponse: "",
        heureReponse: "",
      },
      value: JSON.parse(sessionStorage.getItem("Avocat")).serviceConsultation,
    };
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "getVilles",
      "deleteRdv",
      "changeEtatConsultation",
      "registerUser",
      "isLogin",
      "getAvocats",
      "getAvocatsBySearch",
      "addConsultation",
      "vaidateRdv",
      "getTypeConsultation",
      "updateSjtRdv",
      "getConsultationsTelAvocat",
      "getConsultationsEcriteAvocat",
    ]),
    testt() {
      if (this.value) {
        this.value = 0;
      } else {
        this.value = 1;
      }
      console.log(this.value);
      this.changeEtatConsultation({
        id: JSON.parse(sessionStorage.getItem("Avocat")).id,
        value: this.value,
      }).then((response) => {});

      //   console.log(this.value);
    },

    getAllRdv() {
      this.getRdvUser(JSON.parse(sessionStorage.getItem("User")).id).then(
        (response) => {
          this.rdv = response;
          console.log(this.rdv);
        }
      );
    },

    getConsultations(id) {
      this.getConsultationsTelAvocat(id).then((response) => {
        this.getConsultationsEcriteAvocat(id).then((response) => {
          Array.prototype.push.apply(
            this.consultations,
            store.state.consultationEcrite
          );
          Array.prototype.push.apply(
            this.consultations,
            store.state.consultationTele
          );

          // this.consultations = ;
          console.log(this.consultations);
        });
      });
    },
    addConsultationPrix(ev) {
      ev.preventDefault();

      this.addConsultation({
        idAvocat: JSON.parse(sessionStorage.getItem("Avocat")).id,
        prixTel: this.prix.telephonique,
        prixEcrite: this.prix.ecrite,
      }).then((response) => {
        this.showModal = !this.showModal;
        this.getConsultations(JSON.parse(sessionStorage.getItem("Avocat")).id);
        this.getTypeConsultation(
          JSON.parse(sessionStorage.getItem("Avocat")).id
        ).then((response) => {
          this.type = response.avocat;
          console.log(response);
        });
      });
    },

    voirConsultationEcrite(elem) {
      if (elem.type == "ecrite") {
        this.consultation.type = "ecrite";
        this.consultation.sujet = elem.sujet;
        this.consultation.date = elem.date;
        this.consultation.heure = elem.heure;

        // console.log(elem[0].etat);
        var etat = elem[0].etat;

        if (etat != "non repondu") {
          console.log(elem[1][0].date_reponse);

          this.consultation.reponse = elem[1][0].reponse;
          this.consultation.dateReponse = elem[1][0].date_reponse;
          this.consultation.heureReponse = elem[1][0].heure_reponse;
        }
      } else if (elem.type == "telephonique") {
        this.consultation.type = "telephonique";
        this.consultation.sujet = elem.sujet;
        this.consultation.date = elem.date_creneau;
        this.consultation.heure = elem.heure_debut;
      }
    },
    toggleModal() {
      this.showModal = !this.showModal;

      //   this.sjt_post = elm.sjt_RDV;
      //   this.rdvUpdate = elm;
    },
  },
  mounted() {
    // this.getAllRdv();
    this.getConsultations(JSON.parse(sessionStorage.getItem("Avocat")).id);
    this.getTypeConsultation(
      JSON.parse(sessionStorage.getItem("Avocat")).id
    ).then((response) => {
      this.type = response.avocat;
      console.log(response);
    });
  },
};
</script>
<style lang=""></style>
