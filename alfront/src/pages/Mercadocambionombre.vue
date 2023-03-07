<template>
<q-page class="q-pa-xs">
  <div class="row">
    <div class="col-12">
      <q-card >
        <q-card-section class="q-pa-none bg-red ">
          <div class="text-h6 text-center q-pa-none text-white">Modificaciones formales</div>
        </q-card-section>
        <q-separator />
        <q-card-actions >
          <div class="row full-width" >
            <div class=" col-3 flex flex-center"><q-btn @click="dialogactividad=true" color="primary" icon="local_activity"  label="Cambio actividad" /></div>
            <div class=" col-3 flex flex-center"><q-btn @click="dialogdimension=true" color="secondary" icon="lens_blur"  label="Cambio dimension" /></div>
            <div class=" col-3 flex flex-center"><q-btn @click="dialognombre=true" color="info" icon="drive_file_rename_outline"  label="Cambio nombre" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialogbajaformal=true" color="negative" icon="person_remove"  label="DAR DE BAJA" /></div>
            <div class=" col-3 flex flex-center"><q-btn  color="accent" icon="construction"  label="consultar tramite" /></div>
          </div>
        </q-card-actions>
        <q-separator />
        <q-card-section class="q-pa-none">
          <div class="text-subtitle2 text-center q-pa-none">Reporte modificaciones formales</div>
        </q-card-section>
        <q-separator />
        <q-card-actions >
          <div class="row full-width" >
            <div class=" col-4 "><q-input v-model="fecha1" dense outlined label="fecha1" /></div>
            <div class=" col-4 "><q-input v-model="fecha2" dense outlined label="fecha2" /></div>
            <div class=" col-4 flex flex-center"><q-btn @click="reporte"  color="primary" icon="print"  label="imprimir reporte" /></div>
          </div>
        </q-card-actions>
      </q-card>
      <q-card class="q-mt-xs">
        <q-card-section class="q-pa-none bg-green">
          <div class="text-h6 text-center q-pa-none text-white">Modificaciones eventual</div>
        </q-card-section>
        <q-separator />
        <q-card-actions >
          <div class="row full-width" >
            <div class=" col-2 flex flex-center"><q-btn @click="dialogactividade=true" color="primary" icon="local_activity"  label="Cambio actividad" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialogdireccione=true" color="accent" icon="home"  label="Cambio direccion" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialogdimensione=true" color="secondary" icon="lens_blur"  label="Cambio dimension" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialognombree=true" color="info" icon="drive_file_rename_outline"  label="Cambio nombre" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialogbajaeventual=true" color="negative" icon="person_remove"  label="DAR DE BAJA" /></div>
            <div class=" col-2 flex flex-center"><q-btn @click="dialodiae=true" color="primary" icon="edit"  label="Cambio de dia" /></div>
            <div class=" col-2 flex flex-center"><q-btn  color="accent" icon="construction"  label="consultar tramite" /></div>
          </div>
        </q-card-actions>
        <q-separator />
        <q-card-section class="q-pa-none">
          <div class="text-subtitle2 text-center q-pa-none">Reporte modificaciones eventual</div>
        </q-card-section>
        <q-separator />
        <q-card-actions >
          <div class="row full-width" >
            <div class=" col-4 "><q-input v-model="fechae1" dense outlined label="fecha1" /></div>
            <div class=" col-4 "><q-input v-model="fechae2" dense outlined label="fecha2" /></div>
            <div class=" col-4 flex flex-center"><q-btn @click="reportee"  color="primary" icon="print"  label="imprimir reporte" /></div>
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
        <div class="text-h6">Cambio de actividad formal</div>
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
  <q-dialog full-width v-model="dialogactividade">
    <q-card >
      <q-form @submit.prevent="updateeventuales">
        <q-card-section>
          <div class="text-h6">Cambio de actividad eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
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
              <q-select  dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
<!--            <div class="col-12">-->
<!--              <pre>{{even_acti}}</pre>-->
<!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
            </div>
            <div class="col-4">
              <q-select  dense outlined label="Dias" :options="even_dias" v-model="eventual.even_dias" />
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
            <div class="col-12">
