const USER_SCRET_KEY = import.meta.env.VITE_APP_USER_KEY;
const ROLE_SCRET_KEY = import.meta.env.VITE_APP_USER_ROLE_KEY;
const ACTIVATED_SCRET_KEY = import.meta.env.VITE_APP_ACTIVATED_KEY;

import { createStore } from 'vuex';
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const user_id = VueCookies.get('user_id')
const user_role = VueCookies.get('user_role')
const user_activated = VueCookies.get('activated')
const decryptUserId = decryptData(user_id, USER_SCRET_KEY)
const decryptRole = decryptData(user_role, ROLE_SCRET_KEY)
const decryptPermission = decryptData(user_activated, ACTIVATED_SCRET_KEY)


export const store = new createStore({
  state: {
    user_id: parseInt(decryptUserId),
    email: '',
    role: decryptRole,
    permission: decryptPermission
  },
  actions: {
    logout(){
      document.cookie = `${'token'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      document.cookie = `${'user_id'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      document.cookie = `${'user_role'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      document.cookie = `${'activated'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    }
  }
})
