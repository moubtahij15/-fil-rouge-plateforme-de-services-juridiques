<template lang="">
  <div class="w-full mx-auto my-4 border-b-2 pb-4">
    <div class="flex pb-3 mx-auto w-full">
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
          :class="step4 ? 'bg-primary text-white ' : 'bg-white'"
          class="w-10 h-10 border-grey-light mx-auto rounded-full text-lg flex items-center"
        >
          <span class="text-center w-full">4</span>
        </div>
      </div>
    </div>

    <!-- step1 choix de type de consultation -->

    <div v-if="step1" class="w-full mt-5 md:mx-auto sm:text-center lg:max-w-xl">
      <h2
        class="w-full mb-10 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto"
      >
        Type de Consultation souhaité ?
      </h2>
      <div class="flex w-full text-primary mt-4">
        <div
          @click="choix('ecrite')"
          class="mr-4 flex p-3 cursor-pointer justify-center shadow-md rounded-md hover:shadow-2xl box-border text-center order-first w-full text-black border-solid md:w-1/2 md:order-none"
        >
          <FIcons
            id="delete"
            :icon="['fas', 'message']"
            class="h-6 py-1 w-6 py-auto cursor-pointer mr-3"
          ></FIcons>
          <h6
            class="text-center justify-center leading-tight border-0 border-gray-300 lg:text-2xl"
          >
            Ecrite
          </h6>
        </div>
        <div
          @click="choix('tele')"
          class="cursor-pointer flex justify-center justify-a p-3 shadow-md rounded-md hover:shadow-2xl box-border text-center order-first w-full text-black border-solid md:w-1/2 md:order-none"
        >
          <FIcons
            id="delete"
            :icon="['fas', 'phone']"
            class="h-6 py-1 w-6 py-auto cursor-pointer mr-3"
          ></FIcons>
          <h2
            class="m-0 text-center leading-tight border-0 border-gray-300 lg:text-2xl"
          >
            Téléphonique
          </h2>
        </div>
      </div>
    </div>
    <div
      v-if="step2 == 'tele'"
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
    >
      <h2
        class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto"
      >
        Vos préférences horaires :
      </h2>

      <!-- step2 -->
      <!-- step2 - telephonique - -->
      <!--  horaires -->

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
                  choisi
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
    <!-- step3 -telephonique- / step2 -ecrite -->
    <!--  sujet -->

    <div
      v-if="step3 == 'tele' || step2 == 'ecrit'"
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
    >
      <h2
        class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto"
      >
        Détaillez votre question :
      </h2>
      <div class="w-full mt-4">
        <textarea
          v-model="this.consultationEcrit.sujet"
          class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
        ></textarea>
      </div>
      <button
        class="mt-3 px-5 py-2 border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none"
        @click="validationConsultationTel"
      >
        Valider
      </button>
    </div>
    <!-- step4 - -->

    <div
      v-if="step4"
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
              votre consultation est bien passé
            </h3>

            <p class="text-primary y-2">
              vous pouvez voir ton consultation dans votre profile
            </p>
            <p>Passez une bonne journée !</p>
          </div>
        </div>
      </div>
    </div>

    <!-- payement -->

    <div
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
      v-if="step3 == 'ecrit'"
    >
      <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">
        Le Prix de cette consultation est {{ this.consultationEcrit.prix }} DH
      </h3>
      <stripe-checkout
        ref="checkoutRef"
        :pk="publishableKey"
        :sessionId="this.sessionId"
      />
      <button
        class="mt-3 px-5 py-2 border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none"
        @click="submit"
      >
        Pay now!
      </button>
    </div>

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
// import store fro m "../store";
import { mapActions } from "vuex";
import { StripeCheckout } from "@vue-stripe/vue-stripe";

