/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import React from "react";

import ReactDOM from "react-dom";

import {SearchEstablishment} from "./components/Nav";

import {Map} from "./components/Map";

import {SearchAddress} from "./components/SearchAdress";



function Search(){

    return(
        

        <div style={{ width:"30rem"}}>

       
        <SearchAddress/>


        </div>

        // on aurait pu inclure un composant comme on l'a fait pendant le cours et le charger ici <Home /> par exemple
    )
}


function NavEstablishment(){


     return (
     
     
      <div style={{ width:"30rem"}}>
     
     <SearchEstablishment/>
     
      </div>
     
     )
    
}



function MapRender(){

    return(

      <Map/>   

    )
}




if(document.getElementById("search"))
{

ReactDOM.render(<Search />, document.getElementById("search")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}




if(document.getElementById("searchestablishment"))
{

ReactDOM.render(<NavEstablishment />, document.getElementById("searchestablishment")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}





if(document.getElementById("map"))
{

ReactDOM.render(<MapRender />, document.getElementById("map")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.
}



