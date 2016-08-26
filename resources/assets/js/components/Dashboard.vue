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
							<li><a href="#">Upload Photos</a></li>
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
	import { getAlbums, createAlbum } from '../vuex/actions'

	export default {
		props: ['smartLabel', 'generalLabel'],

		vuex: {
			actions: {
				getAlbums,
				createAlbum
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