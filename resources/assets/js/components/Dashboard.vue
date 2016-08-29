<template>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-plus"></i>
						</button>
						<ul class="dropdown-menu">
							<li>
								<uploader></uploader>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="#" @click.prevent="newAlbum">New Album</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <section id="smart-albums">
	        <div class="row">
	            <div class="col-sm-12">
	                <h3 class="page-header">
	                    Smart Albums
	                </h3>
	            </div>
	        </div>
	        <album-list smart="true"></album-list>
	    </section>
	    <section id="made-albums">
	        <div class="row">
	            <div class="col-sm-12">
	                <h3 class="page-header">
	                    Albums
	                </h3>
	            </div>
	        </div>
	        <album-list smart="false"></album-list>
	    </section>
	</div>
</template>

<script>
	import Uploader from './Uploader.vue'
	import { getAlbums, createAlbum, setUploader } from '../vuex/actions'

	export default {
		components: {
			Uploader
		},

		vuex: {
			actions: {
				getAlbums,
				createAlbum,
				setUploader
			}
		},

		methods: {
			newAlbum () {
				let title = window.prompt('Album name...')

				this.createAlbum({ title })
			}
		},

		ready () {
			this.getAlbums()
		}
	}
</script>