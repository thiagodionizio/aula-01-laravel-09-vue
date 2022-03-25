require('./bootstrap');
window.Vue = require('vue').default;
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.config.productionTip = true;
const app = new Vue({
    el: '#app',
    mounted() {
        this.enableInterceptor()
    },
    data: {
        isLoading: false,
        axiosInterceptor: null,
    },
    methods: {
        enableInterceptor() {
            const token = localStorage.getItem('token');

            if (token) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

            }
            this.axiosInterceptor = window.axios.interceptors.request.use((config) => {
                this.isLoading = true
                return config
            }, (error) => {
                this.isLoading = false
                return Promise.reject(error)
            })

            window.axios.interceptors.response.use((response) => {
                this.isLoading = false
                return response
            }, function(error) {
                this.isLoading = false
                return Promise.reject(error)
            })

            window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        },

        disableInterceptor() {
            window.axios.interceptors.request.eject(this.axiosInterceptor)
        },
    },
});
