import axios from 'axios'
export default function getCategories()
{
	return axios.get('http://127.0.0.1:8000/api/categories/')
				.then(function (response){
					return response.data
				})
}