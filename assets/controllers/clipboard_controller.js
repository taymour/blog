import {Controller} from "@hotwired/stimulus"

export default class extends Controller {
    static targets = [ "source" ]
    static classes = [ "supported" ]

    connect() {
        if ("clipboard" in navigator) {
            console.log(this.element)
            this.element.classList.add(this.supportedClass)
        }
    }

    get source() {
        return this.sourceTarget.value
    }
    copy(event) {
        event.preventDefault()
        navigator.clipboard.writeText(this.source)
    }
}