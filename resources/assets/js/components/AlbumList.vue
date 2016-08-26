<template>
	<div class="row">
		<album-thumbnail v-for="album in albums | filterBy smart" :album="album"></album-thumbnail>
	</div>
</template>

<script>
	import { getAlbums } from '../vuex/actions'

	import AlbumThumbnail from './AlbumThumbnail.vue'

	export default {
		props: ['smart'],

		vuex: {
			actions: {
				getAlbums
			},
			getters: {
				albums: state => state.albums
			}
		},

		components: {
			AlbumThumbnail
		}
	}
</script>