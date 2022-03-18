window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
// Bootstrap
require('bootstrap');

window.axios = require('axios');
window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
