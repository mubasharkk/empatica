import InfoGraph from './InfoGraph';

class GeoGraph extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'geo-graph',
            data: [],
            interval: null
        };
    }

    componentWillMount() {

    }

    componentDidMount() {
        this.prepareGraph();
        this.populateGraph()
        this.setState({
            interval : setInterval( () => this.populateGraph(), 5000)
        });
    }

    componentWillUnmount() {
        clearInterval(this.state.interval);
    }

    prepareGraph() {
        this.setState({
            chart: new CanvasJS.Chart(this.state.name, {
                exportEnabled: true,
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Downloads by country"
                },
                axisY: {
                    title: "App ID"
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
                        type: "bar",
                        name: prop,
                        showInLegend: "true",
                        xValueFormatString: "0",
                        yValueFormatString: "",
                        dataPoints: data[prop].map((item) => {
                            return {
                                y: item.total,
                                label: item.appType
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