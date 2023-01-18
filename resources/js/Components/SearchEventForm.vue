<script setup>

import Datepicker from 'vue3-datepicker';
import { ref } from 'vue';
import { format } from 'date-fns';

const emit = defineEmits(['submit']);

const date = ref(new Date());

const onSubmit = () => {
  emit('submit', {
    date: format(date.value, 'yyyy-MM-dd')
  })
}

</script>

<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="8" xl="10" lg="10">
        <v-form @submit.prevent="onSubmit">
          <v-container>
            <v-row>
              <v-col cols="5">
                <datepicker
                    input-format="dd-MM-yyyy"
                    v-model="date"
                    class="v-field v-field--variant-solo bg-white w-100 h-100"
                >
                </datepicker>
              </v-col>
              <v-col cols="5">
                <v-text-field
                    label="Número de personas"
                    type="number"
                    prepend-inner-icon="mdi-account-group"
                    variant="solo"
                ></v-text-field>
              </v-col>
              <v-col class="m-2">
                <v-btn color="primary" type="submit">
                  Buscar
                </v-btn>

              </v-col>
            </v-row>


          </v-container>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

