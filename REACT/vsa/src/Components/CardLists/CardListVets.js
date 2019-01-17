import React from 'react';
import '../../App/App.css';
import vetImg from '../../Resources/images/vet.png';

export default class CardListVets extends React.Component
{
    goToVet=(id)=>
    {
        window.location.href="/veterinaria/"+id;
    }

    render()
    {
        return(
            <div className="list-container">
                {
                    this.props.vets.map((vet,index)=>
                    {
                        return(
                            <div class="card" key={index}>
                                <div class="card-body">
                                    <div className="container">
                                        <div className="row">
                                            <div className="col-sm-2">
                                                <img src={vetImg} style={{width:43+'px',height:43+'px',borderRadius:50+'%'}} alt="veterinaria" />
                                            </div>
                                            <div className="col-sm-2">
                                                <h6 class="card-title">{vet.nom_vet}</h6>
                                            </div>
                                            <div className="col-sm-4">
                                                <p class="card-text">{vet.phon_vet} - {vet.addr_vet}</p>
                                            </div>
                                            <div className="col-sm-4 text-center">
                                                <button onClick={()=>this.goToVet(vet.cod_vet)} style={{padding:10+'px'}} type="button" class="btn btn-cyan">Ir a ver</button>
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