import React from 'react';

export default class ErrorPage extends React.Component
{
    render()
    {
        return(
            <div className="container" style={{height:400+'px'}}>
                <div className="row">
                    <div className="col-sm-12 text-center">Vaya! Parece que te has perdido</div>
                </div>
            </div>
        );
    }
}