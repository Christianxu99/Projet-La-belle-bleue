import React, { useState, useEffect, Fragment } from 'react';
import axios from 'axios';
import { Map } from '../components/Map';
import { LocationSearchInput } from '../components/LocationSearchInput';


export const HomePage = () => {
    const [userPos, setUserPos] = useState()
    const [zoom, setZoom] = useState(12)
    const [restaurants, setRestaurants] = useState([]);

    useEffect(() => {
      axios.get('/establishment/api/listplace').then((result) => {
        setRestaurants(result.data);
      })
    }, [])

    console.log('restaurants', restaurants);

    return (


     <Fragment>

        <div className="container fond-home">
        <h1>Localisez les bonnes adresses de l’alimentation bio, veg’ et locale autour de vous !</h1>
              
        <div className="container d-flex justify-content-between">

        <div className="container d-flex justify-content-between" >
             <LocationSearchInput setUserPos={setUserPos} setZoom={setZoom} /> 
        </div>

            <button type="button" className="btn filtrer"> <img src="images/icon_filtrer.svg" alt="filtrer"/> Filtrer</button>

        </div>


       <div className="container home">

                <div className="col-md-6 col-lg-8" > 
                  <Map userPos={userPos} zoom={zoom} restaurants={restaurants} /> 
              </div>


            </div>

        </div>


     </Fragment>
  
    )
}