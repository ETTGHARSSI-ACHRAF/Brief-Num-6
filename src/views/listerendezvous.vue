<template>
  <div id="liste">
       <comlisterendezvous/>
  </div>
</template>

<script>

import Comlisterendezvous from '../components/comlisterendezvous.vue'
export default {
  name:'liste',
   components: {
      Comlisterendezvous,
  }
}
</script>

<style>
#liste {
    background: white;
    width: 100vw;
    height: 100vh;
  }
  
h2{
    color:rgb(59, 59, 236);
}

th{
    color:rgb(59, 59, 236);
}

.add{
    
    background-color: white;
    color:rgb(59, 59, 236);
    border-color:rgb(59, 59, 236);
}
.add:hover{
    background-color:rgb(59, 59, 236);
    color:white;
}
.action{
  background-color: rgb(59, 59, 236);
}
.action:hover{
    background-color: white;
    color:rgb(59, 59, 236);
}
</style>