<!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtne" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
  <q-dialog full-width v-model="dialogdimension">
    <q-card >
      <q-form @submit.prevent="updateformalesdimension">
        <q-card-section>
          <div class="text-h6">Cambio de dimesion formal</div>
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
  <q-dialog full-width v-model="dialogdimensione">
    <q-card >
      <q-form @submit.prevent="updateeventualesdimencion">
        <q-card-section>
          <div class="text-h6">Cambio de dimension eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
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
              <q-select disable dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
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
              <q-input  dense outlined label="Largo"  v-model="eventual.largo" />
            </div>
            <div class="col-2">
              <q-input  dense outlined label="Ancho"  v-model="eventual.ancho" />
            </div>
            <div class="col-12">
              <!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtne" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
  <q-dialog full-width v-model="dialognombre">
    <q-card >
      <q-form @submit.prevent="updateformalnombre">
        <q-card-section>
          <div class="text-h6">Cambio de nombre formal</div>
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
  <q-dialog full-width v-model="dialognombree">
    <q-card >
      <q-form @submit.prevent="updateeventualesnombre">
        <q-card-section>
          <div class="text-h6">Cambio de nombre eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
            </div>
            <div class="col-2">
              <q-input dense outlined  label="paterno"  v-model="eventual.paterno"/>
            </div>
            <div class="col-2">
              <q-input dense outlined  label="materno"  v-model="eventual.materno"/>
            </div>
            <div class="col-3">
              <q-input dense outlined  label="nombres"  v-model="eventual.nombres"/>
            </div>
            <div class="col-2">
              <q-input dense outlined  label="ap_esposo"  v-model="eventual.ap_esposo"/>
            </div>
            <div class="col-3">
              <q-input dense outlined  label="carnet"  v-model="eventual.carnet"/>
            </div>
            <div class="col-6">
              <q-input dense outlined  label="fono"  v-model="eventual.fono"/>
            </div>
            <div class="col-6">
              <q-input dense outlined  label="domicilio"  v-model="eventual.domicilio"/>
            </div>
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="ubicacion"  v-model="eventual.ubicacion"/>
            </div>
            <div class="col-4">
              <q-select disable dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
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
            <div class="col-12">
              <!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtne" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>


  <q-dialog full-width v-model="dialogbajaformal">
    <q-card >
      <q-form @submit.prevent="bajaformal">
        <q-card-section>
          <div class="text-h6">Dar de baja a formal</div>

        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-12">
              <q-checkbox class="fit row wrap justify-end items-start content-start" v-model="resoladmformalcheck" label="Baja por Resolución administrativa" />
            </div>
            <div class="col-6">
              <q-select dense outlined label="formal" use-input :options="formales" @filter="filterFnf" v-model="formal" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="formal.padant"/>
            </div>
            <template v-if="resoladmformalcheck">
              <div class="col-2">
                <q-input required dense outlined color="teal-9" label="Resolución administrativa" v-model="resoladmformal" />
              </div>
            </template>
            <template v-else>
              <div class="col-2">
                <q-input required dense outlined label="FORM 23" v-model="form23" />
              </div>
            </template>
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
              <q-badge v-if="disablebtn" color="negative" class="text-h5" label="No se puede dar de baja hasta que  este al dia con los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-
        ">
          <q-btn  label="Dar de Baja" :disable="disablebtn" color="red-6" icon="person_remove" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>


  <q-dialog full-width v-model="dialogbajaeventual">
    <q-card >
      <q-form @submit.prevent="bajaeventual">
        <q-card-section>
          <div class="text-h6">Dar de baja eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-12">
              <q-checkbox class="fit row wrap justify-end items-start content-start" v-model="resoladmeventualcheck" label="Baja por Resolución administrativa" />
            </div>
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <template v-if="resoladmeventualcheck">
              <div class="col-2">
                <q-input required dense outlined color="teal-9" label="Resolución administrativa" v-model="resoladmeventual" />
              </div>
            </template>
            <template v-else>
              <div class="col-2">
                <q-input required dense outlined label="FORM 23" v-model="form23" />
              </div>
            </template>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
            </div>
            <div class="col-2">
              <q-input dense outlined  label="paterno"  v-model="eventual.paterno"/>
            </div>
            <div class="col-2">
              <q-input dense outlined  label="materno"  v-model="eventual.materno"/>
            </div>
            <div class="col-3">
              <q-input dense outlined  label="nombres"  v-model="eventual.nombres"/>
            </div>
            <div class="col-2">
              <q-input dense outlined  label="ap_esposo"  v-model="eventual.ap_esposo"/>
            </div>
            <div class="col-3">
              <q-input dense outlined  label="carnet"  v-model="eventual.carnet"/>
            </div>
            <div class="col-6">
              <q-input dense outlined  label="fono"  v-model="eventual.fono"/>
            </div>
            <div class="col-6">
              <q-input dense outlined  label="domicilio"  v-model="eventual.domicilio"/>
            </div>
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="ubicacion"  v-model="eventual.ubicacion"/>
            </div>
            <div class="col-4">
              <q-select disable dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
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
            <div class="col-12">
              <!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede dar de baja hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Dar de Baja" :disable="disablebtne" color="red-6" icon="person_remove" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>


  <q-dialog full-width v-model="dialogdireccione">
    <q-card >
      <q-form @submit.prevent="updateeventualesdireccion">
        <q-card-section>
          <div class="text-h6">Cambio de direccion eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
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
              <q-input dense outlined  label="ubicacion"  v-model="eventual.ubicacion"/>
            </div>
            <div class="col-4">
              <q-select disable dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
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
            <div class="col-12">
              <!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtne" color="positive" icon="add_circle" type="submit" />
          <q-btn  label="cancelar" color="negative" icon="delete" v-close-popup />
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
  <q-dialog full-width v-model="dialodiae">
    <q-card >
      <q-form @submit.prevent="updateeventualesdia">
        <q-card-section>
          <div class="text-h6">Cambio de dia eventual</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col-6">
              <q-select dense outlined label="eventual" use-input :options="eventuales" @filter="filterFnf2" v-model="eventual" />
            </div>
            <div class="col-2">
              <q-input dense outlined :disable="true" label="pad ant" v-model="eventual.padant"/>
            </div>
            <div class="col-2">
              <q-input required dense outlined label="FORM 23" v-model="form23" />
            </div>
            <div class="col-2">
              <q-input required dense outlined label="COMPROBANTE" v-model="compr" />
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
              <q-input disable dense outlined  label="ubicacion"  v-model="eventual.ubicacion"/>
            </div>
            <div class="col-4">
              <q-select disable dense outlined label="Actividad" :options="even_acti" v-model="eventual.even_acti" />
            </div>
            <!--            <div class="col-12">-->
            <!--              <pre>{{even_acti}}</pre>-->
            <!--            </div>-->
            <div class="col-4">
              <q-input dense outlined :disable="true"  label="gest"  v-model="eventual.gest"/>
            </div>
            <div class="col-4">
              <q-select  dense outlined label="Dias" :options="even_dias" v-model="eventual.even_dias" />
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
            <div class="col-12">
              <!--              <pre>{{eventual.gest}}</pre>-->
            </div>
            <div class="col-12" v-if="eventual.gest!=undefined">
              <q-badge v-if="disablebtne" color="negative" class="text-h5" label="No se puede actualizar hasta que  este al dia los pagos"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn  label="Guardar" :disable="disablebtne" color="positive" icon="add_circle" type="submit" />
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
  name: `Mercadocambionombre`,
  data(){
    return{
      fecha1:date.formatDate(new  Date(),'YYYY-MM-DD'),
      fecha2:date.formatDate(new  Date(),'YYYY-MM-DD'),
      fechae1:date.formatDate(new  Date(),'YYYY-MM-DD'),
      fechae2:date.formatDate(new  Date(),'YYYY-MM-DD'),
      dialogactividad:false,
      dialogdimension:false,
      dialognombre:false,
      dialogdireccione:false,
      dialogactividade:false,
      dialogdimensione:false,
      dialognombree:false,
      dialogbajaeventual:false,
      dialogbajaformal:false,
      dialodiae:false,
      form23:'',
      compr:'',
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
      miscambiostotales:[],
      resoladmformalcheck:false,
      resoladmeventualcheck:false,
      resoladmformal:"",
      resoladmeventual:"",
    }
  },
  created(){
    this.datosformales()
    // this.$api.get('mercadocne').then(res=>{
    //   // console.log(res.data)
    //   this.eventuales=[]
    //   res.data.forEach(r=>{
    //     let d=r
    //     d.label=r.padron+' '+r.paterno+' '+r.materno+' '+r.nombres+' '+r.gest
    //     // console.log(d)
    //     this.eventuales.push(d)
    //     // d.label=
    //   })
    //   this.eventuales2=this.eventuales
    //   this.eventual=this.eventuales[0]
    // })

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
          doc.text(5, 1, 'RESUMEN DE CAMBIOS REALIZADOS FORMALES')
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
          console.log(r)
          // if (r.nrocomprobante!=''){
            y+=0.4
            con++
            doc.text(1, y+3, r.fecha.substring(0,10))
            doc.text(3.5, y+3, r.padron==null?'':r.padron)
            doc.text(5.5, y+3, r.largo==null?'':r.largo+'x'+r.ancho==null?'':r.ancho)
            doc.text(7.5, y+3, (r.paterno==null?'':r.paterno).substring(0,15)+' '+(r.materno==null?'':r.materno).substring(0,15)+' '+(r.nombre==null?'':r.nombre).substring(0,15))
            doc.text(13.5, y+3, r.carnet==null?'':r.carnet)
            doc.text(16, y+3, r.tipo==null?'':r.tipo)
            sumtotal+=parseInt(r.total)
            console.log(r.total)
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
    reportee(){
      this.$q.loading.show()
      this.$api.put('even_cambios/1',{inicio:this.fecha1,fin:this.fecha2}).then(res=>{
        // console.log(res.data)
        this.miscambiostotales=res.data
        let cm=this;
        function header(fecha){
          var img = new Image()
          img.src = 'logo.jpg'
          doc.addImage(img, 'jpg', 0.5, 0.5, 2, 2)
          doc.setFont(undefined,'bold')
          doc.text(5, 1, 'RESUMEN DE CAMBIOS REALIZADOS EVENTUALES')
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
          console.log(r)
          // if (r.nrocomprobante!=''){
          y+=0.4
          con++
          doc.text(1, y+3, r.fecha.substring(0,10))
          doc.text(3.5, y+3, r.padron==null?'':r.padron)
          doc.text(5.5, y+3, r.largo==null?'':r.largo+'x'+r.ancho==null?'':r.ancho)
          doc.text(7.5, y+3, (r.paterno==null?'':r.paterno).substring(0,15)+' '+(r.materno==null?'':r.materno).substring(0,15)+' '+(r.nombre==null?'':r.nombre).substring(0,15))
          doc.text(13.5, y+3, r.carnet==null?'':r.carnet)
          doc.text(16, y+3, r.tipo==null?'':r.tipo)
          sumtotal+=parseInt(r.total)
          console.log(r.total)
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
    updateeventuales(){
      this.$q.loading.show()
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      this.eventual.pad2=this.eventual.even_acti.codigo
      this.eventual.dias=this.eventual.even_dias.codigo
      this.eventual.tipo='CAMBIO ACTIVIDAD'
      this.$api.post('even_cambios',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialogactividade=false
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
    updateeventualesdireccion(){
      this.$q.loading.show()
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      // this.eventual.pad2=this.eventual.form_acti.codigo
      // this.eventual.codigo=this.eventual.activida.codigo_ac
      this.eventual.tipo='CAMBIO DIRECCION'
      this.$api.post('even_cambios',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialogdireccione=false
        this.form23=''
        this.compr=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Cambiado de direccion correctamente!'
        })
      })
    },
    updateeventualesdia(){
      this.$q.loading.show()
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      // this.eventual.pad2=this.eventual.form_acti.codigo
      this.eventual.dias=this.eventual.even_dias.codigo
      // this.eventual.codigo=this.eventual.activida.codigo_ac
      this.eventual.tipo='CAMBIO DE DIA'
      this.$api.post('even_cambios',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialodiae=false
        this.form23=''
        this.compr=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Cambiado de direccion correctamente!'
        })
      })
    },
    updateeventualesdimencion(){
      this.$q.loading.show()
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      // this.eventual.dias=this.eventual.even_dias.codigo
      // console.log(this.eventual.dias)
      // this.eventual.codigo=this.eventual.activida.codigo_ac
      this.eventual.tipo='CAMBIO DIMENSION'
      this.$api.post('even_cambios',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialogdimensione=false
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
    updateformalnombre(){
      this.$q.loading.show()
      this.formal.form23=this.form23
      this.formal.compr=this.compr
      // this.formal.pad2=this.formal.form_acti.codigo
      // this.formal.codigo=this.formal.activida.codigo_ac
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
    updateeventualesnombre(){
      this.$q.loading.show()
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      // this.eventual.pad2=this.eventual.form_acti.codigo
      // this.eventual.codigo=this.eventual.activida.codigo_ac
      this.eventual.tipo='CAMBIO NOMBRE'
      this.$api.post('even_cambios',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialognombree=false
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

    bajaeventual(){
      this.$q.loading.show()
      this.eventual.resoladm=this.resoladmeventual
      this.eventual.form23=this.form23
      this.eventual.compr=this.compr
      // this.eventual.pad2=this.eventual.form_acti.codigo
      // this.eventual.codigo=this.eventual.activida.codigo_ac
      this.$api.post('even_baja',this.eventual).then(res=>{
        // console.log(res.data)
        this.dialogbajaeventual=false
        this.form23=''
        this.compr=''
        this.resoladmeventual=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Se dio de baja correctamente!'
        })
      })
    },
    bajaformal(){
      this.$q.loading.show()
      this.formal.resoladm=this.resoladmformal
      this.formal.form23=this.form23
      this.formal.compr=this.compr
      this.$api.post('formal_baja',this.formal).then(res=>{
        // console.log(res.data)
        this.dialogbajaformal=false
        this.form23=''
        this.compr=''
        this.resoladmformal=''
        this.datosformales()
        this.$q.notify({
          color:'green',
          icon:'check',
          message:'Se dio de baja correctamente!'
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
    }
  },
  computed:{
    disablebtn(){
      // console.log(this.formal.gest)
      let year = new Date().getFullYear();

      if (parseInt(this.formal.gest)==year-1){
        return false
      }else {
        return true
      }
    },
    disablebtne(){
      let year = new Date().getFullYear();
      // console.log(this.formal.gest)
      if (parseInt(this.eventual.gest)==year-1){
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
