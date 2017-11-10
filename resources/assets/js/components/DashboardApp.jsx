import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import LineGraph from './LineGraph';
import GeoGraph from './GeoGraph';
import PieChart from './PieChart';
import DownloadsList from './DownloadsList';
import MapView from './Maps/MapView';

class DashboardApp extends Component {

    constructor(props) {
        super(props);

        this.props = props;
        this.state = {
            componentType : 'peek-hours'
        };

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick(type) {
        this.setState({componentType: type });
    }

    renderComponent()
    {
        switch (this.state.componentType){
            default:
            case 'peek-hours':
                return (
                    <LineGraph/>
                );
                break;
            case 'geo-data':
                return (
                    <GeoGraph/>
                );
                break;
            case 'app-popularity':
                return (
                    <PieChart/>
                );
                break;
            case 'downloads-list':
                return (
                    <DownloadsList/>
                );
                break;
            case 'map-view':
                return (
                    <MapView/>
                );
                break;
        }
    }

    render() {
        return (
            <div className={'row'}>
                <div className={'col-md-3'}>
                    <div className={"list-group"}>
                        <a href="#" className={"list-group-item"} onClick={()=> { this.handleClick('peek-hours')}}>
                            <i className={"fa fa-line-chart fa-fw"}/> Hourly Downloads
                        </a>
                        <a href="#" className={"list-group-item"} onClick={()=> { this.handleClick('geo-data')}}>
                            <i className={"fa fa-bar-chart fa-fw"}/> Downloads by Locality
                        </a>
                        <a href="#" className={"list-group-item"} onClick={()=> { this.handleClick('app-popularity')}}>
                            <i className={"fa fa-pie-chart fa-fw"}/> Apps Popularity
                        </a>
                        <a href="#" className={"list-group-item"} onClick={()=> { this.handleClick('downloads-list')}}>
                            <i className={"fa fa-list fa-fw"}/> Downloads Data
                        </a>
                        <a href="#" className={"list-group-item"} onClick={()=> { this.handleClick('map-view')}}>
                            <i className={"fa fa-map fa-fw"}/> Map View
                        </a>
                    </div>
                </div>
                <div className={'col-md-9'}>
                    <div className={'col-md-12'}>
                        {this.renderComponent()}
                    </div>
                </div>
            </div>
        );
    }
}

export default DashboardApp;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('dashboard')) {
    ReactDOM.render(<DashboardApp/>, document.getElementById('dashboard'));
}