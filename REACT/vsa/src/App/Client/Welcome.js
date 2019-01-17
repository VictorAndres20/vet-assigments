import React from 'react';

/** Components */
import CradListVets from '../../Components/CardLists/CardListVets.js';
import SelectCity from '../../Components/Selects/SelectCity.js';
/** URLS */
import URLS from '../../Utilities/URLS.js';

export default class Welcome extends React.Component
{
    state=
    {
        city:1,
        vets:[{}]
    }

    componentWillMount()
    {
        this.loadVets();
    }

    loadVets=()=>
    {
        fetch(URLS.api+'getvetsbycity/'+this.state.city)
        .then((res)=>
        {
            return res.json();
        })
        .then((json)=>
        {
            if(json.id===1)
            {
                this.setState({vets:json.data});
            }
        });
    }

    render()
    {
        return(
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-3 text-center">
                        <p>Ciudad de búsqueda</p>
                        <SelectCity />
                    </div>
                    <div className="col-sm-9 text-center">
                        <p>Veterinarias ({this.state.vets.length})</p>
                        <CradListVets 
                            vets={this.state.vets}
                        />
                    </div>
                </div>
            </div>
        );
    }
}