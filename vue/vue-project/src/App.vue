<template>
  <div id="app">
    <input type="text" name="" id="" v-model="nama" />
    {{ nama }}
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      nama: "Jeki Gates",
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
