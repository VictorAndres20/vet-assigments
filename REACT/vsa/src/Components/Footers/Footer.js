import React from 'react';

export default class Footer extends React.Component
{
    render()
    {
        return(
            <div style={{background:'#4FBBE9'}}>
                <div style={{color:"#fff"}} class="footer-copyright text-center py-3">
                    <p>Hecho con <i class="fas fa-heart"></i> en Colombia.</p>
                    <p>© 2019 Copyright: Víctor Andrés Pedraza León</p>
                    <a style={{color:"#fff"}} href="http://vapedraza.site"> Sobre mí: vapedraza.site</a>
                </div>
            </div>
            
        );
    }
}