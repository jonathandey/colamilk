<template>
	<a href="#" @click.prevent :class="triggerClass">
		{{ text }}
	</a>
</template>

<script>
	const Dropzone = require('dropzone')

	export default {
		props: {
			text: {
				default: 'Upload Photos'
			},

			url: {
				default: '/upload'
			},

			acceptedFiles: {
				default: '.jpg,.jpeg,.png'
			},

			params: {
				default: {}
			},

			collection: {
				default: []
			}
		},

		data () {
			return {
				uploader: null,
				triggerClass: 'upload-trigger'
			}
		},

		attached () {
			this.uploader = new Dropzone(document.body, { 
				url: this.url,
				uploadMultiple: true,
				headers: {
					'X-CSRF-TOKEN': Laravel.csrfToken
				},
				paramName: 'photos',
				clickable: document.querySelectorAll('.' + this.triggerClass)[0],
				acceptedFiles: this.acceptedFiles,
				previewTemplate: '<div></div>'
			})
		},

		detached () {
			this.uploader.destroy()
		},

		ready () {
			this.uploader.on('sending', (file, xhr, form) => this.onSending(file, xhr, form))
			this.uploader.on('addedfile', (file) => this.onAddedFile(file))
			this.uploader.on('thumbnail', (file, thumb) => this.onThumbnail(file, thumb))
		},

		methods: {
			onSending (file, xhr, form) {
				form.append('album_id', this.params['album_id'])
			},

			onAddedFile (file) {
				this.collection.push({ name: file.name, thumbnail: '#' })
			},

			onThumbnail (file, thumb) {
				this.collection.forEach((photo) => {
					if(photo.name == file.name)
					{
						photo.thumbnail = thumb
					}
				})

				console.log(this.collection)
			}
		}
	}
</script>