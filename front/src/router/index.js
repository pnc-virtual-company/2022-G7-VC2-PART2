import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
import LoginView from '../views/login/LoginView.vue'
import AddUserView from '../views/admin/AddUserView.vue'
import EroRegisterView from '../views/register/EroRegisterView.vue'
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;
import { store } from '../stores/userInfo'


const registerPath = "/ero/register/" + store.state.email;
const routes = [
  {
    path: "/",
    name: "profile",
    component: ProfileView,
  },
  {
    path: "/add/user",
    name: "addUser",
    component: AddUserView,
  },
  {
    path: registerPath,
    name: "eroRegister",
    component: EroRegisterView,
    props: true
  },
  {
    path: '/account/login',
    name: 'login',
    component: LoginView,
  }
  
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