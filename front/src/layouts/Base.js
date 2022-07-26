import React from 'react';

const Base = (props) => {

    const {children} = props;

    return (
        <div className="container mt-4">
            {children}
        </div>
    );
}

export default Base;
