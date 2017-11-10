import React, {Component} from 'react';
import axios from 'axios';

class InfoGraph extends Component {

    constructor(props) {
        super(props);
        this.props = props;
    }

    sendRequest(requestUri, params, callback) {
        axios
            .get(requestUri, {
                params: params
            })
            .then(callback)
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        return (
            <div>
                <div id={this.state.name} className={'info-graph'}></div>
                <hr/>
            </div>
        );
    }
}

export default InfoGraph;