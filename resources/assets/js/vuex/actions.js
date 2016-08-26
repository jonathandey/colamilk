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
		.then(resp => dispatch('UPDATE_ALBUM', resp.data))
		.catch(error => console.error(error))
}

export const setAlbumContext = function({ dispatch, state }, album) {
	dispatch('SET_ALBUM_CONTEXT', album)
}

export const loadAlbum = function({ dispatch, state }, albumId) {
	return API.loadAlbum(albumId)
		.then(resp => dispatch('SET_ALBUM_CONTEXT', resp.data))
		.catch(error => console.error(error))
}