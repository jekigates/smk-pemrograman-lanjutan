<template>
  <b-container>
    <b-row class="justify-content-center">
      <b-col cols="12" class="mt-4">
        <b-breadcrumb :items="items"></b-breadcrumb>
      </b-col>
      <b-col cols="12" class="mt-2">
        <NuxtLink to="/produk/create" class="btn btn-primary"
          >Tambah Produk</NuxtLink
        >
      </b-col>
      <b-col cols="12" class="mt-4">
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
                  <b-button variant="info" @click="updateProduk(produk.id)"
                    >Edit</b-button
                  >
                  <b-button variant="danger" @click="deleteProduk(produk.id)"
                    >Delete</b-button
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "ProdukPage",
  head: {
    title: "Produk",
  },
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
      this.$axios.get("/api/produk").then((response) => {
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
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value == true) {
          this.$axios.delete(`/api/produk/${id_produk}`).then((response) => {
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
