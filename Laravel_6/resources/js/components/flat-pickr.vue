<template>
  <div>
    <flat-pickr v-model="date"></flat-pickr>
  </div>
</template>

<script>
  import flatPickr from 'node_modules/flatpickr/flatpickr.js';
  import 'node_modules/flatpickr/dist/flatpickr.css';

  export default {    
    data () {
      return {
        date: null,       
      }
    }
  }
</script>