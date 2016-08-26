import Vue from 'vue'
import Vuex from 'vuex'

// Make vue aware of Vuex
Vue.use(Vuex)

// Create an object to hold the initial state when
// the app starts up
const state = {
	albums: [],

	album: { 
		title: null, 
		photos: [] 
	}
}

// Create an object storing various mutations. We will write the mutation
const mutations = {
	SET_ALBUMS (state, albums) {
		state.albums = albums
	},

	ADD_ALBUM (state, album) {
		state.albums.push(album)
	},

	REMOVE_ALBUM (state, album) {
		state.albums.splice(state.albums.indexOf(album), 1)
	},

	UPDATE_ALBUM (state, album) {
		console.log('update album', album)
	},

	SET_ALBUM_CONTEXT (state, album) {
		state.album = album
	}
}

// Combine the initial state and the mutations to create a Vuex store.
// This store can be linked to our app.
export default new Vuex.Store({
	state,
	mutations
})