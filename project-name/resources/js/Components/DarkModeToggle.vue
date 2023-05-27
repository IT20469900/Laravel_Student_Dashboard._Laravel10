<template>
    <div>
      <button @click="toggleDarkMode">Toggle Dark Mode</button>
      
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      toggleDarkMode() {
        const body = document.querySelector('body')
        body.classList.toggle('dark') 
      },
    },
  }
  </script>
  
  <style>
  
  </style>
  