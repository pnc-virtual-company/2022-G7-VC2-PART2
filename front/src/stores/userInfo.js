const USER_SCRET_KEY = import.meta.env.VITE_APP_USER_KEY;
import { createStore } from 'vuex';
import VueCookies from 'vue-cookies'
import decryptData from "../helper/decrypt";
const user_id = VueCookies.get('user_id')
const decryptCookies = decryptData(user_id, USER_SCRET_KEY)


export const store = new createStore({
  state: {
    user_id: parseInt(decryptCookies)
  },
  actions: {
    logout(){
      document.cookie = `${'token'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      document.cookie = `${'user_id'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      axios.get('/logout')
    }
  }
})
