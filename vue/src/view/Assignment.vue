<template>
  <PageComponent>
    <template v-slot:header>
      <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Assignment</h1>
        <router-link
          :to="{ name: 'CreateAssignment' }"
          class="py-2 px-3 text-white bg-emerald-500 rounded-md hover:bg-emerald-600 shadow-lg shadow-cyan-500/50"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 -mt-1 inline-block mr-1"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 4v16m8-8H4"
            /></svg
          >Adicionar tarea
        </router-link>
      </div>
    </template>
    <div v-if="loading" class="flex justify-center items-center">
      <div
        class="spinner-border animate-spin inline-block w-8 h-8 border-4 text-blue-600 rounded-full"
        role="status"
      >
        <span class="hidden">Loading...</span>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3" v-else>
      <AssignmentListComponent
        v-for="item in assignment"
        :key="item.id"
        :item="item"
      ></AssignmentListComponent>
    </div>
  </PageComponent>
</template>

<script>
import PageComponent from "../components/PageComponent.vue";
import { useStore } from "vuex";
import { computed, defineAsyncComponent, ref } from "vue";

export default {
  components: {
    PageComponent,
    AssignmentListComponent: defineAsyncComponent(() =>
      import("../components/async/AssignmentListComponent.vue")
    ),
  },
  setup() {
    const store = useStore();

    let getterAss = () => {
      store.dispatch("assig/getAllForUser", store.state.auth.user.data);
    };

    return {
      getterAss,
      assignment: computed(() => store.state.assig.assignments.data),
      loading: computed(() => store.state.assig.assignments.loading),
    };
  },
  mounted() {
    this.getterAss();
  },
};
</script>
