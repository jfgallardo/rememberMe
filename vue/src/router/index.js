import { createRouter, createWebHistory } from "vue-router";
import Login from "../view/Login.vue";
import Dashboard from "../view/Dashboard.vue";
import Register from "../view/Register.vue";
import NotFound from "../view/NotFound.vue";
import Assignment from "../view/Assignment.vue";
import AssignmentView from "../view/AssignmentView.vue";
import LayoutComponent from "../components/LayoutComponent.vue";
import AuthComponent from "../components/AuthComponent.vue";
import store from "../store/store";

const routes = [
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: NotFound,
  },
  {
    path: "/",
    name: "LayoutComponent",
    meta: { requiresAuth: true },
    redirect: "/dashboard",
    component: LayoutComponent,
    children: [
      { path: "/dashboard", name: "Dashboard", component: Dashboard },
      { path: "/assignment", name: "Assignment", component: Assignment },
      {
        path: "/assignment/create",
        name: "CreateAssignment",
        component: AssignmentView,
      },
      {
        path: "/assignment/:id",
        name: "AssignmentView",
        component: AssignmentView,
      },
    ],
  },
  {
    path: "/auth",
    name: "AuthComponent",
    meta: { isGuest: true },
    redirect: "/login",
    component: AuthComponent,
    children: [
      { path: "/login", name: "Login", component: Login },
      { path: "/register", name: "Register", component: Register },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.auth.user.token) {
    next({ name: "Login" });
  } else if (store.state.auth.user.token && to.meta.isGuest) {
    next({ name: "Dashboard" });
  } else {
    next();
  }
});

export default router;
