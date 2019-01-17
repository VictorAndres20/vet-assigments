import React from 'react';
import CardListServices from '../../Components/CardLists/CardListServices.js';
import URLS from '../../Utilities/URLS.js';
import vetImg from '../../Resources/images/vet.png';

export default class Vet extends React.Component
{
    state=
    {
        services:[{}]
    }

    componentDidMount()
    {
        this.loadServices();
    }

    loadServices=()=>
    {
        fetch(URLS.api+'/getservicesbycity/'+this.props.match.params.id)
        .then((res)=>
        {
            return res.json();
        })
        .then((json)=>
        {
            if(json.id===1)
            {
                this.setState({services:json.data});
            }
        });
    }

    getVetName=()=>
    {
        if(this.state.services.length>0)
        {
            return(
                <h4 class="card-title" style={{marginTop:20+'px'}}>{this.state.services[0].nom_vet}</h4>
            );
        }  
        else
        {
            return(
                <h4 class="card-title" style={{marginTop:20+'px'}}>Esta veterinaria no tiene servicios que brindar</h4>
            );
        }      
    }

    getVetAddrPhon=()=>
    {
        if(this.state.services.length>0)
        {
            return(
                <p class="card-text">{this.state.services[0].phon_vet} - {this.state.services[0].addr_vet}</p>
            );
        }  
    }

    render()
    {
        return(
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-4 text-center">
                        <div class="card" style={{marginTop:20+'px',marginBottom:20+'px'}}>
                            <div class="card-body">
                                <div className="container">
                                    <div className="row">
                                        <div className="col-sm-12">
                                            <img src={vetImg} style={{width:70+'px',height:70+'px',borderRadius:50+'%'}} alt="veterinaria" />
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-sm-12">
                                            {this.getVetName()}
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-sm-12">
                                            {this.getVetAddrPhon()}
                                        </div>
                                    </div>
                                </div>                      
                            </div>
                        </div> 
                    </div> 
                    <div className="col-sm-8 text-center">
                        Servicios ({this.state.services.length})
                        <CardListServices
                            services={this.state.services}
                        />
                    </div>
                </div>
            </div>
        );
    }
}