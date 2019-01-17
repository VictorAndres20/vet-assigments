import React from 'react';
import URLS from '../../Utilities/URLS.js';

export default class SelectCity extends React.Component
{
    state=
    {
        cities:[]
    }

    componentWillMount()
    {
        this.loadCities();
    }

    loadCities=()=>
    {
        fetch(URLS.api+'getcities')
        .then((res)=>
        {
            return res.json();
        })
        .then((json)=>
        {
            if(json.id===1)
            {
                this.setState({cities:json.data});
            }
        })
    }

    render()
    {
        return(
            <select class="browser-default custom-select" style={{marginBottom:20+'px'}}>
                {
                    this.state.cities.map((city,index)=>
                    {
                        return(<option key={index} value={city.cod_city}>{city.nom_city}</option>);
                    })
                }
            </select>
        );
    }
}