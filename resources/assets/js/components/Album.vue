<template>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-left">
					<button class="btn btn-default" @click="toDashboard">
						<i class="fa fa-chevron-left"></i>
					</button>
				</div>
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-plus"></i>
						</button>
						<ul class="dropdown-menu">
							<li>
								<uploader :collection="album.photos" :params="uploadParams"></uploader>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<section id="album">
					<header>
						<h3 class="page-header"
							@dblclick.self="makeEditable" 
							@keydown.13.prevent="tryUpdate" 
							@blur="discardEditable">
		                    {{ album.title }}
		                </h3>
					</header>
					<div class="row">
						<photo-thumbnail v-for="photo in album.photos" :photo="photo"></photo-thumbnail>
					</div>
				</section>
			</div>
		</div>
	</div>
</template>

<script>
	
	import Uploader from './Uploader.vue'
	import PhotoThumbnail from './PhotoThumbnail.vue'
	import { loadAlbum, setAlbumContext, updateAlbum } from '../vuex/actions'

	export default {
		components: {
			PhotoThumbnail,
			Uploader
		},

		data () {
			return {
				uploadParams: {}
			}
		},

		vuex: {
			actions: {
				loadAlbum,
				setAlbumContext,
				updateAlbum
			},

			getters: {
				album: state => state.album
			}
		},

		methods: {
			toDashboard () {
				this.$router.go({ name: 'dashboard' })
			},

			makeEditable (e) {
				if(this.album.smart)
				{
					return false;
				}

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

		route: {
			activate () {
				this.loadAlbum(this.$route.params.id)

				this.uploadParams = { album_id: this.$route.params.id }

				setTimeout(() => console.log(this.album), 2000)
			}
		}
	}
</script>