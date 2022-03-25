window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
    require('overlayscrollbars');
    require('bootstrap');
    require('../../vendor/almasaeed2010/adminlte/dist/js/adminlte');

    window.Swal = require('sweetalert2')
    window.axios = require('axios');

} catch (e) {}


window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
