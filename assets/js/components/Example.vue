<template>
<div>
	<p>
		example example component message : {{ message }}
	</p>
	<button @click="fetchAll">FetchAll</button>
	<button @click="fetchOne">FetchOne</button>
</div>
</template>

<script>
export default {
	data(){
		return{
			message: "ceci est le message",
			fetchOptions: { 
				method: 'GET',
				headers: new Headers(),
				mode: 'cors',
				cache: 'default' 
			}
		}
	},
	mounted(){
		// 
	},
	methods: {

		goFetch( url ){

			fetch(`${window.origin}/${url}`, this.fetchOptions)
				.then(response => {

					response.json()
						.then(function(json) {
						
							// traitement du JSON
							console.log("ok tout est resolved : json = ", json);

						})
						.catch(error => {

							console.log("la data n'est pas en json");

						});

				})
				.catch(error => {

				console.log("error du fetch : ", error);

			});

		},

		fetchAll(){

			this.goFetch("articles");

		},

		fetchOne(){

			this.goFetch("article/3");
			
		}
	}
	
}
</script>

<style scoped>

</style>