export default {
  name: "Rendez_vous",
  data() {
    return {
      // idSession typeConsultation prix id_client id_avocat sujet

      sessionId: null,
      consultationTel: {
        id_creneau: "",
        date_creneau: "",
        sjt_consultation: "",

        id_avocat: JSON.parse(sessionStorage.getItem("avocatProfile")).id,
      },

      consultationEcrit: {
        idSession: "",
        typeConsultation: "",
        id_client: sessionStorage.getItem("idUser"),
        id_avocat: JSON.parse(sessionStorage.getItem("avocatProfile")).id,
        sujet: "",
        prix: "",
        id_consultation: "",
      },
      date_creneau: "",

      step1: true,
      step2: false,
      step3: false,
      step4: false,
      min: "",
      publishableKey:
        "pk_test_51L31WgJpb3Br7exnkJTm0E3Kb1qn8HZpjxZ7WRUS54kYwpIJDbIBbhYaHQbZtWognSJ4GAbFFuHewkuoCRqMV65I00XKNgiwtA",
    };
  },
  components: {
    StripeCheckout,
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
      "valideConsultationTel",
      "stripe",
      "valideConsultationEcrite",
      "getconsultationInfo",
    ]),
    // validation consultation ecrite

    submit() {
      // You will be redirected to Stripe's secure checkout page
      sessionStorage.setItem(
        "consultationInfo",
        JSON.stringify(this.consultationEcrit)
      );
      // sessionStorage.setItem("idSession", this.sessionId);
      this.$refs.checkoutRef.redirectToCheckout();
    },
    choix(choi) {
      if (choi == "tele") {
        this.step2 = "tele";
        this.step1 = false;
      } else if (choi) {
        this.step2 = "ecrit";
        this.step1 = false;

        // this.step2 = "ecrit";
      }
    },
    dateValidate(elem) {
      (this.step1 = false), (this.step2 = false);
      this.step3 = "tele";
      this.consultationTel.date_creneau = this.date_creneau;
      this.consultationTel.id_creneau = elem.id;

      console.log(this.consultationTel);
    },
    validationConsultationTel() {
      console.log(this.consultationTel);
      if (this.step3 == "tele") {
        this.valideConsultationTel(this.consultationTel).then((response) => {
          console.log(response);
          if (response.message == "Created") {
            this.step3 = false;
            this.step2 = false;
            this.step4 = true;
          }
        });
        // if choice consultation ecrite
      } else if (this.step2 == "ecrit") {
        var infoConsultation = this.getconsultationInfo({
          id: JSON.parse(sessionStorage.getItem("avocatProfile")).id,
          type: "ecrite",
        }).then((response) => {
          console.log(response);
          this.step2 = false;
          this.step3 = "ecrit";
          this.consultationEcrit.prix = response.prix;
          this.consultationEcrit.id_consultation = response.id;
          this.consultationEcrit.idSession = this.sessionId;
          this.getSession(response.id);
          // console.log(this.sessionId)

          // console.log(this.consultationEcrit);
        });
      }
    },
    getSession(id) {
      console.log(id);
      this.stripe(id).then((response) => {
        console.log(response.data.id);
        this.sessionId = response.data.id;
      });
    },
  },
  watch: {
    date_creneau(value) {
      this.getCreneaux(value);
    },
  },
  mounted() {
    if (sessionStorage.getItem("consultationInfo")) {
      console.log("dds");
      this.valideConsultationEcrite(
        JSON.parse(sessionStorage.getItem("consultationInfo"))
      ).then((response) => {
        console.log(response);
        if (response.message1 == "Consultation Created") {
          console.log("dsdsdssdds");

          this.step1 = false;
          this.step3 = false;
          this.step4 = true;
        }

        sessionStorage.removeItem("consultationInfo");
      });
    }
    this.min = new Date().toISOString().slice(0, 10);

    this.getCreneaux(this.consultationTel.date_creneau).then((response) => {
      console.log(response);
      //   console.log(store.state.creneaux);
    });
    // console.log(store.state.creneaux)
  },
};
</script>
