import axios from 'axios';

let hostName = "";
if (process.env.NODE_ENV === "development") {
    hostName = process.env.MIX_DEV_URL;
} else if (process.env.NODE_ENV === "production") {
    hostName = process.env.MIX_PROD_URL;
}

const apiClient = axios.create({
    baseURL: hostName,
    withCredentials: true,
});

export default apiClient;
