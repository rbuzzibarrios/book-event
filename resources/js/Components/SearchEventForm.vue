<script setup>

import Datepicker from 'vue3-datepicker';
import { inject, ref, watch } from 'vue';
import { format } from 'date-fns';

const emit = defineEmits(['submit']);

const searchData = inject("searchData");
const date = ref(searchData.value.activity_date);
const quantityPeople = ref(searchData.value.quantity_people);

const onSubmit = () => {
  const date = searchData.value?.activity_date ? format(searchData.value?.activity_date, "yyyy-MM-dd") : null;

  emit('submit', {
    date
  });
};

const onChangeDate = (value) => {
  searchData.value.activity_date = value;
};

const onChangeQuantityPeople = (value) => {
  searchData.value.quantity_people = value;
};

</script>

<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="8" xl="10" lg="10">
        <v-form @submit.prevent="onSubmit">
          <v-container>
            <v-row>
              <v-col cols="5">
                <Datepicker
                    v-model="date"
                    input-format="dd-MM-yyyy"
                    placeholder="Fecha de Actividad"
                    class="v-field v-field--variant-solo bg-white w-100 h-100"
                    @update:modelValue="onChangeDate"
                >
                </Datepicker>
              </v-col>
              <v-col cols="5">
                <v-text-field
                    v-model="quantityPeople"
                    label="Número de personas"
                    type="number"
                    prepend-inner-icon="mdi-account-group"
                    variant="solo"
                    @update:modelValue="onChangeQuantityPeople"
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

