<template>
  <div>
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      Registrarse
    </h2>
    <p class="mt-2 text-center text-sm text-gray-600">
      O
      {{ " " }}
      <router-link
        :to="{ name: 'Login' }"
        class="font-medium text-indigo-600 hover:text-indigo-500"
      >
        iniciar sesión.
      </router-link>
    </p>
  </div>
  <form class="mt-8 space-y-6" @submit="register">
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
        <label for="user" class="sr-only">Nombre y apellidos</label>
        <input
          id="user"
          name="user"
          type="text"
          autocomplete="text"
          required=""
          v-model="user.name"
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Nombre y apellidos"
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
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Contraseña"
        />
      </div>
      <div>
        <label for="password_repeat" class="sr-only"
          >Verificar contraseña</label
        >
        <input
          id="password_repeat"
          name="password_repeat"
          type="password"
          autocomplete="current-password"
          required=""
          v-model="user.password_confirmation"
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Repetir contraseña"
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
        Registrar
      </button>
    </div>
  </form>
</template>

<script>
import { LockClosedIcon } from "@heroicons/vue/solid";
import { useStore } from "vuex";
import { useRouter } from "vue-router";

export default {
  setup() {
    const route = useRouter();
    const store = useStore();
    const user = {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };

    let register = (event) => {
      event.preventDefault();
      store.dispatch("auth/register", user).then(() => {
        route.push({ name: "Dashboard" });
      });
    };
    return {
      user,
      register,
    };
  },
  components: {
    LockClosedIcon,
  },
};
</script>
