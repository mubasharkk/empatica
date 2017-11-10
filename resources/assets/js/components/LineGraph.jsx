import InfoGraph from './InfoGraph';
import React from 'react';

class LineGraph extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'line-graph',
            data: [],
            interval: null
        }
    }

    componentDidMount() {
        this.prepareGraph();
        this.populateGraph();
        this.setState({
            interval : setInterval( () => this.populateGraph(), 5000)
        });
    }

    componentWillUnmount() {
        clearInterval(this.state.interval);
    }

    prepareGraph() {
        this.setState({
            chart : new CanvasJS.Chart(this.state.name, {
                exportEnabled: true,
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Downloads Peek Hours"
                },
                axisX: {
                    valueFormatString: "0#",
                    suffix: ":00"
                },
                axisY: {
                    title: "No. of downloads",
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

    componentWillUnmount() {
        clearInterval(this.state.interval);
    }

    populateGraph() {
        axios.get('/api/dashboard/graph/peek-hours/data')
            .then(response => {
                this.setState({
                    data: response.data.data.map(function (item) {
                        return {
                            'name': item.name,
                            'type': 'spline',
                            showInLegend: true,
                            xValueFormatString: "Hour: #00:'00'",
                            dataPoints: item.points.map(function (data) {
                                return {
                                    x: data.hour,
                                    y: data.count
                                }
                            })
                        };
                    })
                });
            }).then(() => {
                this.state.chart.options.data = this.state.data;
                this.state.chart.render();
            });
    }
}

export default LineGraph;