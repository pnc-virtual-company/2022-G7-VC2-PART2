import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileTest.vue'
const routes = [
  {
    path: "/",
    name: "Home",
    component: ProfileView,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;