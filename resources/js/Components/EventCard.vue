<script setup>

import { computed, inject, ref } from 'vue';
import { format } from 'date-fns';

const props = defineProps({
  activity: Object
});

const shortEventTitle = computed(
    () => {
      return props.activity.title.length > 24 ? props.activity.title.substr(0, 24) + "..." : props.activity.title;
    }
);

const searchData = inject("searchData");

const showDialogMessage = ref(false);

const book = async () => {
  const date = searchData.value?.activity_date ? format(searchData.value?.activity_date, "yyyy-MM-dd") : null;

  const { data } = await axios.post('book', {
    date,
    activity: props.activity?.id,
    quantity_people: searchData.value.quantity_people,
  });

  console.log(data);

  showDialogMessage.value = true;
};
</script>

<template>
  <v-dialog width="400" v-model="showDialogMessage" persistent>
    <v-card>
      <v-card-text class="justify-center text-center">
        La reserva se ha creado satisfactoriamente.
      </v-card-text>
      <v-card-actions class="justify-center">
        <v-btn color="primary" @click="showDialogMessage = false">Aceptar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-card>
    <v-card-text>
      <v-row>
        <v-col align-self="center">
          <div class="text-center text-h5">
            <div class="text-center"
            >
              {{ shortEventTitle }}
            </div>

            <v-tooltip activator="parent" location="top">
              {{ activity.title }}
            </v-tooltip>
          </div>
          <div class="text-center">
            <v-rating :model-value="activity.rating"></v-rating>
          </div>
          <div class="text-center text-h5">
            <div class="text-center">${{ activity.price }}</div>
          </div>
          <div class="text-center mt-3">
            <v-btn color="orange" @click="book">
              Comprar
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
