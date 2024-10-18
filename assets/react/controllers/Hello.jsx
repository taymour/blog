import React from 'react';

export default function Hello(props) {
    const incrementCount = () => {
        const countElement = document.getElementById('count');
        let currentCount = parseInt(countElement.textContent, 10);
        currentCount += 1;
        countElement.textContent = currentCount;
    };

    return (
        <div>
            <h1>Hello, {props.fullName}!</h1>
            <p>You have clicked <span id="count">0</span> times.</p>
            <button onClick={incrementCount}>Click me!</button>
        </div>
    );
}