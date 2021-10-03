<template>
<div>
	<p>
		example example component message : {{ message }}
		</p>
</div>
</template>

<script>
export default {
	data(){
		return{
			message: "ceci est le message"
		}
	},
	created(){

		const fetchOptions = { 
			method: 'GET',
			headers: new Headers(),
			mode: 'cors',
			cache: 'default' 
		};
		

		fetch(`${window.origin}/articles`, fetchOptions)
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
	methods: {
		// 
	}
	
}
</script>

<style scoped>

</style>