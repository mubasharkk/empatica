import ReactTable from 'react-table'
import 'react-table/react-table.css'
import React, {Component} from 'react';
import axios from 'axios';
import moment from 'moment';

class DownloadsList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            columns: []
        };
    }

    componentWillMount() {
        this.prepareData();
    }

    prepareData() {
        axios.get('/api/download')
            .then(response => {
                this.setState({
                    data: response.data.data.data.map(function (item) {
                        item.created = moment.unix(item.created).format("DD.MM.YYYY H:m:s");
                        return item;
                    }),
                    columns: response.data.data.columns.map(function (item) {
                        return {
                            Header: item.label,
                            accessor: item.name,
                        }
                    })
                });
            });
    }

    render() {
        return (
            <div className={'panel'}>
                <div className={'panel-body'}>
                    <ReactTable data={this.state.data} columns={this.state.columns}/>
                </div>
            </div>
        );
    }
}

export default DownloadsList;