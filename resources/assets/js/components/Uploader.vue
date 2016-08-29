<template>
	<a href="#" @click.prevent :class="triggerClass">
		{{ text }}
	</a>
</template>

<script>
	// import Uploader from '../Uploader'
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
				paramName: 'files',
				clickable: document.querySelectorAll('.' + this.triggerClass)[0],
				acceptedFiles: this.acceptedFiles,
				autoProcessQueue: true
			})
		},

		detached () {
			this.uploader.destroy()
		}
	}
</script>