<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" v-for="item in items">
              <a v-bind:href="item.href">{{ item.text }}</a>
            </li>
          </ol>
        </nav>
      </div>
      <div class="col-12 mt-2">
        <a href="/produk/create" class="btn btn-primary">Tambah Produk</a>
      </div>
      <div class="col-12 mt-4">
        <div class="table-responsive">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(produk, index) in produks">
                <td>{{ index + 1 }}</td>
                <td>{{ produk.nama }}</td>
                <td>{{ produk.merek }}</td>
                <td>{{ produk.harga_beli }}</td>
                <td>{{ produk.harga_jual }}</td>
                <td>{{ produk.stok }}</td>
                <td>
                  <button class="btn btn-info" @click="updateProduk(produk.id)">Edit</button>
                  <button class="btn btn-danger" @click="deleteProduk(produk.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ProdukPage",
  data() {
    return {
      items: [
        {
          text: "Home",
          href: "/",
        },
        {
          text: "Produk",
          href: "/produk",
          active: true,
        },
      ],
      produks: {},
    };
  },
  methods: {
    async getProduk() {
      axios.get("http://127.0.0.1:8000/api/produk").then((response) => {
        this.produks = response.data.data;
      });
    },
    async updateProduk(id_produk) {
      this.$router.push(`/produk/edit/${id_produk}`);
    },
    async deleteProduk(id_produk) {
      this.$swal({
        title: "Apakah kamu yakin?",
        text: "Data yang dihapus tidak akan bisa dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value == true) {
          axios.delete(`http://127.0.0.1:8000/api/produk/${id_produk}`).then((response) => {
            this.$swal("Selamat!", response.data.message, "success");
            this.getProduk();
          });
        }
      });
    },
  },
  created() {
    this.getProduk();
  },
};
</script>

<style></style>
