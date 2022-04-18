<template>
<q-page class="q-pa-xs">
<div class="row">
  <div class="col-12">
    <q-form>
      <div class="row">
        <div class="col-6">
          <q-input dense outlined label="padron industria comercio" />
        </div>
        <div class="col-6"></div>
      </div>
    </q-form>
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
      padron:'1-11-37438'
    }
  },
  created() {
    this.$api.get('lidgic/'+this.padron).then(res=>{
      console.log(res.data)
    })
  }

}
</script>

<style scoped>

</style>
