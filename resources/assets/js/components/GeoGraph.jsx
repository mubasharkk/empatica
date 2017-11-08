import InfoGraph from './InfoGraph';

class GeoGraph extends InfoGraph
{
    constructor(props) {
        super(props);

        this.state = {
            name : 'geo-graph'
        };
    }

    componentWillMount() {
        var $this = this;
        this.sendRequest('api/dashboard/graph/peek-hours/data', {}, response => {
            if(response.status) {
                $this.data  = response.data;
            }
        });
    }

    componentDidMount() {
        console.log(this.data, 'test');
    }
}

export default GeoGraph;