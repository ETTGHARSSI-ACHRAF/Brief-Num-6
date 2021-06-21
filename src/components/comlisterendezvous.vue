<template>
  <div class="listerenez">
    <div class="container mt-4">
      <h2 class="text-center">Rendez-vous</h2>
      <p> Reference :{{ $route.params.reference }}</p>
      <router-link class="btn float-end mb-4 add" :to="{path: '/addrendezvous/' + $route.params.reference }"> + Ajouter Rendez-vous</router-link>
      <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table text-center">
          <thead>
            <tr>
              <th>Date</th>
              <th>Horaire</th>
              <th>Description</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="res in rendervous" :key="res.Reference" >
              <td>{{ res.DateConsult }}</td>
              <td>{{ res.Horaire }}</td>
              <td>{{ res.TypeConsult }}</td>
              <!-- <td>
                <button type="button" v-on:click="ondelet(res.Id)" class="btn btn-danger btn-sm mr-3">
                  Delete</button
                ><button type="button" class="btn btn-sm btn-info" style="margin-left:20px">
                  Update
                </button>
              </td> -->
              <td><button class="btn action btn-success btn-sm" v-on:click="ondelet(res.Id)"><i class="material-icons">delete </i> </button> &nbsp;
                <button class="btn action btn-success btn-sm" v-on:click="onupdate(res.Id)"> <i class="material-icons">edit</i> </button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "listerenez",
  data() {
    return {
      rendervous: [],
      // reference:this.$route.params.reference,
    };
  },
  methods: {
    remplir() {
      fetch(
        "http://localhost/Brief6/Backend/ApiRendezvous/ReadCondition/"+this.$route.params.reference,
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
          this.rendervous = res;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    ondelet(id){
      fetch(
        "http://localhost/Brief6/Backend/ApiRendezvous/Delete/"+id,
        {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then(() => {
          // return res.json();
          // alert('hhh')
          this.remplir();
        })
        .catch((err) => {
          console.log(err);
        });

    },
    onupdate(id){
      // this.$route.params.id;
      this.$router.push("/updateredervous/"+id);
    }
  },
  mounted() {
    this.remplir();
  }
};
</script>

<style>
</style>