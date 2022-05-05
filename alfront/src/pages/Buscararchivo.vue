<template>
<q-page class="q-pa-xs">
<div class="row">
  <div class="col-12">
    <div class="full-width bg-red text-white text-center text-h5 ">Buscar industria y comercio</div>
  </div>
  <div class="col-12">
    <q-form @submit="consulta">
      <div class="row">
        <div class="col-3">
          <q-input dense outlined label="Ingresar padron industria y comercio" v-model="padron" />
        </div>
        <div class="col-3 flex flex-center">
          <q-btn type="submit" class="full-width" label="Consultar" color="positive" icon="search" />
        </div>
      </div>
    </q-form>
  </div>
  <div class="col-12">
    <div class="row">
      <div class="col-2">
        <q-input label="gestion" disable dense outlined v-model="gest" />
      </div>
      <div class="col-8">
        <q-input label="nombre" disable dense outlined v-model="nombre" />
      </div>
      <div class="col-2">
        <q-input label="tipo" disable dense outlined v-model="tipo" />
      </div>
    </div>
  </div>
  <div class="col-12">
    <q-table title="Historial de pago industria comercio" :columns="columns" :rows="pagos" dense :rows-per-page-options="[0]"></q-table>
  </div>

  <div class="col-12 q-pt-xs">
    <div class="full-width bg-amber text-white text-center text-h5 ">Buscar mercados</div>
  </div>
  <div class="col-12">
    <q-form @submit="consultamercado">
      <div class="row">
        <div class="col-3">
          <q-input dense outlined label="Ingresar padron formal eventual" v-model="padronmercado" />
        </div>
        <div class="col-3 flex flex-center">
          <q-btn type="submit" class="full-width" label="Consultar" color="positive" icon="search" />
        </div>
      </div>
    </q-form>
  </div>
  <div class="col-12">
    <div class="row">
      <div class="col-12">
        <q-input label="nombre mercado" disable dense outlined v-model="nombremercado" />
      </div>
    </div>
  </div>
  <div class="col-12">
    <q-table title="Historial de pago mercado" :columns="columnsmercado" :rows="pagosmercado" dense :rows-per-page-options="[0]"></q-table>
  </div>

  <div class="col-12 q-pt-xs">
    <div class="full-width bg-green text-white text-center text-h5 ">Buscar tasas por servicio</div>
  </div>
  <div class="col-5">
    <q-form @submit.prevent="consultacontribuyente">
      <div class="row">
        <div class="col-6">
          <q-input label="Carnet" dense outlined v-model="comun" />
        </div>
        <div class="col-6 flex flex-center">
          <q-btn type="submit" class="full-width" icon="search" color="positive" label="consultar" />
        </div>
      </div>
    </q-form>
  </div>
  <div class="col-5">
    <q-input disable dense outlined label="contribuyente" v-model="contribuyente" />
  </div>
  <div class="col-2">
    <q-select @update:model-value="buscarpagos" dense outlined label="Inmueble" :options="inmuebles" v-model="inmueble" />
<!--    <pre>{{inmueble}}</pre>-->
  </div>
  <div class="col-12">
    <q-table title="Historial de pago tasas"  :columns="columnstasas" :rows="pagostasas" dense :rows-per-page-options="[0]"></q-table>
  </div>
</div>
</q-page>
</template>

<script>
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Buscararchivo",
  data(){
    return{
      padron:'1-11-38209',
      gest:'',
      nombre:'',
      tipo:'',
      pagos:[],
      pagostasas:[],
      comun:'2798977',
      contribuyente:'',
      inmuebles:[],
      inmueble:{},
      columns:[
        {label:'padron',name:'padron',field:'padron'},
        {label:'control',name:'control',field:'control'},
        {label:'gestion',name:'gestion',field:'gestion'},
        {label:'fech_pago',name:'fech_pago',field:'fech_pago'},
        {label:'cod_caja',name:'cod_caja',field:'cod_caja'},
        // {label:'hora',name:'hora',field:'hora'},
      ],
      columnsmercado:[
        {label:'padron',name:'padron',field:'padron'},
        {label:'control',name:'control',field:'control'},
        {label:'gestion',name:'gestion',field:'gestion'},
        {label:'fech_pago',name:'fech_pago',field:'fech_pago'},
        {label:'cod_caja',name:'cod_caja',field:'cod_caja'},
        // {label:'hora',name:'hora',field:'hora'},
      ],
      columnstasas:[
        {label:'comun',name:'comun',field:'comun'},
        {label:'cantidad',name:'cantidad',field:'cantidad'},
        {label:'gest',name:'gest',field:'gest'},
        {label:'fecha',name:'fecha',field:'fecha'},
        {label:'oper',name:'oper',field:'oper'},
        // {label:'hora',name:'hora',field:'hora'},
      ],
      nombremercado:'',
      pagosmercado:[],
      padronmercado:'14-01-0217',
    }
  },
  created() {
    // this.consultamercado()
    // this.consulta()
    // this.consultacontribuyente()
  },
  methods:{
    consultamercado(){
      this.$q.loading.show()
      this.$api.post('mercado',{padron:this.padronmercado}).then(res=>{
        // console.log(res.data)
        // this.pagostasas=res.data
        this.nombremercado=res.data
        this.$q.loading.hide()
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
      this.$q.loading.show()
      this.$api.get('mercado/'+this.padronmercado).then(res=>{
        // console.log(res.data)
        this.pagosmercado=res.data
        this.$q.loading.hide()
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
    },
    buscarpagos(inmueble){
      this.$q.loading.show()
      this.$api.post('pm01inmu',{CodAut:inmueble.CodAut}).then(res=>{
        // console.log(res.data)
        this.pagostasas=res.data
        this.$q.loading.hide()
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
    },
    consulta(){
      this.$q.loading.show()
      this.gest=''
      this.nombre=''
      this.tipo=''
      this.pagos=[]
      this.$api.get('archivo/'+this.padron).then(res=>{
        // console.log(res.data)
        this.$q.loading.hide()
        this.gest=res.data.gest
        this.nombre=res.data.nombre
        this.tipo=res.data.tipo
        this.pagos=res.data.pagos
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
    },
    consultacontribuyente(){
      this.pagostasas=[]
      this.$q.loading.show()
      this.contribuyente=''
      this.$api.get('pm01cont/'+this.comun).then(res=>{
        // console.log(res.data)
        this.$q.loading.hide()
        this.contribuyente=res.data
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
      this.$api.get('pm01inmu/'+this.comun).then(res=>{
        // console.log(res.data)
        // this.$q.loading.hide()
        this.inmuebles=[{label:''}]
        res.data.forEach(r=>{
          r.label=r.cantidad
          this.inmuebles.push(r)
        })
        this.inmueble=this.inmuebles[0]
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
    }
  }
}
</script>

<style scoped>

</style>
