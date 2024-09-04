import { createApp } from 'vue';

import FlightSearch from './components/FlightSearch.vue';
import AddFlight from './components/AddFlight.vue';
// resources/js/app.js
import '../css/app.css';
import 'select2/dist/css/select2.min.css';
import axios from 'axios';


const app = createApp({});

app.component('flight-search', FlightSearch);
app.component('add-flight', AddFlight);

app.mount('#app');
