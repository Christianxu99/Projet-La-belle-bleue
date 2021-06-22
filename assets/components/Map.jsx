import * as React from 'react';

export const Map = () => {
    const  addMarkersToMap = (map) => {
        var parisMarker = new H.map.Marker({lat:48.8567, lng:2.3508});
        map.addObject(parisMarker);

        var lapasserelleMarker = new H.map.Marker({lat:48.88296194821423, lng: 2.3664626944065055});
        map.addObject(lapasserelleMarker);


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
      zoom: 12,
      pixelRatio: window.devicePixelRatio || 1
    });


    const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(hMap));

    const ui = H.ui.UI.createDefault(hMap, defaultLayers);  
  



    hMap && addMarkersToMap(hMap);

    //cleanup du useEffect
    return () => {
      hMap.dispose();
    }; 
  }, [mapRef]); 
  


  return <div className="map" ref={mapRef} style={{ height: "500px" }} />;
};