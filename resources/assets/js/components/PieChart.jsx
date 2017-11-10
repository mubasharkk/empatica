import InfoGraph from './InfoGraph';
import React from 'react';

class PieChart extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'pie-chart',
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
                title:{
                    text: "Most Downloaded Apps"
                },
                legend:{
                    cursor: "pointer",
                    itemclick: this.slicePie
                },
                data: this.state.data
            })
        });
    }


    slicePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    }

    populateGraph() {
        axios.get('/api/dashboard/graph/app-popularity/data')
            .then(response => {
                this.setState({
                    data: [{
                            type: "pie",
                            startAngle: 240,
                            yValueFormatString: "##0",
                            indexLabel: "{label} ({y})",
                            dataPoints: response.data.data.map(function(item) {
                                return {
                                    label : item.name,
                                    y: item.total
                                };
                            })
                        }]
                });
            }).then(() => {
                this.state.chart.options.data = this.state.data;
                this.state.chart.render();
            });
    }
}

export default PieChart;