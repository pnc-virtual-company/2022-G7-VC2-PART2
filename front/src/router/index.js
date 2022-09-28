import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
import LoginView from '../views/login/LoginView.vue'
import EroRegisterView from '../views/register/EroRegisterView.vue'
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;
import { store } from '../stores/userInfo'
import admin from "../middleware/admin";
import ero from "../middleware/ero";
import alumni from "../middleware/alumni";
import adminAndEro from "../middleware/adminAndEro"
import AlumniRegister from '../views/register/AlumniRegister.vue'
import WaitForAccept from '../views/alumni/WaitForAccept.vue'
import UserManagementView from '../views/admin/UserManagementView.vue'



const registerPath = "/ero/register/" + store.state.email;
const routes = [
  {
    path: "/",
    name: "profile",
    component: () => {
      if(store.state.role == 'alumni'){
        if(store.state.permission == 'false'){
          return WaitForAccept
        }else{
          return ProfileView
        }
      }
      else if(store.state.role == 'admin'){
          return UserManagementView
      }else{
        return UserManagementView
      }
    }
  },
  {
    path: registerPath,
    name: "eroRegister",
    component: EroRegisterView,
    props: true,
    meta: { middleware: [ero] },
  },
  {
    path: '/account/alumni/register',
    name: "alumniRegister",
    component: AlumniRegister,
    props: true,
    meta: { middleware: [alumni] },
  },
  {
    path: '/account/alumni/register/requested',
    name: "alumniRegisterRequested",
    component: WaitForAccept,
    meta: { middleware: [alumni] },
  },
  {
    path: '/account/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/profile/alumni/:user_id',
    name: 'alumniProfile',
    component: ProfileView,
    props: true
  },
  { 
    path: '/:pathMatch(.*)*',
    redirect: () => {
      if(store.state.permission == 'false'){
        return '/account/alumni/register/requested'
      }else{
        return '/'
      }
    }
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to) => {
  const publicPages = ['/account/login', registerPath, '/account/alumni/register'];
  const authRequired = !publicPages.includes(to.path);
  const token = VueCookies.get('token')
  const decryptCookies = decryptData(token, TOKEN_SCRET_KEY)
  console.log(decryptCookies);
  console.log(store.state.permission)

  if(decryptCookies && !authRequired){
    return '/'
  } 
  
  if (decryptCookies === undefined && authRequired) {
    return '/account/login';
  }
});

export default router;