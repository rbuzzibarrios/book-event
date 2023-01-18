<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <header class="bg-blue-grey-darken-4">
    <slot name="header"/>
  </header>

  <!-- Page Content -->
  <main>
    <slot/>
  </main>
</template>
