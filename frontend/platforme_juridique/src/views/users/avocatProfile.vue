<template lang="">
  <div class="bg-gray-100">
    <!-- End of Navbar -->

    <div class="container mx-auto my-5 p-5">
      <div class="md:flex no-wrap md:-mx-2">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2">
          <!-- Profile Card -->
          <div class="bg-white p-3 border-t-4 border-green-400">
            <div class="image overflow-hidden">
              <img
                class="h-auto w-full mx-auto"
                src="https://www.le-tout-lyon.fr/content/articles/18190/main_justiceavocatlyon.jpg"
                alt=""
              />
            </div>
            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">
              {{ avocat.nom }} {{ avocat.prenom }}
            </h1>
          </div>
          <!-- End of profile card -->
          <div class="my-4"></div>

          <!-- End of friends card -->
        </div>
        <!-- Right Side -->
        <div class="w-full mt-10 md:w-9/12 mx-2 h-64">
          <!-- Profile tab -->
          <!-- services and profile avocat -->
          <div>
            <ChoixProfile />
          </div>

          <!-- profile Section -->
          <div
            v-if="
              $store.state.choix == 1 && this.$options.name == 'avocatProfile'
            "
          >
            <ProfileAvocat />
          </div>
          <!-- End of about section -->

          <!-- rdv section -->
          <div
            v-if="
              $store.state.choix == 2 && this.$options.name == 'avocatProfile'
            "
          >
            <Rendez_vous />
          </div>
          <div
            v-if="
              $store.state.choix == 3 && this.$options.name == 'avocatProfile'
            "
          >
            <consultation />
          </div>
          <div
            v-if="
              $store.state.choix == 4 && this.$options.name == 'avocatProfile'
            "
          >
            <Document />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import store from "@/store";
import { mapActions } from "vuex";
import ChoixProfile from "@/components/profileComponents/choixProfile.vue";
import ProfileAvocat from "@/components/profileComponents/avocat/profile.vue";
import Consultation from "@/components/profileComponents/avocat/consultation.vue";
import Document from "@/components/profileComponents/avocat/document.vue";

import Rendez_vous from "@/components/rendez_vous.vue";
export default {
  name: "avocatProfile",
  data() {
    return {
      avocat: "",
      rdv: false,
      consultation: false,
      document: false,
      choix: 1,
    };
  },
  components: {
    Rendez_vous,
    ChoixProfile,
    ProfileAvocat,
    Consultation,
    Document,
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
      "getChoixProfile",
    ]),
  },
  mounted() {
    if (sessionStorage.getItem("consultationInfo")) {
      this.getChoixProfile(3);
      console.log("fdf");
    }

    console.log(this.$parent.$options.name);
    this.avocat = JSON.parse(sessionStorage.getItem("avocatProfile"));
  },
};
</script>
<style lang=""></style>
