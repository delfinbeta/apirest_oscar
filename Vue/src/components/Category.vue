<template>
	<div class="container">
  <ul class="responsive-table">
    <li class="table-row">
      <div class="col col-1" data-label="ID">{{categories.id}}</div>
      <div class="col col-2" data-label="Nombre">{{categories.name}}</div>
      <div class="col col-3" data-label="Descripción">{{categories.description}}</div>
      <div class="col col-3" data-label="Fecha">{{categories.created_at}}</div>
      <div class="col col-1" data-label="Payment Status">
				<a href="#">Editar</a>
        <button @click="deleteEntry(categories.id)">Eliminar</button>
      </div>
    </li>
  </ul>
</div>
</template>
<style>
  body {
  font-family: 'lato', sans-serif;
  }

  .container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
  }

  h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  }
  h2 small {
  font-size: 0.5em;
  }

  .responsive-table li {
  border-radius: 3px;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
  }
  .responsive-table .table-header {
  background-color: #95A5A6;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  }
  .responsive-table .table-row {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
  }
  .responsive-table .col-1 {
  flex-basis: 10%;
  }
  .responsive-table .col-2 {
  flex-basis: 40%;
  }
  .responsive-table .col-3 {
  flex-basis: 25%;
  }
  .responsive-table .col-4 {
  flex-basis: 25%;
  }
  @media all and (max-width: 767px) {
  .responsive-table .table-header {
  display: none;
  }
  .responsive-table li {
  display: block;
  }
  .responsive-table .col {
  flex-basis: 100%;
  }
  .responsive-table .col {
  display: flex;
  padding: 10px 0;
  }
  .responsive-table .col:before {
  color: #6C7A89;
  padding-right: 10px;
  content: attr(data-label);
  flex-basis: 50%;
  text-align: right;
  }
  }
</style>
<script>
	export default {
		name: 'category',
		props: ['categories'],
    methods:{
      deleteEntry: function(id){
        console.log(this.id)
        // this.$emit('deleteCategory',this.id)
      }
    }
	}
</script>