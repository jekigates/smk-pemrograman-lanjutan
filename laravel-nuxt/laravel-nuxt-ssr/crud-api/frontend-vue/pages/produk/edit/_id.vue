<template>
  <b-container>
    <b-row class="justify-content-center">
      <b-col cols="12" class="mt-4">
        <b-breadcrumb :items="items"></b-breadcrumb>
      </b-col>
      <b-col cols="12" class="mt-2">
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group
            id="input-group-nama"
            label="Nama"
            label-for="input-nama"
          >
            <b-form-input
              id="input-nama"
              v-model="form.nama"
              type="type"
              placeholder="Ketik nama"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            id="input-group-merek"
            label="Merek"
            label-for="input-merek"
          >
            <b-form-input
              id="input-merek"
              v-model="form.merek"
              type="text"
              placeholder="Ketik merek"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            id="input-group-harga_beli"
            label="Harga Beli"
            label-for="input-harga_beli"
          >
            <b-form-input
              id="input-harga_beli"
              v-model="form.harga_beli"
              type="number"
              placeholder="Ketik harga beli"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            id="input-group-harga_jual"
            label="Harga Jual"
            label-for="input-harga_jual"
          >
            <b-form-input
              id="input-harga_jual"
              v-model="form.harga_jual"
              type="number"
              placeholder="Ketik harga jual"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            id="input-group-stok"
            label="Stok"
            label-for="input-stok"
          >
            <b-form-input
              id="input-stok"
              v-model="form.stok"
              type="number"
              placeholder="Ketik stok"
              required
            ></b-form-input>
          </b-form-group>

          <b-button type="submit" variant="primary">Submit</b-button>
          <b-button type="reset" variant="secondary">Reset</b-button>
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "ProdukEditPage",
  head: {
    title: "Edit",
  },
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
          text: "Edit",
          href: `/produk/edit`,
          active: true,
        },
      ],
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();

      this.$axios
        .put(`/api/produk/${this.$route.params.id}`, this.form)
        .then((response) => {
          this.$swal("Selamat!", response.data.message, "success");
        });
    },
    onReset(event) {
      event.preventDefault();
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
    getData() {
      this.$axios
        .get(`/api/produk/${this.$route.params.id}`)
        .then((response) => {
          let user = response.data.data;
          this.form.nama = user.nama;
          this.form.merek = user.merek;
          this.form.harga_beli = user.harga_beli;
          this.form.harga_jual = user.harga_jual;
          this.form.stok = user.stok;
        });
    },
  },
  created() {
    this.getData();
  },
};
</script>

<style></style>
