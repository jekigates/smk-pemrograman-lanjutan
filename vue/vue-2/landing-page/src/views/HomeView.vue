<template>
  <div>
    <navbar style="position: sticky; top: 0; z-index: 999" />
    <v-card height="100vh" color="teal lighten-1" class="d-flex align-center" id="home" dark>
      <v-container>
        <v-row justify="center">
          <v-col cols="8" class="text-center">
            <v-avatar size="250" class="mb-8">
              <v-img src="@/assets/img/jeki.jpeg"></v-img>
            </v-avatar>
            <div class="text-h2 font-weight-medium">JEKI GATES</div>
            <hr class="my-4" />
            <div class="text-h6 font-weight-regular">Graphic Artist - Web Developer - Desktop Developer</div>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <v-card height="100vh" color="white" class="d-flex align-center" id="about">
      <v-container>
        <v-row class="justify-center">
          <v-col cols="8">
            <div class="text-h2 font-weight-medium text-center">About</div>
            <hr class="my-4" />
            <v-container fluid>
              <v-row dense class="text-left">
                <v-col cols="6">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate provident, consectetur sunt dolores quis pariatur
                    quidem at dignissimos eum error velit dolorum unde tempore, nemo soluta reiciendis doloremque architecto!
                  </p>
                </v-col>
                <v-col cols="6">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit repudiandae explicabo hic amet labore repellat eligendi unde laudantium
                  minus, blanditiis est, dolores illum iure quam molestiae. Dicta soluta mollitia repellat?
                </v-col>
              </v-row>
            </v-container>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <v-card height="100vh" color="teal lighten-1" class="d-flex align-center" id="contact" dark>
      <v-container>
        <v-row justify="center">
          <v-col cols="8" class="text-center">
            <div class="text-h2 font-weight-medium">Contact Me</div>
            <hr class="my-4" />
            <v-text-field label="Nama" dark></v-text-field>
            <v-text-field label="Email Address" dark></v-text-field>
            <v-text-field label="Phone Number" dark></v-text-field>
            <v-text-field label="Message" dark></v-text-field>
            <v-btn color="white" class="black--text">Send</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <bottom-navbar />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar";
import BottomNavbar from "@/components/BottomNavbar";

export default {
  name: "Home",
  metaInfo: {
    title: "Landing Page",
  },
  components: {
    Navbar,
    BottomNavbar,
  },
};
</script>
