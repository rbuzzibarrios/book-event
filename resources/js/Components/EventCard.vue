<script setup>

import { computed } from 'vue';

const props = defineProps({
  activity: Object
});

const shortEventTitle = computed(
    () => {
      return props.activity.title.length > 24 ? props.activity.title.substr(0, 24) + "..." : props.activity.title;
    }
);
</script>

<template>
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
            <v-btn color="orange">
              Comprar
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
