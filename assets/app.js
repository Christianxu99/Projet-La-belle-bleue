/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import React, { Fragment } from "react";

import ReactDOM from "react-dom";


import {Map} from "./components/Map";

import {LocationSearchInput} from "./components/LocationSearchInput";
import { HomePage } from './pages/HomePage';



function Search(){

    return(
        

        <div style={{ width:"30rem"}}>

       
        <LocationSearchInput/>


        </div>

        // on aurait pu inclure un composant comme on l'a fait pendant le cours et le charger ici <Home /> par exemple
    )
}



function Gmap(){

    return(
       

        <Map/>   

       
     

    )
}


function Home(){

    return(
       

        <HomePage/>   

       
     

    )
}


if(document.getElementById("map"))
{

ReactDOM.render(<Gmap />, document.getElementById("map")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}


if(document.getElementById("search"))
{

ReactDOM.render(<Search />, document.getElementById("search")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}


if(document.getElementById("homepage"))
{

ReactDOM.render(<Home />, document.getElementById("homepage")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}





