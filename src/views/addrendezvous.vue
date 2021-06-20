<template>
  <div id="addrendezvous">
    <comaddrendez/>
  </div>
</template>

<script>
// @ is an alias to /src
import comaddrendez from '@/components/comaddrendez.vue'

export default {
  name: 'Addrendezvous',
  components: {
    comaddrendez,
  }
}
</script>