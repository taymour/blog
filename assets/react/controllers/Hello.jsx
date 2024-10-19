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
            <h1>Clicks: <span id="count">0</span> </h1>
            <p>Hello, {props.fullName}</p>
            <button onClick={incrementCount}>Click</button>
        </div>
    );
}
