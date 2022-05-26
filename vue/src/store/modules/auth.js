import axiosClient from "../../axios";

export const namespaced = true;

export const state = () => ({
  user: {
    data: {},
    token: sessionStorage.getItem("TOKEN"),
  },
});

export const getters = {};

export const mutations = {
  setUser: (state, userData) => {
    state.user.token = userData.token;
    state.user.data = userData.user;
    sessionStorage.setItem("TOKEN", userData.token);
  },
  logout: (state) => {
    state.user.data = {};
    state.user.token = null;
    sessionStorage.removeItem("TOKEN");
  },
};

export const actions = {
  register({ commit }, user) {
    return axiosClient.post("/register", user).then(({ data }) => {
      commit("setUser", data);
      return data;
    });
  },
  login({ commit }, user) {
    return axiosClient.post("/login", user).then(({ data }) => {
      commit("setUser", data);
      return data;
    });
  },
  logout({ commit }) {
    return axiosClient.post("/logout").then((response) => {
      commit("logout");
      return response;
    });
  },
};
