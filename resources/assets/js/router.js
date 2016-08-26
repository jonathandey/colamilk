const VueRouter = require('vue-router')
Vue.use(VueRouter)

const router = new VueRouter()

// Vue.component('album', require('./components/Album.vue'));

router.map({
	'/': {
		name: 'dashboard',
		component: require('./components/Dashboard.vue')
	},

	'/album/:id': {
		name: 'album',
		component: require('./components/Album.vue')
	}
})

module.exports = router