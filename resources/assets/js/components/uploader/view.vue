<template lang="html">
  <div>
  <!-- Using modifiers -->
    <b-btn v-b-modal.myModal>Show Modal</b-btn>

    <!-- Using value -->
    <b-btn v-b-modal="'myModal'">Show Modal</b-btn>

    <!-- the modal -->
    <b-modal id="myModal" size="lg" class="new">
      <b-tabs>
        <b-tab title="first" active>
          <br>I'm the first fading tab
        </b-tab>
        <b-tab title="second" >
          <br>I'm the second tab content
        </b-tab>
        <b-tab title="disabled" disabled>
          <br>Disabled tab!
        </b-tab>
      </b-tabs>
    </b-modal>
  </div>
</template>

<script>
export default {
  data(){
    return {
      msg: 'gjhgjhg'
    };
  }
}
</script>

<style lang="css">
</style>
