import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import LineGraph from './LineGraph'
import GeoGraph from './GeoGraph'

class DashboardApp extends Component {

    constructor(props) {
        super(props);

        this.props = props;
        this.state = {

        };
    }

    render() {
        return (
            <div className={'row'}>
                <div className={'col-md-12'}>
                    <LineGraph/>
                </div>
                <div className={'col-md-12'}>
                    <GeoGraph/>
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