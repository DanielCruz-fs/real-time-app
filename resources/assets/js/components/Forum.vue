<template>
	 <v-container grid-list-md>
	 	 <v-layout row wrap>
	 	 	 <v-flex xs12 sm8 md8 lg8>
	 	 	 	 <question v-for="question in questions" :key="question.path" :data=question></question>
	 	 	 </v-flex>
	 	 	 <v-flex xs12 sm4 md4 lg4>
	 	 	 	 <app-sidebar></app-sidebar>
	 	 	 </v-flex>
	 	 </v-layout>
	 </v-container>
</template>
<script>
 import question from './Question'
 import AppSidebar from './AppSidebar'
 export default{
 	 components:{question, AppSidebar},
 	 data(){
 	 	 return{
 	 	 	 questions:{}
 	 	 }
 	 },
 	 created(){
 	 	 axios.get('/api/question').then(res => this.questions = res.data.data)
 	 	 .catch(error => console.log(error.response.data));
 	 }
 }	
</script>
<style>
	
</style>
