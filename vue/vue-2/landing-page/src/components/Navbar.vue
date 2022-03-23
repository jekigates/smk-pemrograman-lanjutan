<template>
  <div>
    <v-app-bar color="blue-grey darken-4" class="d-flex justify-center" id="navbar">
      <v-btn color="error" href="#home" class="navbar-link mx-2">Home</v-btn>
      <v-btn color="error" href="#about" class="navbar-link mx-2">About</v-btn>
      <v-btn color="error" href="#contact" class="navbar-link mx-2">Contact</v-btn>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  mounted() {
    var navbarBtns = document.querySelectorAll("#navbar .navbar-link");

    navbarBtns.forEach(function (navbarBtn) {
      navbarBtn.onclick = function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
        });
      };
    });
  },
};
</script>
