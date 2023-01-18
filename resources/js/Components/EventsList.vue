<script setup>
import EventCard from '@/Components/EventCard.vue';

defineProps({
  events: Array
})

</script>

<template>
  <v-container>
    <v-row>
      <v-col cols="4" v-for="event in events" :key="event.id">
        <EventCard :activity="event"></EventCard>
      </v-col>
      <v-col cols="12" class="text-center" v-if="!events.length">No existen actividades con los datos de búsqueda proporcionados</v-col>
    </v-row>
  </v-container>
</template>

