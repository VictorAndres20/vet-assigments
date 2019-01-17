import React from 'react';
import '../../App/App.css';
import servImg from '../../Resources/images/service.png';

export default class CardListServices extends React.Component
{
    goToSchedule=(id)=>
    {
        window.location.href="/agendar/"+id;
    }

    render()
    {
        return(
            <div className="list-container">
                {
                    this.props.services.map((service,index)=>
                    {
                        return(
                            <div class="card" key={index}>
                                <div class="card-body">
                                    <div className="container">
                                        <div className="row">
                                            <div className="col-sm-2">
                                                <img src={servImg} style={{width:43+'px',height:43+'px',borderRadius:50+'%'}} alt="veterinaria" />
                                            </div>
                                            <div className="col-sm-2">
                                                <h6 class="card-title">{service.nom_service}</h6>
                                            </div>
                                            <div className="col-sm-4">
                                                <p class="card-text">{service.desc_service} - {service.price_service}</p>
                                            </div>
                                            <div className="col-sm-4 text-center">
                                                <button onClick={()=>this.goToSchedule(service.cod_service)} style={{padding:10+'px'}} type="button" class="btn btn-cyan">Agendar</button>
                                            </div>
                                        </div>
                                    </div>                      
                                </div>
                            </div> 
                        );
                    })
                }                          
            </div>            
        );
    }
}