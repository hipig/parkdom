window._ = require('lodash')

window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

import Alpine from "alpinejs"

window.Alpine = Alpine
Alpine.start()
