<template lang="">
  <!-- alert 1h before -->
  <div class="block w-full overflow-x-auto">
    <!-- modal -->
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
            <h3 class="text-3xl font-semibold">ajouter un document</h3>
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
            <form @submit="addDocument">
              <div class="items-center md:flex">
                <div class="relative">
                  <label
                    class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white"
                    >nom_document</label
                  >
                  <input
                    v-model="documentAdd.nom_document"
                    type="text"
                    class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"
                    placeholder="nom de document"
                    required
                  />
                </div>
                <div class="relative ml-4">
                  <label
                    class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white1"
                    >prix</label
                  >
                  <input
                    v-model="documentAdd.prix"
                    type="number"
                    min="5"
                    class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white1 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                    placeholder="prix de document"
                    required
                  />
                </div>
                <div class="relative ml-4">
                  <label
                    class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white1"
                    >lien</label
                  >
                  <input
                    v-model="documentAdd.lien_document"
                    type="text"
                    class="block w-full px-4 py-3 mt-2 text-base placeholder-gray-400 bg-white1 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                    placeholder="url de document"
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

    <!-- modal suject -->

    <!-- table rdv -->
    <!-- component -->

    <div class="flex justify-between mr-8 mt-4">
      <div class="flex cursor-pointer" @click="toggleModal">
        <FIcons
          id="delete"
          :icon="['fas', 'add']"
          class="h-6 w-6 items-end cursor-pointer mr-3"
        ></FIcons>

        <span class="text-md font-semibold text-center underline">
          ajouter document
        </span>
      </div>
      <div class="flex cursor-pointer" @click="getDocumentVendu">
        <FIcons
          id="delete"
          :icon="['fas', 'eye']"
          class="h-6 w-6 items-end cursor-pointer mr-3"
        ></FIcons>

        <span class="text-md font-semibold text-center underline">
          voir les documents qui sont vendus
        </span>
      </div>
    </div>

    <section class="container mx-auto p-6 font-mono" v-if="etat == 'inactif'">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">nom du document</th>
                <th class="px-4 py-3">prix</th>
                <th class="px-4 py-3">lien de telechargement</th>
                <th class="px-4 py-3">action</th>
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in document"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom_document }}</p>
                </td>

                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center"
                >
                  {{ elem.prix }}DH
                </td>

                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.lien_document }}
                  </span>
                </td>

                <td class="px-4 py-3 text-sm">
                  <FIcons
                    @click="passingData(elem)"
                    id="delete"
                    :icon="['fas', 'edit']"
                    class="h-6 w-6 mr-3 cursor-pointer"
                  ></FIcons>
                  <FIcons
                    @click="deleteDocuments(elem)"
                    id="delete"
                    :icon="['fas', 'trash']"
                    class="h-6 w-6 cursor-pointer"
                  ></FIcons>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- section for documents vendu -->

    <section class="container mx-auto p-6 font-mono" v-if="etat == 'actif'">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">client</th>
                <th class="px-4 py-3">prix</th>
                <th class="px-4 py-3">lien de telechargement</th>
                <th class="px-4 py-3">date</th>
                <th class="px-4 py-3">email</th>
                <th class="px-4 py-3">tele</th>
                <th class="px-4 py-3">nom de document</th>
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in documentVendu"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.noms }} {{ elem.prenom }}</p>
                </td>

                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center"
                >
                  {{ elem.prix }}DH
                </td>

                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.lien_document }}
                  </span>
                </td>

                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.date }}
                  </span>
                </td>
                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.email }}
                  </span>
                </td>
                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.tel   }}
                  </span>
                </td>
                <td class="px-4 py-3 text-md">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.nom_document }}
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

export default {
  name: "document",
  data() {
    return {
      documentVendu: {},
      documentAdd: {
        id_document: "",
        lien_document: "",
        prix: "",
        nom_document: "",
        id_avocat: JSON.parse(sessionStorage.getItem("Avocat")).id,
      },
      etat: "inactif",
      document: {},
      showModal: false,
      sjt_post: "",
      rdvUpdate: {},
      msg: "",
      msg1: "",
      action: "add",
      value: JSON.parse(sessionStorage.getItem("Avocat")).serviceDocument,
    };
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "isLogin",
      "getDocummentClient",
      "getAlldocument",
      "createDocument",
      "deleteDocument",
      "updateDocument",
      "changeEtatDocument",
      "getDocummentClients",
    ]),
    testt() {
      if (this.value) {
        this.value = 0;
      } else {
        this.value = 1;
      }
      console.log(this.value);
      this.changeEtatDocument({
        id: JSON.parse(sessionStorage.getItem("Avocat")).id,
        value: this.value,
      }).then((response) => {});

      //   console.log(this.value);
    },
    toggleModal() {
      this.showModal = !this.showModal;

      //   this.sjt_post = elm.sjt_RDV;
      //   this.rdvUpdate = elm;
    },
    passingData(elem) {
      this.documentAdd.lien_document = elem.lien_document;
      this.documentAdd.nom_document = elem.nom_document;
      this.documentAdd.prix = elem.prix;
      this.documentAdd.id_document = elem.id;
      this.showModal = !this.showModal;
    },

    getAllDocuments() {
      this.getAlldocument(JSON.parse(sessionStorage.getItem("Avocat")).id).then(
        (response) => {
          this.document = response;
          console.log(this.document);
        }
      );
    },
    addDocument(ev) {
      ev.preventDefault();
      if ((this.action = !"update")) {
        this.createDocument(this.documentAdd).then((response) => {
          this.getAllDocuments();
          this.documentAdd.lien_document = "";
          this.documentAdd.nom_document = "";
          this.documentAdd.prix = "";

          this.showModal = !this.showModal;
        });
      } else {
        this.updateDocument(this.documentAdd).then((response) => {
          this.getAllDocuments();
          this.documentAdd.lien_document = "";
          this.documentAdd.nom_document = "";
          this.documentAdd.prix = "";
          this.action = "add";
          this.showModal = !this.showModal;
        });
      }

      //   console.log(this.documentAdd);
    },
    deleteDocuments(elem) {
      this.deleteDocument(elem.id).then((response) => {
        this.getAllDocuments();
      });
    },
    getDocumentVendu() {
      this.getDocummentClients(
        JSON.parse(sessionStorage.getItem("Avocat")).id
      ).then((response) => {
        this.documentVendu = JSON.parse(response);
        this.etat = "actif";

        console.log(this.documentVendu);
        console.log(this.document);
      });
    },
  },
  mounted() {
    this.getAllDocuments();
  },
};
</script>
<style lang=""></style>
