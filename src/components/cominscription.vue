<template>
  <div class=" inscri page-content row col-12">
		<div class="form-v9-content" >
			<form class="form-detail"  method="">
				<h2>Inscription</h2>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" v-model="Nom"  class="input-text" placeholder="Nom" required>
					</div>
					<div class="form-row">
						<input type="text" v-model="Prenom" class="input-text" placeholder="Prenom" required>
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" v-model="Email"  class="input-text" placeholder="Email" required>
					</div>
					<div class="form-row">
						<input type="text" v-model="Tele"  class="input-text" placeholder="Tele" required>
					</div>
				</div>
				<div class="form-row-total d-flex justify-content-center">
					<div class="form-row">
						<input type="number"  v-model="Age" class="input-text" placeholder="Age" required>
					</div>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" v-on:click.prevent="inscri" class="register" value="Register">
					<!-- <router-link class="register" name="register" to="/liste">rendez-vous</router-link> -->
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	
export default {
	name:'inscri',
	data(){
		return{
			Nom:'',
			Prenom:'',
			Email:'',
			Tele:'',
			Age:'',
			reference:'',
		}
		
	},
	methods: {
		inscri(){
			// e.preventDefault();
			fetch("http://localhost/Brief6/Backend/ApiClient/Create", {
				method: "POST",
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					Nom: this.Nom,
					Prenom: this.Prenom,
					Email: this.Email,
					Age:this.Age,
					Tele:this.Tele
				})
			})
			.then((res) => {
				return res.json();
				// this.$router.push({ path: '/liste' })
			})
			.then((res)=>{
				this.reference=res;
				this.$router.push("/liste/"+this.reference);
			})
			.catch(function(err){
				console.log(err);
			})
		}
	}
	
}
</script>

<style>
.page-content {
	width: 100vw;
	background: #4077c8;
	display: flex;
	display: -webkit-flex;
	justify-content: center;

	align-items: center;

}
.form-v9-content  {
	width: 80%;
	border-radius: 15px;
    background: rgba(255, 255, 255, 0.253);
	margin: 110px 0;
	font-family: 'Nunito', sans-serif;
	color: #fff;
	font-weight: 700;
	font-size: 16px;
	position: relative;
}
.form-v9-content .form-detail {
    padding: 30px 135px 30px 100px;
	position: relative;
}
.form-v9-content .form-detail h2 {
	font-size: 35px;
	text-align: center;
	position: relative;
	padding: 16px 0 13px;
	margin-bottom: 55px;
}
.form-v9-content .form-detail h2::after {
	background: #fff;
	width: 73px;
	height: 3px;
	content: "";
	position: absolute;
	top: 100%;
	left: 50%;
    transform: translateX(-50%);
    /* -o-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	-webkit-transform: translateX(-50%); */
}
.form-v9-content .form-row-total {
    display: flex;
    display: -webkit-flex;
    justify-content: space-between;
}
.form-v9-content .form-row {
    width: 45%;
}
.form-v9-content .form-detail .form-row-last {
	text-align: center;
}
.form-v9-content .form-detail .input-text {
	margin-bottom: 45px;
}
.form-v9-content .form-detail input {
	width: 100%;
    padding: 14.5px 0px 14.5px 30px;
    border: 2px solid #ccc;
    appearance: unset;
    outline: none;
    border-radius: 27.5px;

	font-family: 'Nunito', sans-serif;
    font-size: 16px;
    font-weight: 700;
    background: rgba(255, 255, 255, 0.2)
}
.form-v9-content .form-detail input:focus {
	border: 2px solid #999;
}
.form-v9-content .form-detail .register {
	background: #f25d5d;
	border-radius: 25px;

	width: 180px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

	border: none;
	margin: 20px 0 73px 35px;
	cursor: pointer;
	font-family: 'Nunito', sans-serif;
	color: #fff;
	font-weight: 700;
	font-size: 16px;
}
.form-v9-content .form-detail .register:hover {
	background: #d95252;
}
.form-v9-content .form-detail .form-row-last input {
	padding: 14px;
}
input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #e5e5e5;
  font-size: 16px;
}
input::-moz-placeholder { /* Firefox 19+ */
  color: #e5e5e5;
  font-size: 16px;
}
input:-ms-input-placeholder { /* IE 10+ */
  color: #e5e5e5;
  font-size: 16px;
}
input:-moz-placeholder { /* Firefox 18- */
  color: #e5e5e5;
  font-size: 16px;
}
</style>