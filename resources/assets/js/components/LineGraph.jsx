import InfoGraph from './InfoGraph';
import React from 'react';

class LineGraph extends InfoGraph {
    constructor(props) {
        super(props);

        this.state = {
            name: 'line-graph',
            data: ''
        }
    }

    componentDidMount() {
        this.processData();
    }


    processData() {

        let svg = d3.select("svg"),
            margin = {top: 50, right: 50, bottom: 50, left: 50},
            width = svg.attr("width") - margin.left - margin.right - 60,
            height = svg.attr("height") - margin.top - margin.bottom,
            g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        let x = d3.scaleTime().range([0, width]),
            y = d3.scaleLinear().range([height, 0]),
            z = d3.scaleOrdinal(d3.schemeCategory10);

        let line = d3.line()
            .curve(d3.curveBasis)
            .x(function (d) {
                return x(parseInt(d.hour));
            })
            .y(function (d) {
                return y(d.IOS_MATE);
            });

        d3.json('/api/dashboard/graph/peek-hours/data', function (error, data) {
            if (error) throw error;

            if (!data.status) {
                return;
            }

            data = data.data.slice(1);
            let appTypes = Object.keys(data[0]).filter(function(key) {
                if (key != 'hour'){
                    return key;
                }
            });

            // Scale the range of the data
            x.domain([0,23]);
            y.domain([0, 60]);

            // Add the valueline path.
            svg.append("path")
                .data([data])
                .attr("class", "line")
                .attr("d", line);

            svg.append("g")
                .attr("transform", "translate(0," + height + ")")
                .call(d3.axisBottom(x));

            // Add the Y Axis
            svg.append("g")
                .attr("transform", "translate(" + (margin.left + 30) + ", 0)")
                .call(d3.axisLeft(y));


            svg.append("text")
                .attr("transform", "translate(" + (width+5) + "," + y(data[22].IOS_MATE) + ")")
                .attr("dy", ".35em")
                .attr("text-anchor", "start")
                .style("fill", "steelblue")
                .text("IOS_MATE");


            // now add titles to the axes
            svg.append("text")
                .attr("text-anchor", "middle")  // this makes it easy to centre the text as the transform is applied to the anchor
                .attr("transform", "translate("+ (margin.left/2) +","+(width/4)+")rotate(-90)")  // text is drawn off the screen top left, move down and out and rotate
                .text("Downloads per hour");

            svg.append("text")
                .attr("text-anchor", "middle")  // this makes it easy to centre the text as the transform is applied to the anchor
                .attr("transform", "translate("+ (width/2) +","+(height+margin.bottom)+")")  // centre below axis
                .text("Daily Hours");

        });
    }
}

export default LineGraph;