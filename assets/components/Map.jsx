import React from 'react';
import GoogleMapReact from 'google-map-react';
const API_KEY = 'AIzaSyAtE3RhcosZj3YomIt1xb0LMQa0ugDDer0';

const AnyReactComponent = ({ text, isPositionPicto = false }) => (
  <div 
    onClick={() => alert(`${isPositionPicto ? 'Ma position' : 'restaurant:'} ${text}`)}
  >
    <img style={{ width: '30px' }} src={isPositionPicto ? "images/position.png" : "images/earth-planet.png"} alt={text}/>
  </div>
);


export const Map = ({ userPos, zoom, restaurants }) => {
  return (
    <div style={{ height: '560px', width: '100vh' }}>
      <GoogleMapReact
        bootstrapURLKeys={{ key: API_KEY }}
        defaultCenter={{ lat: 48.866667, lng: 2.333333 }}
        center={userPos}
        zoom={zoom} 
      >
        {restaurants.length > 0 && restaurants.map(restaurant =>
            <AnyReactComponent
              key={restaurant.name}
              lat={restaurant.lat}
              lng={restaurant.lng}
              text={restaurant.name}
            />
          )
        }
        {userPos &&
          <AnyReactComponent
            lat={userPos.lat}
            lng={userPos.lng}
            text={`lat: ${userPos.lat}, lng: ${userPos.lng}`}
            isPositionPicto
          />
        }
      </GoogleMapReact>
    </div>
  );
}