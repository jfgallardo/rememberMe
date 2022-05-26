import axios from "axios";
import store from "./store/store";


const axiosClient = axios.create({
  baseURL: "http://localhost:8000/api",
});


axiosClient.interceptors.request.use((config) => {
  config.headers.Authorization = `Bearer ${store.state.auth.user.token}`;
  return config;
});

export default axiosClient;
