import axios from "axios";
const API_KEY = import.meta.env.VITE_APP_API_URL;

export default axios.create({
  baseURL: API_KEY,
  headers: {
    "Content-type": "application/json",
    // 'Authorization': 'Bearer ' +  
  }
});




