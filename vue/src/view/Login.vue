<template>
  <div>
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      Iniciar sesión en su cuenta
    </h2>
    <p class="mt-2 text-center text-sm text-gray-600">
      O
      {{ " " }}
      <router-link
        :to="{ name: 'Register' }"
        class="font-medium text-indigo-600 hover:text-indigo-500"
      >
        registrese gratis.
      </router-link>
    </p>
  </div>
  <form class="mt-8 space-y-6" @submit="login">
    <div
      v-if="errorMsg"
      class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded"
    >
      {{ errorMsg }}
      <span
        @click="errorMsg = ''"
        class="h-8 w-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </span>
    </div>
    <input type="hidden" name="remember" value="true" />
    <div class="rounded-md shadow-sm -space-y-px">
      <div>
        <label for="email-address" class="sr-only">Correo electrónico</label>
        <input
          id="email-address"
          name="email"
          type="email"
          autocomplete="email"
          required=""
          v-model="user.email"
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Correo electrónico"
        />
      </div>
      <div>
        <label for="password" class="sr-only">Contraseña</label>
        <input
          id="password"
          name="password"
          type="password"
          autocomplete="current-password"
          required=""
          v-model="user.password"
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Contraseña"
        />
      </div>
    </div>

    <div>
      <button
        type="submit"
        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
          <LockClosedIcon
            class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
            aria-hidden="true"
          />
        </span>
        Iniciar sesión
      </button>
    </div>
  </form>
</template>

<script>
import { LockClosedIcon } from "@heroicons/vue/solid";
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
export default {
  setup() {
    const router = useRouter();
    const store = useStore();

    const user = {
      email: "",
      password: "",
      remember: false,
    };

    let errorMsg = ref("");

    let login = (ev) => {
      ev.preventDefault();
      store
        .dispatch("auth/login", user)
        .then(() => {
          router.push({
            name: "Dashboard",
          });
        })
        .catch((err) => {
          errorMsg.value = err.response.data.error;
        });
    };

    return {
      user,
      errorMsg,
      login,
    };
  },
  components: {
    LockClosedIcon,
  },
};
</script>
