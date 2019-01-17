import React, { Component } from 'react';
import './App.css';
import Navbar from '../Components/Navbars/NavbarMain.js';
import RouterApp from './RouterApp.js'
import Footer from '../Components/Footers/Footer.js';

class App extends Component {
  render() {
    return (
      <div>
        <Navbar />
        <RouterApp />
        <Footer />
      </div>
      
    );
  }
}

export default App;
