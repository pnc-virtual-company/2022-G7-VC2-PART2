import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
import AdminProfile from '../views/alumni/components/AdminComponents/CardDetail.vue'
const routes = [
  {
    path: "/AdminProfile",
    name: "AdminProfile",
    component: AdminProfile,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;