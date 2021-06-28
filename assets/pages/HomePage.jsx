import React, { useState, useEffect } from 'react';
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
        <div className="container fond-home">
            <h1>Localisez les bonnes adresses de l’alimentation bio, veg’ et locale autour de vous !</h1>
            <div className="container d-flex justify-content-between">
                <LocationSearchInput setUserPos={setUserPos} setZoom={setZoom} />
                <button type="button" className="btn filtrer"> <img src="img/icon_filtrer.svg" alt="filtrer"/> Filtrer</button>
            </div>
            <div className="d-flex w-100">
                <div className="selection-result">
                    <h1>Notre selection</h1>
                    <p>sous paragraphe</p>
                    <div>
                        <img src="" alt="" />
                        <div>
                            <div>Non du resto</div>
                            <div>restaurant</div>
                            <div>avis</div>
                        </div>
                    </div>
                </div>
                <Map userPos={userPos} zoom={zoom} restaurants={restaurants} />
            </div>
        </div>
    )
}