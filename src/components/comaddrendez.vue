<template>
   <div class="ctn ">
     <div class="general">
<form class="rendez">

  <h2 class="text-center">Ajouter un Rendez vous</h2>
  <div class="mb-3 col-10 ms-5">
        <label class="form-label">Date</label>
        <input  type="date" class="form-control"  v-model="DateConsult">
  </div>
        
  <div class="mb-3 col-10 ms-5">
        <label  class="form-label">Horaire</label>
        <select class="form-select input"  v-model="Horaire">
                <option></option>
                <option value="8">8-10</option>
                <option value="10">10-12</option>
                <option value="14">14-16</option>
                <option value="16">16-18</option>
        </select>
  </div>

  <div class="mb-3 col-10 ms-5 description">
        <label  class="form-label">Description :</label>
        <textarea class="form-control" v-model="TypeConsult"> </textarea>
  </div>

  <div class="mb-3 col-10 ms-5">
      <button class="btn btn-primary BTN1 col-10 ms-5 mb-3" type="submit" v-on:click.prevent="addrendezvous()"> Save add</button>
  </div>
    
</form> 
</div>
</div>

</template>


<script>
export default {
    name:'addrendezvous',
   data() {
    return {
      DateConsult: "",
      Horaire :"",
      TypeConsult: "",
      Reference:this.$route.params.reference
      
    
    };
  },

methods:{
  //ajouter un rendez voous par reference:
  addrendezvous(){

    fetch("http://localhost/Brief6/Backend/ApiRendezVous/Create",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            DateConsult: this.DateConsult,
            Horaire: this.Horaire,
            TypeConsult: this.TypeConsult,
            Reference:this.Reference
        
          }),
        }

        ).then(() => {
              this.$router.push("/liste/"+this.Reference);
        })

        .catch(function (err) {
           console.log(err);
        });
    },
        
  },
};

</script>

<style scoped>

 .ctn{
    height: 100vh;
    width: 100vw;
    margin: 0px;
    padding: 0px;
    overflow-y: hidden;
    background: white;
  }

.rendez{
      margin-top: 6%;
  }

h2{
    color:white;
    margin-top: 2%;
}

.rendez {
    padding-top: 10px;
    padding-bottom: 10px;
    padding-inline-end: 10px;
    border-radius: 10px;
    background-color: rgb(59, 59, 236);
    width: 50vw;
    margin-left: 25vw;
  }
  
   label {
    margin-left: 30px;
    color: white;
  }
  
  input {
    border: none;
    border-bottom: 1PX solid white;
  }
  
   input[type=date] {
    color: #004683;
  }

   input[type=text] {
    color: #004683;
 
  
  }
  
  .btn {
    background-color: white;
    color:rgb(59, 59, 236);;
    border: 2px solid white;
    border-radius: 20px;
  } 

  .btn:hover{
      background-color: rgb(59, 59, 236);;
      color:white;
  }

  
  
  

</style>