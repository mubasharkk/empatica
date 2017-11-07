import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Example extends Component {

    elemStyle() {
        return {
            'color': '#fced16',
            'padding': '10px'
        }
    }

    handleChange(event) {
        $('#title').html(event.target.value);
    }

    render() {
        return (
            <div>
                <div className="text-center">
                    <div className="animated lightSpeedIn">
                        <img height="250" src="http://www.petmd.com/sites/default/files/petmd-cat-happy-10.jpg"/>
                    </div>
                    <h1 id={'title'} style={this.elemStyle()}>I <i className="fa fa-fw fa-heart-o"></i>  icecream </h1>
                    <div className="col-md-6 col-md-offset-3 form-group">
                        <textarea rows={5} cols={50} className="form-control"  onChange={this.handleChange}>
                        </textarea>
                    </div>
                </div>
            </div>
        );
    }
}

export default Example;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}