<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SearchEventForm from '@/Components/SearchEventForm.vue';
import { defineComponent } from 'vue';
import EventsList from '@/Components/EventsList.vue';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});

</script>

<template>
  <Head title="HOME|BOOK"/>
  <GuestLayout>
    <template #header>
      <v-container>
        <v-row justify="center">
          <v-col class="justify-center" align="justify">
            <div class="text-h3 text-white text-center mt-10"> Vida a tu alma</div>
            <div class="text-white text-center font-weight-thin mt-2"> Pensando en ti, participa en nuestras actividades...</div>
          </v-col>
        </v-row>
        <v-row>
          <SearchEventForm></SearchEventForm>
        </v-row>
      </v-container>
    </template>
    <v-container>
      <v-row>
        <v-col>
        <EventsList></EventsList>
        </v-col>
      </v-row>
    </v-container>
  </GuestLayout>

</template>
