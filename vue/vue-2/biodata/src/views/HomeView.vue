<template>
  <div class="d-flex justify-center">
    <v-card :loading="loading" min-width="374" max-width="374">
      <template slot="progress">
        <v-progress-linear color="blue" height="10" indeterminate></v-progress-linear>
      </template>

      <v-img height="250" src="../assets/img/jeki.jpeg"></v-img>

      <v-card-title>Jeki Gates</v-card-title>

      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating :value="4.5" color="amber" dense half-increments readonly size="14"></v-rating>

          <div class="grey--text ms-4">4.5 (413)</div>
        </v-row>

        <div class="my-4 text-subtitle-1">Web Programmer</div>

        <div>Saya adalah seorang web programmer lulusan SMK Kristen Immanuel Pontianak.</div>
      </v-card-text>

      <v-divider class="mx-4"></v-divider>

      <v-card-title>Jadwal Pemesanan Program</v-card-title>

      <v-card-text>
        <v-chip-group v-model="selection" active-class="blue white--text" column>
          <v-chip>17:30</v-chip>

          <v-chip>19:30</v-chip>

          <v-chip>20:00</v-chip>

          <v-chip>21:00</v-chip>
        </v-chip-group>
      </v-card-text>

      <v-card-actions>
        <v-btn depressed color="blue" @click="reserve" class="white--text">
          <v-icon left> mdi-chat </v-icon>
          Chat</v-btn
        >
      </v-card-actions>
    </v-card>
    <v-card :loading="loading" class="ms-16" min-width="374" max-width="374">
      <template slot="progress">
        <v-progress-linear color="blue" height="10" indeterminate></v-progress-linear>
      </template>

      <v-card-title>Daftar Bahasa Dikuasai</v-card-title>

      <v-expansion-panels>
        <v-expansion-panel>
          <v-expansion-panel-header>Laravel</v-expansion-panel-header>
          <v-expansion-panel-content> Framework PHP untuk membuat backend pada sebuah projek website. </v-expansion-panel-content>
        </v-expansion-panel>
        <v-expansion-panel>
          <v-expansion-panel-header>Vue</v-expansion-panel-header>
          <v-expansion-panel-content> Framework Frontend (JS) untuk membuat frontend pada sebuah projek website. </v-expansion-panel-content>
        </v-expansion-panel>
        <v-expansion-panel>
          <v-expansion-panel-header>C#</v-expansion-panel-header>
          <v-expansion-panel-content> Bahasa pemrograman untuk membuat aplikasi desktop pada visual studio. </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Home",
  data: () => ({
    loading: false,
    selection: 1,
  }),

  methods: {
    reserve() {
      this.loading = true;

      setTimeout(() => (this.loading = false), 2000);
    },
  },
};
</script>
