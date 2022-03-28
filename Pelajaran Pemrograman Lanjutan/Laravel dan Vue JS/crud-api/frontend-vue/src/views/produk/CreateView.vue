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
        <form @submit="onSubmit" @reset="onReset" v-if="show">
          <div class="form-group">
            <label for="input-nama" class="form-label">Nama</label>
            <input class="form-control" id="input-nama" v-model="form.nama" type="text" placeholder="Ketik nama" required />
          </div>
          <div class="form-group">
            <label for="input-merek" class="form-label">Merek</label>
            <input class="form-control" id="input-merek" v-model="form.merek" type="text" placeholder="Ketik merek" required />
          </div>
          <div class="form-group">
            <label for="input-harga_beli" class="form-label">Harga Beli</label>
            <input class="form-control" id="input-harga_beli" v-model="form.harga_beli" type="number" placeholder="Ketik harga beli" required />
          </div>
          <div class="form-group">
            <label for="input-harga_jual" class="form-label">Harga Jual</label>
            <input class="form-control" id="input-harga_jual" v-model="form.harga_jual" type="number" placeholder="Ketik harga jual" required />
          </div>
          <div class="form-group">
            <label for="input-stok" class="form-label">Stok</label>
            <input class="form-control" id="input-stok" v-model="form.stok" type="number" placeholder="Ketik stok" required />
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ProdukCreatePage",
  data() {
    return {
      form: {
        nama: "",
        merek: "",
        harga_beli: "",
        harga_jual: "",
        stok: "",
      },
      show: true,
      items: [
        {
          text: "Home",
          href: "/",
        },
        {
          text: "Produk",
          href: "/produk",
        },
        {
          text: "Buat",
          href: "/produk/create",
          active: true,
        },
      ],
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      axios.post("http://127.0.0.1:8000/api/produk", this.form).then((response) => {
        this.$swal("Selamat!", response.data.message, "success");
        this.resetForm();
      });
    },
    onReset(event) {
      event.preventDefault();
      this.resetForm();
    },
    resetForm() {
      // Reset our form values
      this.form.nama = "";
      this.form.merek = "";
      this.form.harga_beli = "";
      this.form.harga_jual = "";
      this.form.stok = "";
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>

<style></style>
