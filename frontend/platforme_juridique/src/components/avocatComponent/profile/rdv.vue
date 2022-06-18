<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
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

                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.heure_debut }}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm">
                  <button
                    @click="annulerRdv(elem)"
                    class="flex-no-shrink px-5 py-2 text-xs shadow-sm hover:shadow-lg font-bold tracking-wider border-2 hover:bg-red hover:text-white text-primary rounded-full transition ease-in duration-300"
                  >
                    annuler
                  </button>
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
      "getRdvUser",
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
  },
  mounted() {
    // statut
    // this.getAllRdv();
  },
};
</script>
<style src="@vueform/toggle/themes/default.css"></style>
