export default {
  data () {
    return {
      errors: {}
    }
  },
  methods: {
    hasErrors (field) {
      return !!this.errors[field]
    },
    getError (field) {
      return this.hasErrors(field) ? this.errors[field][0] : ''
    },
    getErrors (field) {
      return this.hasErrors(field) ? this.errors[field] : []
    }
  }
}
