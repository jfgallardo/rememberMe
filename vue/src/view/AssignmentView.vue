<template>
  <form @submit.prevent="createAssignment">
    <div class="shadow sm:rounded-md sm:overflow-hidden w-[60%] mx-[20%] mb-2">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
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
        <div class="col-span-3 sm:col-span-2">
          <label for="title" class="block text-sm font-medium text-gray-700">
            Title
          </label>
          <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
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
                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                />
              </svg>
            </span>
            <input
              type="text"
              name="title"
              id="title"
              v-model="assignment.title"
              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
              placeholder=""
              required
            />
          </div>
        </div>

        <div>
          <label for="note" class="block text-sm font-medium text-gray-700">
            Notes
          </label>
          <div class="mt-1">
            <textarea
              id="note"
              name="note"
              rows="3"
              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
              placeholder=""
              v-model="assignment.note"
            />
          </div>
          <p class="mt-2 text-sm text-gray-500">Little description</p>
        </div>

        <div>
          <SwitchGroup>
            <div class="flex items-center">
              <SwitchLabel class="mr-4">Enable notifications</SwitchLabel>
              <Switch
                v-model="enabled"
                :class="enabled ? 'bg-blue-600' : 'bg-gray-200'"
                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                <span
                  :class="enabled ? 'translate-x-6' : 'translate-x-1'"
                  class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform"
                />
              </Switch>
            </div>
          </SwitchGroup>
        </div>

        <div v-if="enabled">
          <label for="warning" class="block text-sm font-medium text-gray-700"
            >Warning Date</label
          >
          <div class="mt-1">
            <input
              type="date"
              name="warning"
              id="warning"
              :min="min"
              :max="max"
              v-model="assignment.warning_date"
              :required="enabled"
              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
            />
          </div>
          <p class="text-sm mt-2 text-gray-500">
            The limit to notify is one month
          </p>
        </div>
      </div>

      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button
          type="submit"
          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Save
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import { ref } from "vue";
import { Switch, SwitchGroup, SwitchLabel } from "@headlessui/vue";
import { useStore } from "vuex";
import { useRouter, useRoute } from "vue-router";
export default {
  setup() {
    const enabled = ref(false);
    const store = useStore();
    const router = useRouter();
    const route = useRoute();

    let errorMsg = ref("");

    let assignment = {
      title: "",
      note: "",
      warning_date: "",
    };

    if (route.params.id) {
      assignment.value = store.state.assig.assignments.find(
        (a) => a.id === parseInt(route.params.id)
      );
    }

    let rangeDate = (day) => {
      var data = new Date();
      data.setDate(data.getDate() + day);
      return (
        data.getFullYear() +
        "-" +
        addZero(data.getMonth() + 1).toString() +
        "-" +
        addZero(data.getDate().toString())
      );
    };

    let addZero = (number) => {
      if (number <= 9) {
        return "0" + number;
      } else return number;
    };

    const min = rangeDate(1);
    const max = rangeDate(30);

    let createAssignment = () => {
      var form_data = {
        id_user: store.state.auth.user.data.id,
        ...assignment,
      };
      var form_noti = {
        name_user: store.state.auth.user.data.name,
        email_user: store.state.auth.user.data.email,
        title: assignment.title,
        warning_date: assignment.warning_date,
      };

      store
        .dispatch("assig/create", form_data)
        .then(() => {
          if (assignment.warning_date) {
            store.dispatch("noti/createNotification", form_noti);
          }
          router.push({
            name: "Assignment",
          });
        })
        .catch((err) => {
          errorMsg.value = err.response.data.error;
        });
    };

    return {
      assignment,
      enabled,
      min,
      max,
      createAssignment,
      errorMsg,
    };
  },
  components: {
    Switch,
    SwitchGroup,
    SwitchLabel,
  },
  watch: {
    enabled(newE, oldE) {
      if (!newE) this.assignment.warning_date = "";
    },
  },
};
</script>
