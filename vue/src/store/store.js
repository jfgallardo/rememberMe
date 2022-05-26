import { createStore } from "vuex";
import * as auth from "./modules/auth";
import * as assig from "./modules/assignment";
import * as noti from "./modules/notification";

const store = createStore({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: { auth, assig, noti },
});

export default store