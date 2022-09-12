import axios from "axios";

export default axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    "Content-type": "application/json",
    'Authorization': 'Bearer ' +  decryptData(getCookie('slms'), 'my_token')
  }
});




