import axios from "axios";
const API_KEY = import.meta.env.VITE_APP_API_URL;
const TOKEN_SCRET_KEY = import.meta.env.VITE_APP_TOKEN_KEY;

import decryptData from "./helper/decrypt";
import VueCookies from 'vue-cookies'
const cookies = VueCookies.get('token')
const decryptCookies = decryptData(cookies, TOKEN_SCRET_KEY)

export default axios.create({
  baseURL: API_KEY,
  headers: {
    "Content-type": "application/json",
    'Authorization': 'Bearer ' +  decryptData(cookies, TOKEN_SCRET_KEY)
  }
});




