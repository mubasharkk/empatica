import React, {Component} from 'react';

class InfoGraph extends Component {

    constructor(props) {
        super(props);
        this.props = props;
    }

    preRender() {

    }

    postRender() {

    }

    render() {
        return (
            <svg id={'graph'} width={960} height={500}></svg>
        );
    }
}

export default InfoGraph;