import React, {Component} from 'react';
import GoogleMapsLoader from 'google-maps';

class MapView extends Component {

    constructor(props) {
        super(props);

        GoogleMapsLoader.KEY = window.GOOGLE_MAP_API_KEY;

        this.state = {
            map : null,
            markers : []
        };
    }

    componentDidMount() {
        GoogleMapsLoader.load((google) => {
            this.setState({
                map : new google.maps.Map(document.getElementById('map-view'), {
                    center: {lat: 48.1351, lng:  11.5820},
                    zoom: 5
                })
            });

            this.populateMap();
        });
    }


    populateMap() {
        axios.get('/api/download')
            .then(response => {
                response.data.data.data.forEach((element) => {
                    this.addMarkers({
                        lat: parseFloat(element.coordinates.latitude),
                        lng: parseFloat(element.coordinates.longitude)
                    })
                });
            });
    }

    addMarkers(coordinates) {
        this.state.markers.push(
            new google.maps.Marker({
                position: coordinates,
                map: this.state.map
            })
        );
    }

    render() {
        return (
            <div id={'map-view'} style={{height: '500px'}}>This is a map </div>
        );
    }
}

export default MapView;