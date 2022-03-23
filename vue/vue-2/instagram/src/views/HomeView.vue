<template>
  <!-- <hello-world /> -->
  <v-container>
    <v-row justify="center">
      <v-col cols="6">
        <v-card class="d-flex justify-left py-3">
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
          <div class="text-center mx-3">
            <v-avatar size="56">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="caption">Jeki Gates</div>
          </div>
        </v-card>
        <v-card class="mt-4" dense>
          <v-container>
            <v-row>
              <v-col cols="12" class="d-flex align-center">
                <v-avatar size="36">
                  <v-img src="@/assets/img/jeki.jpeg"></v-img>
                </v-avatar>
                <div class="subtitle-2 ml-4">Jeki Gates</div>

                <v-spacer></v-spacer>

                <v-btn href="#" text small>
                  <v-icon>mdi-dots-horizontal</v-icon>
                </v-btn>
              </v-col>
              <v-col cols="12">
                <v-img src="@/assets/img/jeki.jpeg" height="800"></v-img>
              </v-col>
              <v-col cols="12" class="d-flex align-center">
                <v-btn href="#" text small>
                  <v-icon>mdi-heart-outline</v-icon>
                </v-btn>
                <v-btn href="#" text small>
                  <v-icon>mdi-comment-outline</v-icon>
                </v-btn>
                <v-btn href="#" text small>
                  <v-icon>mdi-send-outline</v-icon>
                </v-btn>

                <v-spacer></v-spacer>

                <v-btn href="#" text small>
                  <v-icon>mdi-dots-horizontal</v-icon>
                </v-btn>
              </v-col>
              <v-col cols="12">
                <div class="body-1">
                  <span class="font-weight-bold">jekigts</span> Jangan lupa follow saya karena akan selalu ada update untuk projek keren selanjutnya
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-col>
      <v-col cols="4">
        <v-card class="mt-4">
          <v-row class="pa-4">
            <v-col cols="12" class="d-flex align-center">
              <v-avatar size="56">
                <v-img src="@/assets/img/jeki.jpeg"></v-img>
              </v-avatar>
              <div class="ms-4">
                <div class="body font-weight-bold">jekigts</div>
                <div class="body">Jeki Gates</div>
              </div>

              <v-spacer></v-spacer>

              <v-btn text color="primary">switch</v-btn>
            </v-col>
            <v-col cols="12" class="d-flex">
              <div class="body">Suggestion</div>
              <v-spacer></v-spacer>
              <div class="body black--text">See All</div>
            </v-col>
            <v-col cols="12" class="d-flex align-center">
              <v-avatar size="32">
                <v-img src="@/assets/img/jeki.jpeg"></v-img>
              </v-avatar>
              <div class="ms-4">
                <div class="caption font-weight-bold">jekigts</div>
                <div class="caption">Jeki Gates</div>
              </div>

              <v-spacer></v-spacer>

              <v-btn text color="primary" small>follow</v-btn>
            </v-col>
            <v-col cols="12" class="d-flex align-center">
              <v-avatar size="32">
                <v-img src="@/assets/img/jeki.jpeg"></v-img>
              </v-avatar>
              <div class="ms-4">
                <div class="caption font-weight-bold">jekigts</div>
                <div class="caption">Jeki Gates</div>
              </div>

              <v-spacer></v-spacer>

              <v-btn text color="primary" small>follow</v-btn>
            </v-col>
            <v-col cols="12" class="d-flex align-center">
              <v-avatar size="32">
                <v-img src="@/assets/img/jeki.jpeg"></v-img>
              </v-avatar>
              <div class="ms-4">
                <div class="caption font-weight-bold">jekigts</div>
                <div class="caption">Jeki Gates</div>
              </div>

              <v-spacer></v-spacer>

              <v-btn text color="primary" small>follow</v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import HelloWorld from "../components/HelloWorld";

export default {
  name: "Home",

  components: {
    HelloWorld,
  },
};
</script>
