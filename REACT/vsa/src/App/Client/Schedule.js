import React from 'react';
import FormAssign from '../../Components/Forms/FormAssign.js';

export default class Schedule extends React.Component
{
    state=
    {
        renderPets:false,
        renderFormClient:false
    }

    renderNext=()=>
    {
        if(this.state.renderPets===true)
        {
            return(<div>Pets</div>);
        }
        if(this.state.renderFormClient===true)
        {
            return(<div>New Client</div>);
        }
        return(<div>Completa el formulario de asignación para el siguiente paso</div>);
    }

    render()
    {
        return(
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-6 text-center">
                        <FormAssign
                            id={this.props.match.params.id}
                        />
                    </div>
                    <div className="col-sm-6 text-center">
                        {this.renderNext()}
                    </div>
                </div>
            </div>
        );
    }
}