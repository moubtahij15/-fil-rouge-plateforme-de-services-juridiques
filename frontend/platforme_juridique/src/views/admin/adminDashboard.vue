<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->
  <div class="min-h-full">
    <Disclosure as="nav" class="bg-primary" v-slot="{ open }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://upload.wikimedia.org/wikipedia/commons/9/93/Taskful_Logo.svg"
                alt="Workflow"
              />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <H4
                  @click="getAvocats"
                  class="text-white cursor-pointer hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-bold"
                >
                  avocats</H4
                >
                <H4
                  @click="getClients"
                  class="text-white cursor-pointer hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-bold"
                >
                  users
                </H4>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Profile dropdown -->
              <Menu as="div" class="ml-3 relative">
                <div>
                  <MenuButton
                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                  >
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" alt="" />
                  </MenuButton>
                </div>
                <transition
                  enter-active-class="transition ease-out duration-100"
                  enter-from-class="transform opacity-0 scale-95"
                  enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75"
                  leave-from-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95"
                >
                  <MenuItems
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                  >
                    <MenuItem v-slot="{ active }">
                      <a
                        @click="logout"
                        :class="[
                          'block px-4 py-2 text-sm text-gray-700 cursor-pointer',
                        ]"
                      >
                        Sign out</a
                      >
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
              class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
            >
              <span class="sr-only">Open main menu</span>
              <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>

      <DisclosurePanel class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <!-- <router-link v-for="item in navigation" :key="item.name" as="a" :to="item.to"
            active-class="bg-gray-900 text-white"
            :class="[this.$route.name === item.to.name ? '' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']">
            {{ item.name }}

                </router-link> -->
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" alt="" />
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">
                {{ user.name }}
              </div>
              <div class="text-sm font-medium leading-none text-gray-400">
                {{ user.email }}
              </div>
            </div>
            <button
              type="button"
              class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
            >
              <span class="sr-only">View notifications</span>
              <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <DisclosureButton
              as="a"
              @click="logout"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 cursor-pointer"
            >
              Sign out</DisclosureButton
            >
          </div>
        </div>
      </DisclosurePanel>
    </Disclosure>
    <!-- user tab -->

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
      <div
        :class="sidebarOpen ? 'block' : 'hidden'"
        @click="sidebarOpen = false"
        class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"
      ></div>

      <div class="flex-1 flex flex-col overflow-hidden">
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium">
              All {{ this.type }} :
            </h3>

            <div class="mt-8"></div>

            <div class="flex flex-col mt-8">
              <div
                class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
              >
                <div
                  class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                  <table class="min-w-full">
                    <thead>
                      <tr>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Nom
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Prenom
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Email
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          ville
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          tele
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Supprimer
                        </th>
                        <th
                          v-if="this.type == 'avocats'"
                          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          statut
                        </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white">
                      <tr v-for="elem in users" :value="elem.id" :key="elem.id">
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <div class="text-bold leading-5 text-gray-900">
                            {{ elem.nom }}
                          </div>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <div class="text-sm leading-5 text-gray-900">
                            {{ elem.prenom }}
                          </div>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <div class="text-sm leading-5 text-gray-900">
                            {{ elem.email }}
                          </div>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                        >
                          {{ elem.ville }}
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                        >
                          {{ elem.tel }}
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                        >
                          <FIcons
                            id="delete"
                            :icon="['fas', 'trash']"
                            class="h-5 w-5 cursor-pointer"
                            @click="deleteUser(elem.id)"
                          />
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                        >
                          <div
                            class="flex items-center justify-center w-full mb-5"
                          >
                            <label
                              for="toggleB"
                              class="flex items-center cursor-pointer"
                            >
                              <!-- toggle -->
                              <div class="relative">
                                <!-- input -->
                                <input
                                  @click="testt(elem.id)"
                                  type="checkbox"
                                  id="toggleB"
                                  class="sr-only"
                                />
                                <!-- line -->
                                <div
                                  :class="
                                    elem.statut
                                      ? 'block bg-primary w-14 h-8 rounded-full'
                                      : 'block bg-red w-14 h-8 rounded-full'
                                  "
                                ></div>
                                <!-- dot -->
                                <div
                                  :class="
                                   elem.statut
                                      ? 'dot absolute right-1 top-1 bg-white1 w-6 h-6 rounded-full transition'
                                      : 'dot absolute left-1 top-1 bg-white1 w-6 h-6 rounded-full transition'
                                  "
                                ></div>
                              </div>
                              <!-- label -->
                              
                            </label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { computed } from "@vue/reactivity";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import store from "../../store";
import { mapActions } from "vuex";

// const user={}
// const user = {
//   id: "12",
//   name: "a",
//   nom: "othman",
//   prenom: "rrrt",
//   email: "aaaa",
//   date_naissance: "2201-01-01",
//   age: 12,
//   imageUrl:
//     'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
// }

export default {
  name: "navBar",
  data() {
    return {
      users: [],
      type: "avocats",
    };
  },
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    BellIcon,
    MenuIcon,
    XIcon,
  },
  methods: {
    ...mapActions([
      "redirectTo",
      "loginAdmin",
      "getAllClients",
      "deleteClient",
      "getAllAvocats",
    ]),
    getClients() {
      this.type = "clients";
      this.getAllClients().then((response) => {
        this.users = response;
      });
    },
    getAvocats() {
      this.type = "avocats";

      this.getAllAvocats().then((response) => {
        this.users = response;
      });
    },
    deleteUser(id) {
      console.log(id);
      this.deleteClient(id).then((response) => {
        this.getClients();
      });
    },
    logout() {
      store.commit("logout");
      router.push({
        name: "Login",
      });
      console.log("ok");
    },
  },
  mounted() {
    if (!sessionStorage.getItem("admin")) {
      this.redirectTo({ val: "login" });
    }
    this.getClients();
  },
};
</script>
