<template>
  <div id="app">

    <div class="container">
      <form v-on:submit="store()">
      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" v-model="category.name">

      <label for="description">Descripción</label>
      <input type="text" id="description" name="description" v-model="category.description">
      <button>Agregar</button>
    </form>
    </div>
    <div class="container">
      <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">ID</div>
        <div class="col col-2">Nombre</div>
        <div class="col col-3">Descripción</div>
        <div class="col col-4">Fecha</div>
        <div class="col col-5">Acciones</div>
      </li>
      <spinner v-show="loading"></spinner>
    </ul>
    </div>
    <category  v-for="category in categories" v-bind:categories="category" v-bind:key="category.id" ></category>
  </div>
</template>

<script>
import ApiService from './api'
import Category from './components/Category.vue'
import Spinner from './components/Spinner.vue'
const API = new ApiService()

export default {
  name: 'app',
  data () {
    return {
      categories: [],
      category:{
        name: '',
        description: '',
      },
      loading:true
    }
  },
  methods:{
    showCategories(){
           let self = this
    API.getCategories()
      .then(function (categories) {
        self.loading = false
        self.categories = categories
      })
    },
    store(){
      event.preventDefault()
      let self = this
      let newCategory = self.category

      API.createCategory(newCategory)
        .then(data=> data.message)

    }
  },
  // watch:{
  //   categories: function(){
  //     this.showCategories()
  //     }
  //   },
  mounted (){
    this.showCategories()
  },
  components:{
    Category,
    Spinner
  }
}
</script>

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
