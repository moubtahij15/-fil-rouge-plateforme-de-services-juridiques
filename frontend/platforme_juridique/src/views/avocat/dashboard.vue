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
              {{ avocat.nom }} {{ avocat.nom }}
            </h1>
          </div>
          <!-- End of profile card -->
          <div class="my-4">
          
          <FIcons
            id="delete"
            :icon="['fas', 'arrow-right-from-bracket']"
            class="ml-6 h-6 w-6 cursor-pointer"
            @click="logout()"
          /></div>

          <!-- End of friends card -->
        </div>
        <!-- Right Side -->
        <div class="w-full md:w-9/12 mx-2 h-64">
          <!-- Profile tab -->
          <!-- About Section -->

          <!-- End of about section -->

          <div class="my-4"></div>

          <!-- Experience and education -->

          <!-- Navigation Bar -->

          <div
            class="flex flex-wrap mt-8 bg-white pb-3 rounded-2xl border-primary border-solid"
          >
            <!-- <div class="grid gap-8 row-gap-8 ">
            class="grid gap-8 row-gap-8 lg:grid-cols-4"
          </div> -->
            <div>
              <ChoixProfile />
            </div>

            <!-- End of Experience and education grid -->
          </div>
          <!-- End of profile tab -->

          <div
            v-if="$store.state.choix == 1 && this.$options.name == 'dashboard'"
          >
            <ProfilFormUser />
          </div>
          <!-- rdv -->

          <div
            v-if="$store.state.choix == 2 && this.$options.name == 'dashboard'"
          >
            <RdvAvocat />
          </div>

          <div
            v-if="$store.state.choix == 3 && this.$options.name == 'dashboard'"
          >
            <Consultation />
          </div>
          <div
            v-if="
              $store.state.choix == 4 && this.$options.name == 'dashboard'
            "
          >
            <Documents />
          </div>

          <!-- <div c>
											<Rendez_vous />

					</div>
                    <div c>
											<Rendez_vous />

					</div> -->
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import store from "@/store";
import { mapActions } from "vuex";
import ChoixProfile from "@/components/profileComponents/choixProfile.vue";
import RdvAvocat from "@/components/avocatComponent/profile/rdv.vue";
// import Consultation from "@/components/profileComponents/user/consultation.vue";
// import Documents from "@/components/profileComponents/user/documents.vue";
import ProfilFormUser from "@/components/avocatComponent/profile/formProfile.vue";
import Consultation from "@/components/avocatComponent/profile/consultation.vue";
import Documents from "@/components/avocatComponent/profile/document.vue";
// src\components\profileComponents\avocatComponent\profile\formProfile.vue
export default {
  name: "dashboard",
  data() {
    return {
      avocat: "",
      profile: true,
      consultation: false,
      document: false,
      // users: JSON.parse(sessionStorage.getItem('User')),
    };
  },
  components: {
    ProfilFormUser,
    ChoixProfile,
    RdvAvocat,
    Consultation,
    Documents

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
    ]),
    logout() {
      sessionStorage.clear();
      this.redirectTo({ val: "sign-in" });
  },
  },
  mounted() {
     if (!sessionStorage.getItem("Avocat")) {
      this.redirectTo({ val: "sign-in" });
    }
    // console.log();
    // this.avocat = JSON.parse(sessionStorage.getItem('avocatProfile'));
  },
};
</script>
<style lang=""></style>
