module.exports = {
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
}