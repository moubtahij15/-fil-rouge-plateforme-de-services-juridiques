<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
    <div class="w-full text-white bg-tahiti">
      <div
        class="container flex items-center justify-between px-6 py-4 mx-auto"
      >
        <div class="flex">
          <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
            <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
            ></path>
          </svg>

          <p class="mx-3">
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

    <!-- modal suject -->
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
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="this.showModal = !this.showModal"
            >
              Close
            </button>
            <button
              class="text-green-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              @click="updatePost()"
            >
              Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- table rdv -->
    <!-- component -->
    <section class="container mx-auto p-6 font-mono">
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
                <th class="px-4 py-3">annuler</th>
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

export default {
  name: "rdvUser",
  data() {
    return {
      rdv: {},
      showModal: false,
      sjt_post: "",
      rdvUpdate: {},
      msg: "",
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

        console.log(response);
      });
    },
  },
  mounted() {
    this.getAllRdv();
  },
};
</script>
<style lang=""></style>
