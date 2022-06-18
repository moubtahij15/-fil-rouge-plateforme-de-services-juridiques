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
            <h3 class="text-3xl font-semibold">modifier post</h3>
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
            <div class="whitespace-pre-wrap mt-7">
              <textarea
                v-model="this.sjt_post"
                placeholder="Sujet"
                class="bg-purple-white shadow rounded border-0 p-3 w-full"
                required="required"
              ></textarea>
            </div>
          </div>
          <div class="flex-1 px-2 pt-2 mx-10 m-2"></div>
          <!--footer-->
          <div
            class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
          >
            <button
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-primary hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="this.showModal = !this.showModal"
            >
              Close
            </button>
           
          </div>
        </div>
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
          <span v-if="value"
            >cette service est activé (vous pouvez desactiver juste switch )
          </span>
          <span v-if="!value"
            >cette service est desativer (vous pouvez activé juste switch )
          </span>
        </div>
      </label>
    </div>
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">Client</th>
                <th class="px-4 py-3">sujet</th>
                <th class="px-4 py-3">date</th>

                <th class="px-4 py-3">heure</th>
                <th class="px-4 py-3">telephone</th>
                <th class="px-4 py-3">email</th>
                <!-- <th class="px-4 py-3">annuler</th> -->
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in rdv"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom }} {{ elem.prenom }}</p>
                </td>

                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center cursor-pointer"
                  @click="toggleModal(elem)"
                >
                  {{ elem.sjt_RDV.substring(0, 20) }}
                </td>
                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center"
                >
                  {{ elem.date_creneau }}
                </td>

                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.heure_debut }}
                  </span>
                </td>
                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.tel }}
                  </span>
                </td>
                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.email }}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import Toggle from "@vueform/toggle";

export default {
  name: "rdvAvocat",
  data() {
    return {
      rdv: {},
      showModal: false,
      sjt_post: "",
      rdvUpdate: {},
      msg: "",
      msg1: "",
      value: JSON.parse(sessionStorage.getItem("Avocat")).serviceRdv,
    };
  },
  components: {
    Toggle,
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
      "getRdvAvocat",
      "chageEtatRdv",
    ]),
    testt() {
      if (this.value) {
        this.value = 0;
      } else {
        this.value = 1;
      }
      // console.log(this.value)
      this.chageEtatRdv({
        id: JSON.parse(sessionStorage.getItem("Avocat")).id,
        value: this.value,
      }).then((response) => {});

      //   console.log(this.value);
    },

    toggleModal(elm) {
      this.showModal = !this.showModal;

      this.sjt_post = elm.sjt_RDV;
      this.rdvUpdate = elm;
    },
    getAllRdv() {
      this.getRdvAvocat(JSON.parse(sessionStorage.getItem("Avocat")).id).then(
        (response) => {
          this.rdv = response.rdv;
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
  },
  mounted() {
    // statut
    this.getAllRdv();
  },
};
</script>
<style src="@vueform/toggle/themes/default.css"></style>
