import Login from "pages/Login";
import Mercadocambionombre from "pages/Mercadocambionombre";
import Buscararchivo from "pages/Buscararchivo";
import Recaudadotasas from "pages/Recaudadotasas";
import Recaudadoic from "pages/Recaudadoic";
import Recaudadomercado from "pages/Recaudadomercado";
import Targetaunica from "pages/Targetaunica";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      { path: 'login', component: Login },
      { path: 'mercadocambionombre', component: Mercadocambionombre,meta: {requiresAuth: true} },
      { path: 'buscararchivo', component: Buscararchivo,meta: {requiresAuth: true} },
      { path: 'recaudadotasas', component: Recaudadotasas,meta: {requiresAuth: true} },
      { path: 'recaudadoic', component: Recaudadoic,meta: {requiresAuth: true} },
      { path: 'recaudadomercado', component: Recaudadomercado,meta: {requiresAuth: true} },
      { path: 'targetaunica', component: Targetaunica,meta: {requiresAuth: true} },
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
