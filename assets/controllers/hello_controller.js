import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    connect() {
        console.log('MY STIMULUS CONNECTED')
    }

    disconnect() {
        console.log('STIMULUS DISCONNECTED')
    }

    initialize() {
        console.log('STIMULUS INITIALIZED')
    }
}