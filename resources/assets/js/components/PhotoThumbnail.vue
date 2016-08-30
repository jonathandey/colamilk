<template>
	<div class="col-sm-2">
		<div v-show="photo.thumbnail != '#'">
			<img :src="photo.thumbnail" alt="{{ photo.name }}" class="img-responsive">
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			photo: {
				default: {
					name: '',
					thumbnail: '#'
				}
			}
		}	
	}
</script>