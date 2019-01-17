import React from 'react';

export default class Schedule extends React.Component
{
    state=
    {
        timeAvailable:[]
    }

    loadDisponibility=(service,date)=>
    {

    }

    render()
    {
        return(
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-4 text-center">
                        <h4>Asignación {this.props.match.params.id}</h4>
                        <h5>Fecha:</h5>
                        <input id="date" type="date"/>
                        <hr/>
                        <button type="button" class="btn btn-cyan">Ver disponibilidad</button>
                    </div>
                </div>
            </div>
        );
    }
}