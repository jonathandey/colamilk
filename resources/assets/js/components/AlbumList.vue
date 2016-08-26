<template>
	<div class="row">
		<album v-for="album in albums | filterBy smart" :album="album"></album>
	</div>
</template>

<script>
	import { getAlbums } from '../vuex/actions'

	import Album from './Album.vue'

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
			Album
		},

		ready () {
			// this.getAlbums()
		}
	}
</script>