import Login from "pages/Login";
import Mercadocambionombre from "pages/Mercadocambionombre";
import Buscararchivo from "pages/Buscararchivo";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      { path: 'login', component: Login },
      { path: 'mercadocambionombre', component: Mercadocambionombre },
      { path: 'buscararchivo', component: Buscararchivo },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
