<template>
<q-page class="q-pa-xs">
<div class="row">
  <div class="col-12">
    <q-card >
      <q-card-section class="q-pa-none bg-green">
        <div class="text-h6 text-center q-pa-none text-white">Activar tageta unica formales</div>
      </q-card-section>
      <q-separator />
      <q-card-section class="q-pa-xs">
        <div class="row">
          <div class="col-6">
            <q-select dense outlined label="formal" use-input :options="formales" @filter="filterFnf" v-model="formal" />
          </div>
          <div class="col-6">
            <q-input outlined dense disable v-model="formal.padant" label="Pad ant"/>
          </div>
          <div class="col-6">
            <q-input outlined dense disable :model-value="nombrecompleto(formal.paterno,formal.materno,formal.nombres)" label="Nombre"/>
          </div>
          <div class="col-3">
            <q-input outlined dense disable :model-value="formal.carnet" label="C.I./RUN"/>
          </div>
          <div class="col-3">
            <q-input outlined dense disable :model-value="formal.fono" label="fono"/>
          </div>
          <div class="col-6">
            <q-input outlined dense disable :model-value="formal.domicilio" label="domicilio"/>
          </div>
          <div class="col-3">
            <q-select disable dense outlined label="Mercado" :options="formmerc" v-model="formal.formmerc" />
          </div>
          <div class="col-3">
            <q-badge   :class="disablebtn?'full-width full-height bg-red text-white':'full-width full-height bg-green text-white'" >
              Ultima gestion pagada <br> {{ formal.gest }}
            </q-badge>
<!--            <q-input outlined dense  v-model="formal.gest" label="Ultima gestion pagada" bg-color="green" label-color="white" color="white" style="color: white"/>-->
          </div>
          <div class="col-4">
            <q-select disable dense outlined label="Actividad" :options="form_acti" v-model="formal.form_acti" />
          </div>
          <div class="col-2">
            <q-select disable dense outlined label="Puesto" :options="form_pue" v-model="formal.form_pue" />
          </div>
          <div class="col-2">
            <q-select disable dense outlined label="Venta de" :options="activida" v-model="formal.activida" />
          </div>
          <div class="col-2">
            <q-input disable dense outlined label="Largo"  v-model="formal.largo" />
          </div>
          <div class="col-2">
            <q-input disable dense outlined label="Ancho"  v-model="formal.ancho" />
          </div>
          <div class="col-4">
            <q-input disable dense outlined label="Numero TUG"  v-model="formal.n_tuc" />
          </div>
          <div class="col-4">
            <q-input disable dense outlined label="Numero preimpreso"  v-model="formal.n_pretuc" />
          </div>
          <div class="col-4 flex flex-center">
            <q-btn label="Habilitar tarjeta" :disable="disablebtn" :color="disablebtn?'negative':'positive'" class="full-width"  icon="credit_score" @click="habilitartargeta()" />
          </div>
<!--          <div class="col-12">-->
<!--            <pre>{{formal}}</pre>-->
<!--          </div>-->
        </div>
      </q-card-section>
    </q-card>
  </div>
</div>
  <div class="row">
    <div class="col-12">
      <q-card >
        <q-card-section class="q-pa-none bg-green">
          <div class="text-h6 text-center q-pa-none text-white">Activar tageta unica eventuales</div>
        </q-card-section>
        <q-separator />
        <q-card-section class="q-pa-xs">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-6">
              <q-input dense outlined disable label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="paterno"  v-model="eventual.paterno"/>
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="materno"  v-model="eventual.materno"/>
            </div>
            <div class="col-3">
              <q-input dense outlined :disable="true"  label="nombres"  v-model="eventual.nombres"/>
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true"  label="ap_esposo"  v-model="eventual.ap_esposo"/>
            </div>
            <div class="col-3">
              <q-input dense outlined :disable="true"  label="carnet"  v-model="eventual.carnet"/>
            </div>
            <div class="col-6">
              <q-input dense outlined :disable="true"  label="fono"  v-model="eventual.fono"/>
            </div>
            <div class="col-6">
              <q-input dense outlined :disable="true"  label="domicilio"  v-model="eventual.domicilio"/>
            </div>
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="ubicacion"  v-model="eventual.ubicacion"/>
            </div>
            <div class="col-4">
              <q-select disable  dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-badge   :class="disablebtne?'full-width full-height bg-red text-white':'full-width full-height bg-green text-white'" >
                Ultima gestion pagada <br> {{ eventual.gest }}
              </q-badge>
<!--              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>-->
            </div>
            <div class="col-4">
              <q-select disable dense outlined label="Dias" :options="even_dias" v-model="eventual.even_dias" />
              <!--              <pre>{{eventual.even_dias}}</pre>-->
            </div>
            <div class="col-2">
              <q-select disable dense outlined label="Puesto" :options="form_pue" v-model="eventual.form_pue" />
            </div>
            <!--            <div class="col-2">-->
            <!--              <q-select  dense outlined label="Venta de" :options="activida" v-model="eventual.activida" />-->
            <!--            </div>-->
            <div class="col-2">
              <q-input disable dense outlined label="Largo"  v-model="eventual.largo" />
            </div>
            <div class="col-2">
              <q-input disable dense outlined label="Ancho"  v-model="eventual.ancho" />
            </div>
            <div class="col-4">
              <q-input disable dense outlined label="Numero TUG"  v-model="eventual.n_tuc" />
            </div>
            <div class="col-4">
              <q-input disable dense outlined label="Numero preimpreso"  v-model="eventual.n_pretuc" />
            </div>
            <div class="col-4 flex flex-center">
              <q-btn label="Habilitar tarjeta" :disable="disablebtne" :color="disablebtne?'negative':'positive'" class="full-width"  icon="credit_score" @click="habilitartargetae()" />
            </div>
          </div>
        </q-card-section>
      </q-card>
    </div>
  </div>
