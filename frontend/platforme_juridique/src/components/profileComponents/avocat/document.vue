<template lang="">
  <!-- component -->
  <!-- component -->
  <div class="w-full mx-auto my-4 border-b-2 pb-4">
    <div class="flex">
      <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
        <path
          d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
        ></path>
      </svg>

      <p class="mx-3 font-bold">
        vous pouvez prendre une consultation avec un avocat va comprendre votre
        contexte et vos spécificités
      </p>
    </div>

    <section class="container mx-auto p-6 font-mono" v-if="!valide">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">avocat</th>
                <th class="px-4 py-3">nom du document</th>

                <th class="px-4 py-3">montant</th>
                <th class="px-4 py-3">valdé</th>
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in $store.state.documentsAvocat"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom }} {{ elem.prenom }}</p>
                </td>
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom_document }}</p>
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
                    @click="submit(elem)"
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
    <stripe-checkout
      ref="checkoutRef"
      :pk="publishableKey"
      :sessionId="this.sessionId"
    />
    <div
      class="max-w-xl mt-5 md:mx-auto sm:text-center lg:max-w-xl"
      v-if="valide"
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
              votre document est prêt
            </h3>

            <p class="text-primary y-2">Voici le lien de telechargement :</p>
            <p>Passez une bonne journée !</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import { StripeCheckout } from "@vue-stripe/vue-stripe";

import store from "../../../store";
export default {
  name: "document",
  data() {
    return {
      valide: false,
      sessionId: null,
      document: {
        id_client: sessionStorage.getItem("idUser"),
        id_document: "",
        idSession: "",
      },
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
      "isLogin",
      "getAvocats",
      "getDocummentAvocat",
      "stripeD",
      "validerDocument",
    ]),
    getSession(id) {
      console.log(id);
      this.stripeD(id).then((response) => {
        console.log(response.data.id);
        this.sessionId = response.data.id;
        this.document.idSession = this.sessionId;
        sessionStorage.setItem("DocumentInfo", JSON.stringify(this.document));
        this.$refs.checkoutRef.redirectToCheckout();
      });
    },
    submit(elem) {
      // You will be redirected to Stripe's secure checkout page

      this.document.id_document = elem.id;
      this.getSession(elem.id);
      // sessionStorage.setItem("idSession", this.sessionId);
    },
  },

  mounted() {
    this.getDocummentAvocat(
      JSON.parse(sessionStorage.getItem("avocatProfile")).id
    ).then((reponse) => {
      console.log(reponse);
      console.log(JSON.parse(sessionStorage.getItem("avocatProfile")).id);
    });

    // check if paid or not
    if (sessionStorage.getItem("DocumentInfo")) {
      let documentss = JSON.parse(sessionStorage.getItem("DocumentInfo"));
      console.log(documentss);

      // console.log(sessionStorage.getItem("consultationInfo").typeConsultation);
      console.log(documentss);

      this.validerDocument(documentss).then((response) => {
        console.log(response);
        if (response.message == "success") {
          this.valide = true;
        }
        sessionStorage.removeItem("DocumentInfo");
      });
    }
  },
};
</script>
<style lang=""></style>
