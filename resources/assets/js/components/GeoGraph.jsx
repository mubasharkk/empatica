import InfoGraph from './InfoGraph';

class GeoGraph extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'geo-graph'
        };
    }

    componentWillMount() {

    }

    componentDidMount() {
        this.prepareGraph();
        this.populateGraph()
        // setInterval( () => this.populateGraph(), 5000);
    }

    prepareGraph() {
        this.setState({
            chart: new CanvasJS.Chart(this.state.name, {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Downloads by country"
                },
                axisY:{
                    valueFormatString: "#0",
                },
                axisX: {
                    valueFormatString: "0"
                },
                legend: {
                    cursor: "pointer",
                    fontSize: 14,
                },
                toolTip: {
                    shared: true
                },
                data: this.state.data
            })
        });
    }

    populateGraph() {
        axios.get('/api/dashboard/graph/geo-data/data')
            .then(response => {
                let points = [], data = response.data.data;

                for (let prop in data) {
                    let obj = {
                        type: "stackedBar",
                        name: prop,
                        showInLegend: "true",
                        xValueFormatString: "0",
                        yValueFormatString: "",
                        dataPoints: data[prop].map((item) => {
                            return {
                                y: item.total,
                                x: item.appType
                            };
                        })
                    }
                    points.push(obj);
                }

                this.setState({
                    data: points
                });
            })
            .then(() => {
                this.state.chart.options.data = this.state.data;
                this.state.chart.render();
            });
    }
}

export default GeoGraph;