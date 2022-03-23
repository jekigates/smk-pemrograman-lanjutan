<template>
  <v-app>
    <v-app-bar app color="white">
      <v-container>
        <v-row justify="center">
          <v-col cols="10" class="d-flex">
            <div class="headline font-weight-bold">Instagram</div>

            <v-spacer></v-spacer>

            <v-btn href="#" text small>
              <v-icon>mdi-home</v-icon>
            </v-btn>
            <v-btn href="#" text small>
              <v-icon>mdi-chat-outline</v-icon>
            </v-btn>
            <v-btn href="#" text small>
              <v-icon>mdi-plus-box-outline</v-icon>
            </v-btn>
            <v-btn href="#" text small>
              <v-icon>mdi-heart-outline</v-icon>
            </v-btn>
            <v-btn href="#" text small>
              <v-avatar size="24">
                <v-img src="@/assets/img/jeki.jpeg"></v-img>
              </v-avatar>
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>

    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",

  data: () => ({
    //
  }),
};
</script>
