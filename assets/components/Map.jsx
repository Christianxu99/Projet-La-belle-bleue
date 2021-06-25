import axios from 'axios';
import * as React from 'react';

export const Map = () => {
  //pour l'exemple de la boucle, pour rajouter des markers depuis votre base de données : 
  const [list, setList] = React.useState({});
  const [hMapContainer, setHMapContainer] = React.useState();
  React.useEffect(() => {
    axios.get('/establishment/api/listplace').then((d) => { // on récupère depuis symfony la liste de ce qui nous intéresse, pour l'exemple je renvoi un tableau en brut, mais vous devez bien sûr faire un query builder et récupérer avec un select ce qui vous intéresse
      let l = d.data;
      setList(l);
    })
  }, []); // on le fait au chargement du composant une fois

  React.useEffect(() => {
    console.log("LISTE CHANGEE");
    if (list && hMapContainer) { // si la liste n'est pas vide et que la map est disponible
      let arrayCoordinates = [];
      Object.keys(list).forEach(key => { 
        arrayCoordinates.push(new H.map.Marker({lat: list[key].lat, lng: list[key].lng}));
      });
      addMarkersToMap(hMapContainer, arrayCoordinates);
    }
  }, [list]) // on observe le changement de list, ça permet du coup de récupérer autant de fois qu'on le souhaite via l'api la liste et la rafraichir ensuite si besoin...
  const addMarkersToMap = (map, arrayCoordinates) => {
    arrayCoordinates.forEach((marker => {
      map.addObject(marker);
    }))
  }
  const mapRef = React.useRef(null);


  React.useLayoutEffect(() => {
    if (!mapRef.current) return;
    const H = window.H;
    const platform = new H.service.Platform({
      apikey: "MPjPBkGSsV_-P78ADjkDAxVDwdpsU9pFqUoZMRc36p8"
    });
    const defaultLayers = platform.createDefaultLayers();
    const hMap = new H.Map(mapRef.current, defaultLayers.vector.normal.map, {
      center: { lat: 48.866667, lng: 2.333333 },
      zoom: 11.5,
      pixelRatio: window.devicePixelRatio || 1
    });

    const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(hMap));

    const ui = H.ui.UI.createDefault(hMap, defaultLayers);

    setHMapContainer(hMap); //je stocke dans un état la map
    // hMap && addMarkersToMap(hMap);

    return () => {
      hMap.dispose();
    };
  }, [mapRef]);


  return <div className="map" ref={mapRef} style={{ height: "300px"}} />;
};