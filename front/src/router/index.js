import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
import LoginView from '../views/login/LoginView.vue'
import AddUserView from '../views/admin/AddUserView.vue'
import EroRegisterView from '../views/register/EroRegisterView.vue'
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;
import { store } from '../stores/userInfo'
import admin from "../middleware/admin";
import ero from "../middleware/ero";
import alumni from "../middleware/alumni";

// Test Routes
import AdminHome from '../views/admin/AdminHome.vue'
import EroHome from '../views/ero/EroHome.vue'
import Alumni from '../views/alumni/AlumniHome.vue'


const registerPath = "/ero/register/" + store.state.email;
const routes = [
  {
    path: "/",
    name: "profile",
    component: ProfileView,
  },
  {
    path: "/invite/user",
    name: "inviteUser",
    component: AddUserView,
    meta: { middleware: [admin] },
  },
  {
    path: registerPath,
    name: "eroRegister",
    component: EroRegisterView,
    props: true,
    meta: { middleware: [ero] },
  },
  {
    path: '/account/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/admin/home',
    name: 'admin',
    component: AdminHome,
    meta: { middleware: [admin] },

  },
  {
    path: '/ero/home',
    name: 'ero',
    component: EroHome,
    meta: { middleware: [!alumni] },
  },
  {
    path: '/alumni/home',
    name: 'alumni',
    component: Alumni,
    meta: { middleware: [alumni] },
  },
  { 
    path: '/:pathMatch(.*)*',
    redirect: '/'
  },
  
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to) => {
  const publicPages = ['/account/login', registerPath];
  const authRequired = !publicPages.includes(to.path);
  const token = VueCookies.get('token')
  const decryptCookies = decryptData(token, TOKEN_SCRET_KEY)
  console.log(decryptCookies);

  if(decryptCookies && !authRequired){
    return '/'
  } 
  
  if (decryptCookies === undefined && authRequired) {
    return '/account/login';
  }
});

export default router;