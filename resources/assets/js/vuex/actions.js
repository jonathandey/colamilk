export const getAlbums = function({ dispatch, state }, params) {
	return API.albums(params)
		.then(resp => dispatch('SET_ALBUMS', resp.data))
		.catch(error => console.error(error))
}

export const createAlbum = function({ dispatch, state }, params) {
	return API.createAlbum(params)
		.then(resp => dispatch('ADD_ALBUM', resp.data))
		.catch(error => console.error(error))
}

export const deleteAlbum = function({dispatch, state}, album) {
	return API.deleteAlbum(album)
		.then(resp => dispatch('REMOVE_ALBUM', album))
		.catch(error => console.error(error))
}

export const updateAlbum = function({dispatch, state}, album) {
	return API.updateAlbum(album)
		.then(resp => dispatch('UPDATE_ALBUM', resp))
		.catch(error => console.error(error))
}