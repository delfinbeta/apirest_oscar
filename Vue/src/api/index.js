import axios from 'axios'


const API_URL = 'http://bitacoraplayera.com/api'
export default class ApiService{
constructor(){
}

	// get all categories
	getCategories(){
		const url = `${API_URL}/categories`
		return axios.get(url).then(response => response.data)
	}

	//get a especific category
	getCategory(id){
		const url = `${API_URL}/categories/${id}`
		return axios.get(url).then(response => response.data)
	}

	// create category
	createCategory(obj){
		const url = `${API_URL}/categories/create`
		return axios.post(url,{
			'name': obj.name,
			'description': obj.description
		}).then(response => response.data)
	}

	// delete category
	deleteCategory(id){
	    const url = `${API_URL}/api/category/${id}/trash`;
	    return axios.patch(url);
	}
}