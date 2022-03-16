import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "home",
    component: import("../views/HomeView.vue"),
    meta: {
      title: "Home",
    },
  },
  {
    path: "/produk",
    name: "produk",
    component: import("../views/produk/IndexView.vue"),
    meta: {
      title: "Produk",
    },
  },
  {
    path: "/produk/create",
    name: "produk_create",
    component: import("../views/produk/CreateView.vue"),
    meta: {
      title: "Buat",
    },
  },
  {
    path: "/produk/edit/:id",
    name: "produk_edit",
    component: import("../views/produk/EditView.vue"),
    meta: {
      title: "Edit",
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  document.title = `${to.meta.title}`;
  next();
});

export default router;
