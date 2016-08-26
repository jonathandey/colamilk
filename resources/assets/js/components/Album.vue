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
							<li><a href="#">Upload Photos</a></li>
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
				</section>
			</div>
		</div>
	</div>
</template>

<script>
	import PhotoThumbnail from './PhotoThumbnail.vue'

	import { loadAlbum, setAlbumContext, updateAlbum } from '../vuex/actions'

	export default {
		components: {
			PhotoThumbnail
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

		ready () {
			this.loadAlbum(this.$route.params.id)
		}
	}
</script>