import React from 'react';

export default class SelectTime extends React.Component
{
    render()
    {
        return(
            <select onChange={this.props.ready} id="selectTime" class="browser-default custom-select">
                <option selected value="">Seleccione una hora</option>
                {
                    this.props.time.map((time,index)=>
                    {
                        return(<option key={index} value={time.time_assign}>{time.time_assign}:00</option>);
                    })
                }
            </select>
        );
    }
}