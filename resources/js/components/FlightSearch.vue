<template>
  <div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Search Flights</h2>
    <form @submit.prevent="searchFlights" class="space-y-4">
      <div>
        <label for="boarding_location" class="block text-sm font-medium text-gray-700">Boarding Location</label>
        <input
          type="text"
          id="boarding_location"
          v-model="boarding_location"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
          placeholder="Enter boarding location"
        />
      </div>
      <div>
        <label for="destination_location" class="block text-sm font-medium text-gray-700">Destination Location</label>
        <input
          type="text"
          id="destination_location"
          v-model="destination_location"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
          placeholder="Enter destination location"
        />
      </div>
      <div>
        <label for="day_of_travel" class="block text-sm font-medium text-gray-700">Date of Travel</label>
        <input
          type="date"
          id="day_of_travel"
          v-model="day_of_travel"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
        />
      </div>
      <button
        type="submit"
        class="mt-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Search
      </button>
    </form>

    <div v-if="searchPerformed && flights.length" class="mt-6">
      <h3 class="text-xl font-bold mb-2">Available Flights</h3>
      <ul class="space-y-2">
        <li
          v-for="flight in flights"
          :key="flight.id"
          class="p-4 border border-gray-200 rounded-md shadow-sm bg-white"
        >
          <div class="text-lg font-semibold">{{ flight.name }}</div>
          <div class="text-sm text-gray-600">{{ flight.takeoff_location }} to {{ flight.landing_location }}</div>
          <div class="text-sm text-gray-500">{{ flight.operating_days.join(', ') }}</div>
        </li>
      </ul>
    </div>
    <div v-else-if="searchPerformed" class="mt-6">
      <p class="text-gray-500">No flights found</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      boarding_location: '',
      destination_location: '',
      day_of_travel: '',
      flights: [],
      searchPerformed: false, // Track if search has been performed
    };
  },
  methods: {
    searchFlights() {
      axios.get('/flights/search', {
        params: {
          boarding_location: this.boarding_location,
          destination_location: this.destination_location,
          day_of_travel: new Date(this.day_of_travel).toLocaleDateString('en-US', { weekday: 'long' }),
        },
      }).then(response => {
        this.flights = response.data.map(flight => {
          return {
            ...flight,
            operating_days: JSON.parse(flight.operating_days),
          };
        });
        this.searchPerformed = true; // Mark that search has been performed
        console.log(this.flights);
      }).catch(error => {
        console.error(error);
      });
    },
  },
};
</script>
