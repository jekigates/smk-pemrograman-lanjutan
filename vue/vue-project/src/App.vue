<template>
  <div id="app">
    <input type="text" name="" id="" v-model="cari" />
    <ul>
      <li v-for="item in cariData" :key="item.id">
        {{ item.title }} - {{ item.price }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      cari: "",
      products: [],
    };
  },
  created() {
    this.products = [
      { id: 1, title: "Product 1", price: 3000 },
      { id: 2, title: "Product 2", price: 2000 },
      { id: 3, title: "Product 3", price: 1000 },
      { id: 4, title: "Product 4", price: 5000 },
      { id: 5, title: "Product 5", price: 4000 },
    ];
  },
  computed: {
    cariData() {
      return this.products.filter((item) => {
        return item.title.match(this.cari);
      });
    },
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
