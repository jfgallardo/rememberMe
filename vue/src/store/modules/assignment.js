import axiosClient from "../../axios";

export const namespaced = true;

export const state = () => ({
  assignments: {
    loading: false,
    data: [],
  },
});

export const getters = {
  getterValue: (state) => {
    return state.value;
  },
};

export const mutations = {
  setAssignment: (state, data) => {
    state.assignments.data = data;
  },
  setAssignmentLoading: (state, data) => {
    state.assignments.loading = data;
  },
};

export const actions = {
  create({ commit }, formData) {
    return axiosClient.post("/assignment", formData).then(({ response }) => {
      return response;
    });
  },
 getAllForUser({ commit }, user) {
    commit("setAssignmentLoading", true);
    return axiosClient.get(`/assignment/${user.id}`).then(({ data }) => {
      commit("setAssignmentLoading", false);
      commit("setAssignment", data);
      return data;
    });
  },
};
