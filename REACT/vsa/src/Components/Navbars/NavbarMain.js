import React from 'react';
import '../../App/App.css';
import Logo from '../../Resources/images/logo.png';

export default class NavbarMain extends React.Component
{
    render()
    {
        return(
            <nav className="mb-1 navbar navbar-expand-lg navbar-dark" style={{backgroundColor:'#4FBBE9'}}>
                <a className="navbar-brand" href="/inicio"><img src={Logo} style={{width:43+'px',height:43+'px',borderRadius:50+'%'}} alt="Logo" /></a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                    <ul class="navbar-nav mr-auto">
                        <li className="nav-item" id="nav-item2">
                            <a className="nav-link waves-effect waves-light title-nav" id="nav-item2" href="/inicio">
                                Vet Service Assigment
                            </a>
                        </li>
                    </ul>
                    <ul className="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item waves-effect waves-light" href="#!"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                            <a class="dropdown-item waves-effect waves-light" href="#!"><i class="fas fa-edit"></i> Registra tu veterinaria</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        );
    }
}