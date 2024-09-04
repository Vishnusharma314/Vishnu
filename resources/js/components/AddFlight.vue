<template>
  <div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Add New Flight</h2>
    <form @submit.prevent="submitFlight" class="space-y-4">
      <div>
        <label for="flight_name" class="block text-gray-700 font-medium">Flight Name</label>
        <input
          type="text"
          id="flight_name"
          v-model="flight_name"
          placeholder="Enter flight name"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
          required
        >
      </div>
      <div>
        <label for="takeoff_location" class="block text-gray-700 font-medium">Takeoff Location</label>
        <input
          type="text"
          id="takeoff_location"
          v-model="takeoff_location"
          placeholder="Enter take off location"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
          required
        >
      </div>
      <div>
        <label for="landing_location" class="block text-gray-700 font-medium">Landing Location</label>
        <input
          type="text"
          id="landing_location"
          v-model="landing_location"
          placeholder="Enter landing location"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
          required
        >
      </div>
      <div>
        <label for="operating_days" class="block text-gray-700 font-medium">Operating Days</label>
        <select
          id="operating_days"
          v-model="operating_days"
          multiple
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
        >
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>
      </div>
      <button
        type="submit"
        class="mt-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
      >
        Add Flight
      </button>
    </form>
  </div>
</template>

<script>
import 'select2';
import axios from 'axios';
import 'select2/dist/css/select2.min.css';

export default {
  data() {
    return {
      flight_name: '',
      takeoff_location: '',
      landing_location: '',
      operating_days: [], // This should be an array for multiple selection
    };
  },
  mounted() {
    // Initialize Select2 on the select element
    this.$nextTick(() => {
      $('#operating_days').select2({
        placeholder: 'Select operating days',
        width: '100%', // Adjust as needed
      }).on('change', (e) => {
        this.operating_days = $(e.target).val(); // Update Vue model
      });
    });
  },
  beforeDestroy() {
    // Destroy Select2 instance when component is destroyed
    $('#operating_days').select2('destroy');
  },
  methods: {
    submitFlight() {
      axios.post('/admin/flights', {
        flight_name: this.flight_name,
        takeoff_location: this.takeoff_location,
        landing_location: this.landing_location,
        operating_days: this.operating_days,
      }).then(response => {
        alert('Flight added successfully');
      }).catch(error => {
        console.error(error);
      });
    },
  },
};
</script>