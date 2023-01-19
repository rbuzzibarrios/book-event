<script setup>
import EventCard from '@/Components/EventCard.vue';

const props = defineProps({
  events: Array,
  date: String,
  quantityPeople: Number,
})

const onBook = async (activityId) => {
  const {data} = await axios.post('book', {
    activity: activityId,
    date: props.date,
    quantity_people: props.quantityPeople,
  })

  console.log(data);
}

</script>

<template>
  <v-container>
    <v-row>
      <v-col cols="12" lg="4" xl="4" md="6" v-for="event in events" :key="event.id">
        <EventCard :activity="event" @book="onBook"></EventCard>
      </v-col>
      <v-col cols="12" class="text-center" v-if="!events.length">No existen actividades con los datos de búsqueda proporcionados</v-col>
    </v-row>
  </v-container>
</template>

