<template>
  <div id="app">
    <a :href="url">Go To Jeki Gates</a>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      url: "https://github.com/jekigates",
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
