<template>
<q-page class="q-pa-xs">
  <div class="row">
    <div class="col-12">
      <q-card >
        <q-card-section>
          <div class="text-h6 text-center">Modificaciones formales</div>
<!--          <div class="text-subtitle2">by John Doe</div>-->
        </q-card-section>
        <q-separator />
        <q-card-actions >
          <div class="row full-width" >
            <div class=" col-3 flex flex-center"><q-btn @click="dialogactividad=true" color="primary" icon="local_activity"  label="Cambio actividad" /></div>
            <div class=" col-3 flex flex-center"><q-btn @click="dialogdimension=true" color="secondary" icon="lens_blur"  label="Cambio dimension" /></div>
            <div class=" col-3 flex flex-center"><q-btn @click="dialognombre=true" color="info" icon="drive_file_rename_outline"  label="Cambio nombre" /></div>
            <div class=" col-3 flex flex-center"><q-btn  color="accent" icon="construction"  label="consultar tramite" /></div>
            <div class=" col-4 "><q-input v-model="fecha1" dense outlined label="fecha1" /></div>
            <div class=" col-4 "><q-input v-model="fecha2" dense outlined label="fecha2" /></div>
            <div class=" col-4 flex flex-center"><q-btn @click="reporte"  color="primary" icon="print"  label="imprimir reporte" /></div>
          </div>
        </q-card-actions>
      </q-card>
    </div>

