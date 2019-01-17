import React from 'react';
import SelectTime from '../Selects/SelectTime.js';
import URLS from '../../Utilities/URLS.js';

export default class FormAssign extends React.Component
{
    state=
    {
        time:[],
        readyTime:false,
        ready:false
    }

    loadDisponibility=()=>
    {
        fetch(URLS.api+'gettimeassign/'+this.getDateFormat(document.getElementById('date').value)+'/'+this.props.id)
        .then((res)=>
        {
            return res.json();
        })
        .then((json)=>
        {
            if(json.id===1)
            {
                this.setState({time:json.data});
            }
        })
    }

    getDateFormat=(date)=>
    {
        return date.replace("/","-");
    }

    showButton=()=>
    {
        if(this.state.ready===true && this.state.readyTime===true && this.state.time.length>0)
        {
            return(<button type="button" class="btn btn-cyan">Continuar</button>);
        }
        return(<div></div>)
    }

    render()
    {
        return(
            <div class="card" style={{marginTop:20+'px',marginBottom:20+'px'}}>
                <div class="card-body">
                    <h4>Asignación de servicio</h4>
                    <div className="row">
                        <div className="col-sm-4">
                            <h5>Fecha:</h5>
                        </div>
                        <div className="col-sm-8">
                            <input id="date" type="date" class="form-control" onChange={this.loadDisponibility}/>
                        </div>
                    </div>                       
                    <hr/>
                    <div className="row">
                        <div className="col-sm-4">
                            <h5>Hora:</h5>
                        </div>
                        <div className="col-sm-8">
                        <SelectTime 
                            ready={()=>this.setState({readyTime:true})}
                            time={this.state.time}
                        />
                        </div>
                    </div> 
                    <hr/>
                    <div className="row">
                        <div className="col-sm-4">
                            <h5>Número celular:</h5>
                        </div>
                        <div className="col-sm-8">
                            <input id="phon" type="text" class="form-control" onChange={()=>this.setState({ready:true})}/>
                        </div>
                    </div>
                    <hr/>
                    {this.showButton()}
                </div>
            </div>
        );
    }
}