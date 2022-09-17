import { createWebHistory, createRouter } from "vue-router";
import ProfileView from '../views/alumni/ProfileView.vue'
import LoginView from '../views/login/LoginView.vue'
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;


const routes = [
  {
    path: "/",
    name: "profile",
    component: ProfileView,
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
  const publicPages = ['/account/login'];
  const authRequired = !publicPages.includes(to.path);
  const token = VueCookies.get('token')
  const decryptCookies = decryptData(token, TOKEN_SCRET_KEY)
  console.log(decryptCookies);

  if(decryptCookies && !authRequired){
    console.log('already authenticated');
    return '/'
  } 
  
  if (decryptCookies === undefined && authRequired) {
    return '/account/login';
  }
});

export default router;