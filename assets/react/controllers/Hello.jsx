import React, { useState } from 'react';

export default function Hello(props) {
    const [count, setCount] = useState(0);

    const incrementCount = () => {
        setCount(count + 1);
    };

    return (
        <div>
            <h1>Hello, {props.fullName}!</h1>
            <p>You have clicked {count} times.</p>
            <button onClick={incrementCount}>Click me!</button>
        </div>
    );
}
