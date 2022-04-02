<script setup lang="ts"></script>

<template>
  <!-- use the router-link component for navigation. -->
  <!-- specify the link by passing the `to` prop. -->
  <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
  <ul>
    <li>
      <router-link to="/">Go to Home</router-link>
    </li>
    <li>
      <router-link to="/about">Go to About</router-link>
    </li>
  </ul>
  <!-- route outlet -->
  <!-- component matched by the route will render here -->
  <router-view></router-view>
</template>
