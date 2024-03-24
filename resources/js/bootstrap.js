import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const host = window.location.origin;

axios.defaults.baseURL = host;
export default axios;

