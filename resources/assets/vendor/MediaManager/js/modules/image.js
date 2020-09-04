import debounce from 'lodash/debounce'
import animateScrollTo from '../packages/animated-scroll-to'

export default {
    methods: {
        // btns
        imageEditor() {
            if (this.selectedFileIs('image')) {
                this.toggleModal('imageEditor_modal')
            }
        },
        imageEditorCard() {
            this.toggleModal()

            // avoid flicker
            setTimeout(this.imageEditor, 10)
        },

        // scrollable
        isScrollable() {
            let item = this.$refs[this.activeModal ? 'img-card-prev' : 'img-prev']
            if (item) {
                return this.scrollableBtn.state = item.scrollHeight > item.offsetHeight
            }
        },
        updateScrollableDir: debounce(function (ref) {
            let item = this.$refs[ref]
            let margin = 3

            return this.scrollableBtn.dir = (item.scrollTop + item.clientHeight) >= (item.scrollHeight - margin)
                ? 'up'
                : 'down'
        }, 250),
        scrollImg(ref) {
            let item = this.$refs[ref]

            return animateScrollTo(item, {
                speed: 250,
                maxDuration: 500,
                offset: this.scrollableBtn.dir == 'up' ? -item.scrollHeight : item.scrollHeight,
                element: item,
                useKeys: true
            })
        }
    }
}