</q-page>
</template>

<script>
export default {
  name: `Targetaunica`,
  data(){
    return{
      eventuales:[],
      eventuales2:[],
      eventual:{label:'',padant:''},
      formales:[],
      formales2:[],
      formal:{label:'',padant:''},
      formmerc:[],
      activida:[],
      form_acti:[],
      even_acti:[],
      even_dias:[],
      form_pue:[],
    }
  },
  created() {
    this.datosformales()
  },
  methods:{
    habilitartargeta(){
      if (this.formal.label==''){
        this.$q.notify({
          message:"Selecionar formal",
          icon:"error",
          color:"red"
        })
        return false
      }
      this.$q.dialog({
        title:"Seguro de dar de alta?",
        message:"dar de alta?",
        cancel:true
      }).onOk(()=>{
        this.$q.loading.show()
        this.$api.post('targetaunica',{
          padron:this.formal.padron,
          tipo:'FORMAL',
          estado:'ALTA',
          id:this.formal.id,
        }).then(res=>{
          this.$q.loading.hide()
          this.formal={label:'',padant:''}
          this.$q.notify({
            message:"Se dio de alta correctamente",
            icon:"check",
            color:"green"
          })
        }).catch(err=>{
          this.$q.loading.hide()
          this.$q.notify({
            message:err.response.data.message,
            icon:"error",
            color:"red"
          })
        })
      })

    },
    habilitartargetae(){
      if (this.eventual.label==''){
        this.$q.notify({
          message:"Selecionar eventual",
          icon:"error",
          color:"red"
        })
        return false
      }
      this.$q.dialog({
        title:"Seguro de dar de alta?",
        message:"dar de alta?",
        cancel:true
      }).onOk(()=>{
        this.$q.loading.show()
        this.$api.post('targetaunica',{
          padron:this.eventual.padron,
          tipo:'EVENTUAL',
          estado:'ALTA',
          id:this.eventual.id,
        }).then(res=>{
          this.$q.loading.hide()
          this.eventual={label:'',padant:''}
          this.$q.notify({
            message:"Se dio de alta correctamente",
            icon:"check",
            color:"green"
          })
        }).catch(err=>{
          this.$q.loading.hide()
          this.$q.notify({
            message:err.response.data.message,
            icon:"error",
            color:"red"
          })
        })
      })

    },
    nombrecompleto(paterno,materno,nombres){
      if (paterno==undefined){
        paterno=''
      }
      if (materno==undefined){
        materno=''
      }
      if (nombres==undefined){
        nombres=''
      }
      return paterno.trim()+' '+materno.trim()+' '+ nombres.trim()
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
    },
    filterFnf2 (val, update) {
      // console.log(val+'aaa')
      // console.log(val+' a')
      if (val === '') {
        update(() => {
          this.eventuales= this.eventuales2
          this.eventual=this.eventuales[0]
          // here you have access to "ref" which
          // is the Vue reference of the QSelect
        })
        return
      }

      update(() => {
        // console.log(val+' adimer')
        const needle = val.toLowerCase()
        this.eventuales= this.eventuales2.filter(v => v.label.toLowerCase().indexOf(needle) > -1)
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
                // this.$q.loading.hide()
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
              this.$api.get('even_acti').then(res=>{
                this.even_acti=[]
                res.data.forEach(r=>{
                  let d=r
                  // console.log(r)
                  d.label=r.descri
                  this.even_acti.push(d)
                })
                this.$api.get('even_dias').then(res=>{
                  this.even_dias=[]
                  res.data.forEach(r=>{
                    let d=r
                    // console.log(r)
                    d.label=r.descri
                    this.even_dias.push(d)
                  })
                  this.$api.get('mercadocne').then(res=>{
                    // console.log(res.data)
                    this.$q.loading.hide()
                    this.eventuales=[{label:'',padant:''}]
                    // this.formales=[]
                    res.data.forEach(r=>{
                      // const formmerc = this.formmerc.find(e => e.codigo === r.pad1);
                      const even_acti = this.even_acti.find(e => e.codigo === r.pad2);
                      const even_dias = this.even_dias.find(e => e.codigo === r.dias);
                      const form_pue = this.form_pue.find(e => e.codigo === r.tipo_pues);
                      let d=r
                      // d.formmerc=formmerc
                      d.even_acti=even_acti
                      d.even_dias=even_dias
                      d.form_pue=form_pue
                      d.label=r.padron+' '+r.paterno+' '+r.materno+' '+r.nombres+' '+r.gest
                      // console.log(d)
                      this.eventuales.push(d)
                      // d.label=
                    })
                    this.eventuales2=this.eventuales
                    this.eventual=this.eventuales[0]
                  })
                })

              })
            })
          })
        })
      })
    },
  },computed:{
    disablebtn(){
      let year = new Date().getFullYear();
      // console.log(this.formal.gest)
      if (parseInt(this.formal.gest)>=year-2){
        return false
      }else {
        return true
      }
    },
    disablebtne(){
      let year = new Date().getFullYear();
      // console.log(this.formal.gest)
      if (parseInt(this.eventual.gest)>=year-2){
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
