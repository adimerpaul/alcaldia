<template>
<q-page>
  <div class="row">
    <div class="col-12">
      <q-form @submit="consulta">
        <div class="row">
          <div class="col-4">
            <q-input dense outlined type="date" v-model="fecha1" label="fecha1" />
          </div>
          <div class="col-4">
            <q-input dense outlined type="date" v-model="fecha2" label="fecha2" />
          </div>
          <div class="col-4 flex flex-center">
            <q-btn type="submit" class="full-width" icon="search" color="info" label="consultar" />
          </div>
        </div>
      </q-form>
    </div>
    <div class="col-12">
      <q-table title="consulta" :rows="datos" :columns="columns">
        <template v-slot:top-right>
          <q-btn
            color="primary"
            icon-right="archive"
            label="Exportar csv"
            no-caps
            @click="exportTable"
          />
        </template>
      </q-table>
    </div>
  </div>
</q-page>
</template>

<script>
import {date,exportFile} from "quasar";
function wrapCsvValue (val, formatFn, row) {
  let formatted = formatFn !== void 0
    ? formatFn(val, row)
    : val

  formatted = formatted === void 0 || formatted === null
    ? ''
    : String(formatted)

  formatted = formatted.split('"').join('""')
  /**
   * Excel accepts \n and \r in strings, but some other CSV parsers do not
   * Uncomment the next two lines to escape new lines
   */
  // .split('\n').join('\\n')
  // .split('\r').join('\\r')

  return `"${formatted}"`
}
export default {
  name: `Recaudadotasas`,
  data(){
    return{
      fecha1:date.formatDate(new Date(),'YYYY-MM-DD'),
      fecha2:date.formatDate(new Date(),'YYYY-MM-DD'),
      datos:[],
      columns:[
        {label:'ci',name:'comun',field:'comun'},
        {label:'inmueble',name:'cantidad',field:'cantidad'},
        {label:'gestion',name:'gest',field:'gest'},
        {label:'fecha',name:'fecha',field:'fecha'},
        {label:'monto',name:'Pagado',field:'Pagado'},
      ]
    }
  },
  created() {
    this.consulta()
  },
  methods:{
    consulta(){
      this.$q.loading.show()
      this.$api.post('consultarecaudado',{
        tipo:'TASAS',
        inicio:this.fecha1,
        fin:this.fecha2,
      }).then(res=>{
        this.$q.loading.hide()
        console.log(res.data)
        this.datos=res.data
      })
    },
    exportTable () {
      // naive encoding to csv format
      const content = [this.columns.map(col => wrapCsvValue(col.label))].concat(
        this.datos.map(row => this.columns.map(col => wrapCsvValue(
          typeof col.field === 'function'
            ? col.field(row)
            : row[col.field === void 0 ? col.name : col.field],
          col.format,
          row
        )).join(','))
      ).join('\r\n')

      const status = exportFile(
        'table-export.csv',
        content,
        'text/csv'
      )

      if (status !== true) {
        this.$q.notify({
          message: 'Browser denied file download...',
          color: 'negative',
          icon: 'warning'
        })
      }
    }
  }
}
</script>

<style scoped>

</style>
