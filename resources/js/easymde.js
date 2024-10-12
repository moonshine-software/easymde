import EasyMDE from "easymde";
import DOMPurify from 'dompurify';

document.addEventListener('alpine:init', () => {
  Alpine.data('easyMde', (options = {}) => ({
    instance: null,
    options: options,

    init() {
      this.instance = new EasyMDE(this.config())

      this.$el.addEventListener('reset', () => {
        this.instance.value(this.$el.value)
      })
    },

    config() {
      return Object.assign(
        {
          element: this.$el,
          renderingConfig: {
            sanitizerFunction: renderedHTML => {
              return DOMPurify.sanitize(renderedHTML, {
                USE_PROFILES: {
                  html: true,
                },
              })
            },
          },
        },
        this.options,
      )
    },
  }))
})
