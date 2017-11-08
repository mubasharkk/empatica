import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import LineGraph from './LineGraph'

class DashboardApp extends Component {

    constructor(props) {
        super(props);

        console.log(props);

        this.props = props;

        this.graph = new LineGraph(props);

        this.state = {

        };
    }

    componentWillMount() {
        this.graph.preRender();
    }

    componentDidMount() {
        this.graph.postRender();
    }

    render() {
        return this.graph.render();
    }
}

export default DashboardApp;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('dashboard')) {
    ReactDOM.render(<DashboardApp GraphType={'LineGraph'}/>, document.getElementById('dashboard'));
}