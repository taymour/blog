import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    load({ params: { url } }) {
        fetch(url)
            .then(response => response.text())
            .then(html => document.querySelector('#preview').innerHTML = html)
    }
}