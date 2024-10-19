import React from 'react';
import require$$0 from 'react-dom';
import { Controller } from '@hotwired/stimulus';

var createRoot;

var m = require$$0;
if (process.env.NODE_ENV === 'production') {
  createRoot = m.createRoot;
  m.hydrateRoot;
} else {
  var i = m.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;
  createRoot = function(c, o) {
    i.usingClientEntryPoint = true;
    try {
        console.log('try... createRoot');
      return m.createRoot(c, o);
    } finally {
        console.log('finally... createRoot OK');
      i.usingClientEntryPoint = false;
    }
    console.log('createRoot OK');
  };
}

class default_1 extends Controller {
    
    initialize() {
        console.log('ReactController initialized');
    }

    connect() {
        clearTimeout(this.disconnectTimeout);
        console.log('disconnect timeout cleared');
        
        const props = this.propsValue ? this.propsValue : null;
        this.dispatchEvent('connect', { component: this.componentValue, props: props });
        if (!this.componentValue) {
            throw new Error('No component specified.');
        }
        
        const component = window.resolveReactComponent(this.componentValue);
        const reactElement = React.createElement(component, props, null)
        console.log(reactElement);
        this._renderReactElement(reactElement);
        this.dispatchEvent('mount', {
            componentName: this.componentValue,
            component: component,
            props: props,
        });
    }
    disconnect() {
        // if (this.element.closest('[data-turbo-permanent]')) {
        //     return;
        
        this.disconnectTimeout = window.setTimeout(() => {
            console.log('disconnect timeout executed');
            this.element.root.unmount();
            this.element.root = null;
            this.dispatchEvent('unmount', {
                component: this.componentValue,
                props: this.propsValue ? this.propsValue : null,
            });
        }, 500);
        
        console.log('disconnect timeout set');
    }
    _renderReactElement(reactElement) {
        const element = this.element;
        if (!element.root) {
            element.root = createRoot(this.element);
        }
        element.root.render(reactElement);
    }
    dispatchEvent(name, payload) {
        this.dispatch(name, { detail: payload, prefix: 'react' });
    }
}
default_1.values = {
    component: String,
    props: Object,
};

export { default_1 as default };
