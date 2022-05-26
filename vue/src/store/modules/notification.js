import axiosClient from "../../axios";

export const namespaced = true;

export const state = () => ({});

export const getters = {};

export const mutations = {};

export const actions = {
  createNotification({ commit }, formData) {
    return axiosClient.post("/notification", formData).then(({ response }) => {
      return response;
    });
  },
};
