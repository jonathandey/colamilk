<template>
	<article class="album album-thumbnail col-sm-2" @click="openAlbum">
		<header class="overlay">
			<h4 class="title">
				{{ album.title }}
			</h4>
		</header>
		[<a href="#" @click.prevent.stop="tryDelete"><i class="fa fa-trash"></i></a>]
	</article>
</template>

<script>
	import { deleteAlbum, updateAlbum, setAlbumContext } from '../vuex/actions'

	export default {
		props: ['album'],

		vuex: {
			actions: {
				deleteAlbum,
				updateAlbum,
				setAlbumContext
			}
		},

		methods: {
			tryDelete () {
				let confirm = window.confirm('Delete ' + this.album.title + '?')

				if(confirm)
				{
					this.deleteAlbum(this.album)
				}
			},

			openAlbum () {
				this.setAlbumContext(this.album)

				this.$router.go({ name: 'album', params: { id: this.album.id } })
			}
		},

		ready () {
			// console.log('Album loaded')
		}
	}
</script>