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



function App(){

    return(
        
        <SearchEstablishment/>
        
        // on aurait pu inclure un composant comme on l'a fait pendant le cours et le charger ici <Home /> par exemple
    )
}

ReactDOM.render(<App />, document.getElementById("root")); // l'id root ici sera créé dans un <div id="root"></div> dans n'importe quel template twig que vous choisissez.

