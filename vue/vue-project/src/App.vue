<template>
  <div id="app">
    <h2>Nama: {{ nama }}</h2>
    <button @click="changeName">Change Name</button>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      nama: "Jeki Gates",
      changeName() {
        this.nama = "Jeki Gates Liau";
      },
    };
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
