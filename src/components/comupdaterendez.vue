<template>
   <div class="ctn" id="updaterendezvous" >
     <div class="general">
<form class="rendez">

  <h2 class="text-center">Modifier un Rendez vous</h2>
  <div class="mb-3 col-10 ms-5">
        <label class="form-label">Date</label>
        <input  type="date" class="form-control"  v-model="DateConsult" >
  </div>
        
  <div class="mb-3 col-10 ms-5">
        <label  class="form-label" >Horaire</label>
        <select class="form-select input" v-model="Horaire"  >
                <!-- <option></option>
                <option value="8">8-10</option>
                <option value="10">10-12</option>
                <option value="14">14-16</option>
                <option value="16">16-18</option> -->
                <!-- <option v-for="heure in heures" :key="heure">{{heure}}</option> -->
                <option v-for="heure in heures" :key="heure.value" :disabled="heure.etat">{{heure.value}}</option>
        </select>
  </div>

  <div class="mb-3 col-10 ms-5 description">
        <label  class="form-label" >Description :</label>
        <textarea class="form-control" v-model="TypeConsult" ></textarea>
  </div>

  <div class="mb-3 col-10 ms-5">
      <button class="btn btn-primary BTN1 col-10 ms-5 mb-3" type="submit" v-on:click.prevent="updaterendezvous()"> Save add</button>
  </div>
    
</form> 
</div>
</div>

</template>


<script>
export default {
    name:'updaterendezvous',
   data() {
    return {
      // Rredezvous:[],
      DateConsult:'',
      Horaire:'',
      TypeConsult:'',
      Reference:'',
      heuresapi:[],
      heures:[
        {
          "value" : "8",
          "etat" : true
        },
        {
          "value" : "9",
          "etat" : true
        },
        {
          "value" : "10",
          "etat" : true
        },
        {
          "value" : "11",
          "etat" : true
        },
        {
          "value" : "14",
          "etat" : true
        },
        {
          "value" : "15",
          "etat" : true
        },
        {
          "value" : "16",
          "etat" : true
        },
        {
          "value" : "17",
          "etat" : true
        }
      ]
      
    };

  },
  

methods:{
  async getDate(val){
        const response= await fetch("http://localhost/Brief6/Backend/ApiRendezVous/ReadwherDate/"+val,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }

        );
        
         const data = await response.json();
           this.heuresapi = data;
    },
  //ajouter un rendez voous par reference:
  remplir(){
      fetch(
        "http://localhost/Brief6/Backend/ApiRendezvous/SingleRead/"+this.$route.params.id,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then((res) => {
          return res.json();
        })
        .then((res) => {
          // this.Rredezvous = res;
          // console.log(res[0].DateConsult);
          this.DateConsult=res[0].DateConsult;
          this.Horaire=res[0].Horaire;
          this.TypeConsult=res[0].TypeConsult;
          this.Reference=res[0].Reference;
          // console.log(this.Rredezvous);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updaterendezvous(){
      // console.log(TypeConsult);
      // console.log(TypeConsult);
      // console.log(this.Horaire);
      fetch("http://localhost/Brief6/Backend/ApiRendezVous/Update/"+this.$route.params.id,
        {
          method: "PUT",
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
    }    
  },
  mounted() {
    this.remplir();
  },
  watch:{
    DateConsult:async function(val)
    {
      await this.getDate(val);
      // await (this.DateConsult = val);
      for(var i=0;i< this.heures.length;i++){
            this.heures[i].etat= true;
          for (var j=0;j<this.heuresapi.length;j++){
          if(this.heures[i].value != this.heuresapi[j].Horaire){
            this.heures[i].etat=false;
          }
          }
        
      }
    }
  }
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