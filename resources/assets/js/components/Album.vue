<template>
	<article class="album col-sm-2">
		<header class="overlay">
			<h4 class="title" 
				@dblclick.self="makeEditable" 
				@keydown.13.prevent="tryUpdate" 
				@blur="discardEditable">
				{{ album.title }}
			</h4>
		</header>
		[<a href="#" @click.prevent="tryDelete"><i class="fa fa-trash"></i></a>]
	</article>
</template>

<script>
	import { deleteAlbum, updateAlbum } from '../vuex/actions'

	export default {
		props: ['album'],

		vuex: {
			actions: {
				deleteAlbum,
				updateAlbum
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

			makeEditable (e) {
				e.target.setAttribute('contenteditable', true)
				e.target.focus()
			},

			discardEditable (e) {
				e.target.removeAttribute('contenteditable')
				e.target.innerText = this.album.title
			},

			tryUpdate (e) {
				e.target.removeAttribute('contenteditable')

				let title = e.target.innerText.trim()

				if(!title.length)
				{
					e.target.innerText = this.album.title
				}
				else
				{
					this.album.title = title
					this.updateAlbum(this.album)
				}
			}
		},

		ready () {
			// console.log('Album loaded')
		}
	}
</script>