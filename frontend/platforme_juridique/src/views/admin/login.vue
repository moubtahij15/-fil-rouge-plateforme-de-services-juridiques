<template>
  <div>
    <img
      class="mx-auto h-24 w-24"
      src="../../assets/logo1.”.png"
      alt="Workflow"
    />
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      AVOCATICE
    </h2>
  </div>
  <div
    v-if="error"
    class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3"
    role="alert"
  >
    email ou mot de pass incorrect !
  </div>
  <form class="mx-auto w-1/3 mt-8 space-y-6" @submit="login">
    <input type="hidden" name="remember" value="true" />
    <div class="rounded-md shadow-sm -space-y-px">
      <div
        class="mb-3 space-y-2 w-full text-xs"
        v-if="this.$parent.$options.name == 'SignInForm'"
      >
        <p class="text-red text-xs hidden">Please fill out this field.</p>
      </div>
      <div class="mb-3 space-y-2 w-full text-xs" v-else>
        <label class="font-semibold text-gray-600 py-2"
          >username <abbr title="required">*</abbr></label
        >
        <input
          placeholder="username "
          v-model="admin.username"
          class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
          required="required"
          type="text"
          name="integration[shop_name]"
          id="integration_shop_name"
        />
        <p class="text-red text-xs hidden">Please fill out this field.</p>
      </div>

      <div class="mb-3 space-y-2 w-full text-xs">
        <label class="font-semibold text-gray-600 py-2"
          >password <abbr title="required">*</abbr></label
        >
        <input
          placeholder="password"
          v-model="admin.password"
          class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
          required="required"
          type="password"
          name="integration[shop_name]"
          id="integration_shop_name"
        />
        <p class="text-red text-xs hidden">Please fill out this field.</p>
      </div>
    </div>

    <div>
      <button
        type="submit"
        class="group relative bg-primary w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
          <LockClosedIcon
            class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
            aria-hidden="true"
          />
        </span>
        login
      </button>
    </div>
  </form>
</template>
<script>
import { mapActions } from "vuex";

import { LockClosedIcon } from "@heroicons/vue/solid";
import { useRouter } from "vue-router";
import store from "../../store";
export default {
  name: "loginAdmin",

  data() {
    return {
      testt: sessionStorage.getItem("TOKEN"),
      reff: "",
      error: false,
      router: useRouter(),

      admin: {
        username: "",
        password: "",
      },
    };
  },
  components: {
    LockClosedIcon,
  },

  methods: {
    ...mapActions(["redirectTo", "loginAdmin"]),

    // alidations() {
    //   return {
    //     reff: { required, maxLength: maxLength(10) },
    //   }
    // },
    login(ev) {
      console.log("ztyui");
      ev.preventDefault();

      this.loginAdmin(this.admin).then((response) => {
        if (response.message == "success") {
          this.redirectTo({ val: "adminDashboard" });
        }
      });
    },
  },
  mounted() {
    if (sessionStorage.getItem("admin")) {
                    this.redirectTo({ val: "adminDashboard" });

    }
  },
};
</script>
