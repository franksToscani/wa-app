import '@primevue/themes/aura'        // tema PrimeVue (nuova API)
import 'primeicons/primeicons.css'

import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import ToastService from 'primevue/toastservice'
import axios from 'axios'

// CSRF per POST dal front-end (importantissimo per 419/route)
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['X-CSRF-TOKEN'] =
  document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')

import CategoryTypesForm from './CategoryTypeForm.vue'

const app = createApp(CategoryTypesForm)
app.use(PrimeVue)
app.use(ToastService)
app.mount('#app')