<!--    <div class="col-6">-->
<!--      <q-select use-input dense outlined @filter="filterFnf" @update:model-value="cambio" :options="this.formales" label="Formales" v-model="formal" />-->
<!--    </div>-->
<!--    <div class="col-2">-->
<!--      <q-input dense outlined label="pad ant" v-model="formal.padant"/>-->
<!--    </div>-->
<!--    <div class="col-2">-->
<!--      <q-input dense outlined label="pad ant" v-model="form23"/>-->
<!--    </div>-->
<!--    <div class="col-2">-->
<!--      <q-input dense outlined label="pad ant" v-model="compr"/>-->
<!--    </div>-->
<!--    <div class="col-6">-->
<!--      <pre>{{formal}}</pre>-->
<!--    </div>-->
<!--    <div class="col-6">-->
<!--      <q-select use-input dense outlined @filter="filterFn" :options="this.eventuales" label="eventuales" v-model="eventual" />-->
<!--    </div>-->
<!--    <div class="col-6">-->
<!--      <pre>{{eventual}}</pre>-->
<!--    </div>-->
  </div>
  <q-dialog full-width v-model="dialogactividad">
    <q-card >
      <q-form @submit.prevent="updateformales">
      <q-card-section>
        <div class="text-h6">Cambio de actividad</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
        <div class="row">
          <div class="col-6">
            <q-select dense outlined label="formal" use-input :options="formales" @filter="filterFnf" v-model="formal" />
          </div>
          <div class="col-2">
            <q-input dense outlined :disable="true" label="pad ant" v-model="formal.padant"/>
          </div>
          <div class="col-2">
            <q-input required dense outlined label="FORM 23" v-model="form23" />
          </div>
          <div class="col-2">
            <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
          </div>
          <div class="col-2">
            <q-input dense outlined :disable="true"  label="paterno"  v-model="formal.paterno"/>
          </div>
          <div class="col-2">
            <q-input dense outlined :disable="true"  label="materno"  v-model="formal.materno"/>
          </div>
          <div class="col-3">
            <q-input dense outlined :disable="true"  label="nombres"  v-model="formal.nombres"/>
          </div>
          <div class="col-2">
            <q-input dense outlined :disable="true"  label="ap_esposo"  v-model="formal.ap_esposo"/>
          </div>
          <div class="col-3">
            <q-input dense outlined :disable="true"  label="carnet"  v-model="formal.carnet"/>
          </div>
          <div class="col-6">
            <q-input dense outlined :disable="true"  label="fono"  v-model="formal.fono"/>
          </div>
          <div class="col-6">
            <q-input dense outlined :disable="true"  label="domicilio"  v-model="formal.domicilio"/>
          </div>
          <div class="col-3">
            <q-select disable dense outlined label="Mercado" :options="formmerc" v-model="formal.formmerc" />
          </div>
          <div class="col-2">
            <q-input dense outlined :disable="true"  label="gest"  v-model="formal.gest"/>
          </div>
          <div class="col-3">
            <q-select  dense outlined label="Actividad" :options="form_acti" v-model="formal.form_acti" />
          </div>
          <div class="col-2">
            <q-select disable dense outlined label="Puesto" :options="form_pue" v-model="formal.form_pue" />
          </div>
          <div class="col-2">
            <q-select  dense outlined label="Venta de" :options="activida" v-model="formal.activida" />
          </div>
          <div class="col-2">
            <q-input disable dense outlined label="Largo"  v-model="formal.largo" />
          </div>
          <div class="col-2">
            <q-input disable dense outlined label="Ancho"  v-model="formal.ancho" />
          </div>
          <div class="col-12" v-if="formal.gest!=undefined">
            <q-badge v-if="disablebtn" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
          </div>
        </div>
      </q-card-section>
      <q-card-actions align="right" class="bg-white text-teal">
        <q-btn  label="Guardar" :disable="disablebtn" color="positive" icon="add_circle" type="submit" />
        <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
      </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
  <q-dialog full-width v-model="dialogdimension">
    <q-card >
      <q-form @submit.prevent="updateformalesdimension">
        <q-card-section>
          <div class="text-h6">Cambio de dimesion</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="formal" use-input :options="formales" @filter="filterFnf" v-model="formal" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="formal.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="paterno"  v-model="formal.paterno"/>
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="materno"  v-model="formal.materno"/>
            </div>
            <div class="col-3">
              <q-input dense outlined :disable="true"  label="nombres"  v-model="formal.nombres"/>
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="ap_esposo"  v-model="formal.ap_esposo"/>
            </div>
            <div class="col-3">
              <q-input dense outlined :disable="true"  label="carnet"  v-model="formal.carnet"/>
            </div>
            <div class="col-6">
              <q-input dense outlined :disable="true"  label="fono"  v-model="formal.fono"/>
            </div>
            <div class="col-6">
              <q-input dense outlined :disable="true"  label="domicilio"  v-model="formal.domicilio"/>
            </div>
            <div class="col-3">
              <q-select disable dense outlined label="Mercado" :options="formmerc" v-model="formal.formmerc" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="gest"  v-model="formal.gest"/>
            </div>
            <div class="col-3">
              <q-select disable  dense outlined label="Actividad" :options="form_acti" v-model="formal.form_acti" />
            </div>
            <div class="col-2">
              <q-select disable dense outlined label="Puesto" :options="form_pue" v-model="formal.form_pue" />
            </div>
            <div class="col-2">
              <q-select disable  dense outlined label="Venta de" :options="activida" v-model="formal.activida" />
            </div>
            <div class="col-2">
              <q-input  dense outlined label="Largo"  v-model="formal.largo" />
            </div>
            <div class="col-2">
              <q-input  dense outlined label="Ancho"  v-model="formal.ancho" />
            </div>
            <div class="col-12" v-if="formal.gest!=undefined">
              <q-badge v-if="disablebtn" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtn" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
  <q-dialog full-width v-model="dialognombre">
    <q-card >
      <q-form @submit.prevent="updateformalnombre">
        <q-card-section>
          <div class="text-h6">Cambio de nombre</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="formal" use-input :options="formales" @filter="filterFnf" v-model="formal" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="formal.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
            </div>
            <div class="col-2">
              <q-input dense outlined   label="paterno"  v-model="formal.paterno"/>
            </div>
            <div class="col-2">
              <q-input dense outlined   label="materno"  v-model="formal.materno"/>
            </div>
            <div class="col-3">
              <q-input dense outlined   label="nombres"  v-model="formal.nombres"/>
            </div>
            <div class="col-2">
              <q-input dense outlined   label="ap_esposo"  v-model="formal.ap_esposo"/>
            </div>
            <div class="col-3">
              <q-input dense outlined   label="carnet"  v-model="formal.carnet"/>
            </div>
            <div class="col-6">
              <q-input dense outlined   label="fono"  v-model="formal.fono"/>
            </div>
            <div class="col-6">
              <q-input dense outlined   label="domicilio"  v-model="formal.domicilio"/>
            </div>
            <div class="col-3">
              <q-select disable dense outlined label="Mercado" :options="formmerc" v-model="formal.formmerc" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="gest"  v-model="formal.gest"/>
            </div>
            <div class="col-3">
              <q-select disable  dense outlined label="Actividad" :options="form_acti" v-model="formal.form_acti" />
            </div>
            <div class="col-2">
              <q-select disable dense outlined label="Puesto" :options="form_pue" v-model="formal.form_pue" />
            </div>
            <div class="col-2">
              <q-select disable  dense outlined label="Venta de" :options="activida" v-model="formal.activida" />
            </div>
            <div class="col-2">
              <q-input disable  dense outlined label="Largo"  v-model="formal.largo" />
            </div>
            <div class="col-2">
              <q-input disable  dense outlined label="Ancho"  v-model="formal.ancho" />
            </div>
            <div class="col-12" v-if="formal.gest!=undefined">
              <q-badge v-if="disablebtn" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtn" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
