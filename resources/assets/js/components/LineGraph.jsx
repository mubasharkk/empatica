import InfoGraph from './InfoGraph';
import React from 'react';

class LineGraph extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'line-graph',
            data: []
        }
    }

    componentDidMount() {
        this.prepareGraph();
        this.populateGraph();
        setInterval( () => this.populateGraph(), 5000);
    }

    prepareGraph() {
        this.setState({
            chart : new CanvasJS.Chart(this.state.name, {
                exportEnabled: true,
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