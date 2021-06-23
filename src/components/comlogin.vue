<template>
 <div class="group">
       <div class="container">
           <!-- v-on:submit.prevent="onsub" -->
        <form action="" >
        <div class="form-group mb-3 col-10 ms-5 pt-2">
            <label for="from-label">Reference :</label>
            <input type="text" v-model="reference" class="form-control">
        </div>
        <div class="mb-3 col-10 ms-5 justify-content-center">
        <button class="btn"  type="submit" v-on:click.prevent="onsub">Login</button>

        </div>
    </form>
    </div> 

 </div>

</template>


<script>
export default {
    name:'reference',
    data(){
        return{
            reference:''
        }
    },
    methods: {
        onsub(){
     fetch(
        "http://localhost/Brief6/Backend/ApiClient/SelectRef/"+this.reference,
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
            if(res==1){
              localStorage.setItem("tach",this.reference);
                this.$router.push("/liste/"+this.reference);
            }else{
                alert('Reference incorrecte');
            }
        // console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    }
    },
}


</script>


<style scoped>

 .group{
    background: white;
    min-height: 100vh;
    overflow-y: hidden;
    height: 100vh;
    width: 100vw;
  }

  .container{
      padding-top: 6%;
    width: 40%;
    height: 50%;
    margin-left: 30%;
    /* margin-bottom: 10%; */
    border-radius: 20px;
    background-color: rgb(59, 59, 236);
    color: white;
    margin-top: 10%;

}

.btn{
    background-color: white;
    color:rgb(59, 59, 236);
    margin-left:35%;
    margin-top: 5%;
    width: 30%;
}

</style>