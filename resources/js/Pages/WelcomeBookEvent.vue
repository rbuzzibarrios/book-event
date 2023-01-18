<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import SearchEventForm from '@/Components/SearchEventForm.vue';
import { ref } from 'vue';
import EventsList from '@/Components/EventsList.vue';
import axios from 'axios';

const props = defineProps({
  events: Array,
});

const filteredEvents = ref(props.events)

const search = async (values) => {
  const { data: { events } } = await axios.post('events', values);

  filteredEvents.value = events;
}

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
          <SearchEventForm @submit="search"></SearchEventForm>
        </v-row>
      </v-container>
    </template>
    <v-container>
      <v-row>
        <v-col>
        <EventsList :events="filteredEvents"></EventsList>
        </v-col>
      </v-row>
    </v-container>
  </GuestLayout>
</template>
