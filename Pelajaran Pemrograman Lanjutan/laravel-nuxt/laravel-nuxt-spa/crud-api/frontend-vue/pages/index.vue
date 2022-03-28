<template>
  <div
    class="bv-example-row fixed-top d-flex align-items-center justify-content-center"
    style="bottom: 0; overflow-y: auto"
  >
    <b-container>
      <b-row class="justify-content-center">
        <b-col cols="5" class="text-center">
          <b-card>
            <h4>Daftar Halaman</h4>
            <b-list-group class="mt-4">
              <b-list-group-item to="/produk" active
                >CRUD Produk</b-list-group-item
              >
            </b-list-group>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "IndexPage",
  head: {
    title: "Home",
  },
};
</script>
