<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title>
          {{$store.getters["login/user"].name}}
        </q-toolbar-title>
        <div>
          <q-btn v-if="$store.getters['login/isLoggedIn']" label="Salir" @click="logout"  color="negative" icon="logout" size="xs" />
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
      <q-list>
        <q-item-label header>
          Opciones Menu
        </q-item-label>
        <q-item v-if="!$store.getters['login/isLoggedIn']" clickable exact to="/login">
          <q-item-section avatar>
            <q-icon name="login" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Ingresar</q-item-label>
            <q-item-label caption>
              Ingresar al sistema
            </q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="/" exact >
          <q-item-section avatar>
            <q-icon name="brightness_7" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Alcadia 2022</q-item-label>
            <q-item-label caption>Alcadia 2022</q-item-label>
          </q-item-section>
        </q-item>
        <q-item to="mercadocambionombre" exact v-if="this.$store.state.login.boolmercadocambioactividad">
          <q-item-section avatar>
            <q-icon name="home" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Mercado cambios </q-item-label>
            <q-item-label caption>Mercado cambios</q-item-label>
          </q-item-section>
        </q-item>
        <q-item v-if="$store.getters['login/isLoggedIn']" clickable @click="logout">
          <q-item-section avatar>
            <q-icon name="logout" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Salir</q-item-label>
            <q-item-label caption>
              Salir del sistema
            </q-item-label>
          </q-item-section>
        </q-item>
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  data(){
    return{
      leftDrawerOpen:false,
    }
  },
  created() {
    // console.log()
  },
  methods:{
    toggleLeftDrawer () {
      this.leftDrawerOpen = !this.leftDrawerOpen
    },
    logout () {
      this.$q.loading.show()
      this.$store.dispatch('login/logout')
        .then(() => {
          this.$q.loading.hide()
          this.$router.push('/login')
        })
    },
  }
}
</script>
