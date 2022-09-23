import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
const routes = [
  {
    path: "/profile",
    name: "profile",
    component: ProfileView,
  },
  
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;