</q-page>
</template>

<script>
import {date} from "quasar"
import jsPDF from "jspdf"

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Mercadocambionombre",
  data(){
    return{
      fecha1:date.formatDate(new  Date(),'YYYY-MM-DD'),
      fecha2:date.formatDate(new  Date(),'YYYY-MM-DD'),
      dialogactividad:false,
      dialogdimension:false,
      dialognombre:false,
      form23:'',
      compr:'',
      eventuales:[],
      eventuales2:[],
      eventual:{},
      formales:[],
      formales2:[],
      formal:{label:'',padant:''},
      formmerc:[],
      activida:[],
      form_acti:[],
      form_pue:[],
      miscambiostotales:[],
    }
  },
  created() {
    this.datosformales()
    this.$api.get('mercadocne').then(res=>{
      // console.log(res.data)
      this.eventuales=[]
      res.data.forEach(r=>{
        let d=r
        d.label=r.padron+' '+r.paterno+' '+r.materno+' '+r.nombres+' '+r.gest
        // console.log(d)
        this.eventuales.push(d)
        // d.label=
      })
      this.eventuales2=this.eventuales
      this.eventual=this.eventuales[0]
    })

  },
  methods:{
    reporte(){
      this.$q.loading.show()
      this.$api.put('form_cambios/1',{inicio:this.fecha1,fin:this.fecha2}).then(res=>{
        // console.log(res.data)
        this.miscambiostotales=res.data
        let cm=this;
        function header(fecha){
          var img = new Image()
          img.src = 'logo.jpg'
          doc.addImage(img, 'jpg', 0.5, 0.5, 2, 2)
          doc.setFont(undefined,'bold')
          doc.text(5, 1, 'RESUMEN DE CAMBIOS REALIZADOS')
          doc.text(5, 1.5, 'DEL '+cm.fecha1+' AL '+ cm.fecha2)
          doc.text(1, 3, '_______________________________________________________________________________________________________')
          doc.text(1, 3, 'FECHA')
          doc.text(3.5, 3, 'PADRON')
          doc.text(5.5, 3, 'DIMENCION')
          doc.text(7.5, 3, 'CONTRIBUYENTE')
          doc.text(13.5, 3, 'CI/RUN/RUC')
          doc.text(16, 3, 'CAMBIO')
          doc.text(19.5, 3, 'OPERADOR')
          doc.setFont(undefined,'normal')
        }
        var doc = new jsPDF('p','cm','letter')
        doc.setFont("courier");
        doc.setFontSize(9);
        header(this.fecha1)
        let y=0
        let sumtotal=0
        let con=0
        this.miscambiostotales.forEach(r=>{
          // if (r.nrocomprobante!=''){
            y+=0.4
            con++
            doc.text(1, y+3, r.fecha.substring(0,10))
            doc.text(3.5, y+3, r.padron==null?'':r.padron)
            doc.text(5.5, y+3, r.largo==null?'':r.largo+'x'+r.ancho==null?'':r.ancho)
            doc.text(7.5, y+3, (r.paterno==null?'':r.paterno).substring(0,15)+' '+(r.materno==null?'':r.materno).substring(0,15)+' '+(r.nombre==null?'':r.nombre).substring(0,15))
            doc.text(13.5, y+3, r.carnet==null?'':r.carnet)
            doc.text(16, y+3, r.tipo)
            // sumtotal+=parseInt(r.total)
            // console.log(r.total)
            doc.text(19.5, y+3, r.oper==null?'':r.oper )
            if (con==55){
              con=0
              doc.addPage();
              header(this.fecha1)
              y=0
            }
          // }
        })
        doc.setFont(undefined,'bold')
        doc.text(3, y+3.5, 'SON: '+this.miscambiostotales.length+' CAMBIOS')
        // doc.text(12, y+3.5, 'TOTAL RECAUDADCION: ')
        doc.text(1.8, y+5, '_____________________          _____________________________       _________________________')
        doc.text(2, y+5.3, 'FIRMA SELLO CAJERO')
        doc.text(8, y+5.3, 'FIRMA SELLO CONTROL INTERNO')
        doc.text(15, y+5.3, 'FIRMA SELLO LIQUIDADOR')
        // doc.setFont(undefined,'normal')
        // doc.text(18, y+3.5, sumtotal+ ' Bs')
        // doc.save("Pago"+date.formatDate(Date.now(),'DD-MM-YYYY')+".pdf");
        window.open(doc.output('bloburl'), '_blank');
        // console.log(res.data)
        this.$q.loading.hide()
      })
    },
    datosformales(){
      this.$q.loading.show()
      this.$api.get('formmerc').then(res=>{
        this.formmerc=[]
        res.data.forEach(r=>{
          let d=r
          d.label=r.nombre_merc
          this.formmerc.push(d)
        })
        this.$api.get('activida').then(res=>{
          this.actvida=[]
          // console.log(this.actvida)
          res.data.forEach(r=>{
            let d=r
            d.label=r.actividad
            this.activida.push(d)
          })
          this.$api.get('form_acti').then(res=>{
            this.form_acti=[]
            // console.log(this.form_acti)
            res.data.forEach(r=>{
              let d=r
              d.label=r.descri
              this.form_acti.push(d)
            })
            this.$api.get('form_pue').then(res=>{
              this.form_pue=[]
              // console.log(this.form_acti)
              res.data.forEach(r=>{
                let d=r
                d.label=r.descripción
                this.form_pue.push(d)
              })
              // console.log(this.form_pue)
              this.$api.get('mercadocnf').then(res=>{
                // console.log(res.data)
                this.$q.loading.hide()
                this.formales=[{label:'',padant:''}]
                // this.formales=[]
                res.data.forEach(r=>{
                  const formmerc = this.formmerc.find(e => e.codigo === r.pad1);
                  const form_acti = this.form_acti.find(e => e.codigo === r.pad2);
                  const form_pue = this.form_pue.find(e => e.codigo === r.tipo_pues);
                  const activida = this.activida.find(e => e.codigo_ac === r.codigo);
                  let d=r
                  d.formmerc=formmerc
                  d.form_acti=form_acti
                  d.form_pue=form_pue
                  d.activida=activida
                  d.label=r.padron+' '+r.paterno+' '+r.materno+' '+r.nombres+' '+r.gest
                  // console.log(d)
                  this.formales.push(d)
                  // d.label=
                })
                this.formales2=this.formales
                this.formal=this.formales[0]
              })

            })

          })
        })
      })
    },
    updateformales(){
      this.$q.loading.show()
      this.formal.form23=this.form23
      this.formal.compr=this.compr
      this.formal.pad2=this.formal.form_acti.codigo
      this.formal.codigo=this.formal.activida.codigo_ac
      this.formal.tipo='CAMBIO ACTIVIDAD'
      this.$api.post('form_cambios',this.formal).then(res=>{
        // console.log(res.data)
        this.dialogactividad=false
        this.form23=''
        this.compr=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Cambiado de actividad correctamente!'
        })
      })
    },
    updateformalnombre(){
      this.$q.loading.show()
      this.formal.form23=this.form23
      this.formal.compr=this.compr
      this.formal.pad2=this.formal.form_acti.codigo
      this.formal.codigo=this.formal.activida.codigo_ac
      this.formal.tipo='CAMBIO NOMBRE'
      this.$api.post('form_cambios',this.formal).then(res=>{
        // console.log(res.data)
        this.dialognombre=false
        this.form23=''
        this.compr=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Cambiado de nombre correctamente!'
        })
      })
    },
    updateformalesdimension(){
      this.$q.loading.show()
      this.formal.form23=this.form23
      this.formal.compr=this.compr
      this.formal.pad2=this.formal.form_acti.codigo
      this.formal.codigo=this.formal.activida.codigo_ac
      this.formal.tipo='CAMBIO DIMENSION'
      this.$api.post('form_cambios',this.formal).then(res=>{
        // console.log(res.data)
        this.dialogdimension=false
        this.form23=''
        this.compr=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Cambiado de dimesion correctamente!'
        })
      })
    },
    filterFn (val, update) {
      if (val === '') {
        update(() => {
          this.eventuales = this.eventuales2
          // here you have access to "ref" which
          // is the Vue reference of the QSelect
        })
        return
      }
      update(() => {
        const needle = val.toLowerCase()
        this.eventuales = this.eventuales2.filter(v => v.label.toLowerCase().indexOf(needle) > -1)
      })
    },
    filterFnf (val, update) {
      // console.log(val+'aaa')
      // console.log(val+' a')
      if (val === '') {
        update(() => {
          this.formales= this.formales2
          this.formal=this.formales[0]
          // here you have access to "ref" which
          // is the Vue reference of the QSelect
        })
        return
      }

      update(() => {
        // console.log(val+' adimer')
        const needle = val.toLowerCase()
        this.formales= this.formales2.filter(v => v.label.toLowerCase().indexOf(needle) > -1)
      })
    }
  },
  computed:{
    disablebtn(){
      // console.log(this.formal.gest)
      if (parseInt(this.formal.gest)==2021){
        return false
      }else {
        return true
      }
    }
  }
}
</script>

<style scoped>

</style>
