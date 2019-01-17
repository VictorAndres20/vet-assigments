import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';

import Welcome from './Client/Welcome.js'; 
import Login from './Client/Login.js';
import Register from './Client/Register.js';
import Vet from './Client/Vet.js';
import Schedule from './Client/Schedule.js';
import ErrorPage from './ErrorPage/ErrorPage.js';


export default class RouterApp extends React.Component
{
    render()
    {
        return(
            <BrowserRouter basename="/YOUR_APP_NAME" >
                <Switch>
                    {/** Ruta por default */}
                    <Route exact path='/' render={(props)=> <Welcome />}/>
                    {/** Rutas especificas */}
                    <Route path='/inicio' render={(props)=> <Welcome />}/>
                    <Route path='/login' render={(props)=> <Login />}/>
                    <Route path='/registro' render={(props)=> <Register />}/>
                    <Route path='/veterinaria/:id' render={({match})=> <Vet match={match} />}/>
                    <Route path='/agendar/:id' render={({match})=> <Schedule match={match} />}/>
                    {/** Ruta no especificada */}
                    <Route component={ErrorPage} />
                </Switch>
            </BrowserRouter>
        );
    }
}