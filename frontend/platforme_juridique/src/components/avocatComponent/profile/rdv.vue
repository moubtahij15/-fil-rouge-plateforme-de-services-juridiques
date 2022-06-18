<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
    <div class="flex items-center justify-center w-full mb-12">
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
      }).then((response) => {

      });

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
