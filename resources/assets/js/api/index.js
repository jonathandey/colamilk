
const API = {
	albums (params = {}) {
		return Vue.http.get('/api/albums', { params })
	},

	createAlbum (params = {}) {
		return Vue.http.post('/api/album', params)
	},

	deleteAlbum(album = null) {
		let body = { id: album.id }

		return Vue.http.delete('/api/album', { body })
	},

	updateAlbum(album = null) {
		return Vue.http.put('/api/album', album)
	},

	loadAlbum(id) {
		let params = { id }

		return Vue.http.get('/api/album', { params })
	}
}

module.exports = API