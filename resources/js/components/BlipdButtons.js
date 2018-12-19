import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class BlipdButtons extends Component {
    constructor() {
        super()
        this.state = {
            exercise_id: 0,
            lesson_id: 0,
            state_id: 0,
            checked: 0,
            name: 0,
            api: '',

        }
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        let button = event.target;

        if (button.classList.contains("btn-success")) {
            let post = {
                lesson_id: this.state.lesson_id,
                exercise_id: this.state.exercise_id,
                state_id: this.state.state_id,
                name: this.state.name,
            };

            axios.post('/api/role/user?api_token=' + this.state.api, post)
                .then(response => {
                    let res = response.data;
                    console.log(res);

                    if (res != "bad") {
                        button.classList.remove("btn-success");
                        button.classList.add("btn-danger");
                    }
                }).catch(error => {
                console.log("ERROR: " + error)
            })
        } else if (button.classList.contains("btn-danger")) {
            let post = {
                lesson_id: this.state.lesson_id,
                exercise_id: this.state.exercise_id,
                state_id: this.state.state_id
            };

            axios.post('/api/role/user?api_token=' + this.state.api, post)
                .then(response => {
                    let res = response.data;
                    console.log(res);

                    if (res != "bad") {
                        button.classList.remove("btn-danger");
                        button.classList.add("btn-success");
                    }
                }).catch(error => {
                console.log("ERROR: " + error)
            })

        }
    }

    componentDidMount() {
        this.setState({
            user_id: this.props.user_id,
            role_slug: this.props.role_slug,
            role_name: this.props.role_name,
            checked: this.props.checked,
            api: this.props.api
        });
    }

    render() {
        if (this.state.checked == 1) {
            return (
                <button
                    className="btn btn-success"
                    onClick={this.handleChange}
                >
                    {this.state.name}
                </button>

            );
        } else {
            return (
                <button
                    className="btn btn-danger"
                    onClick={this.handleChange}>
                    {this.state.name}
                </button>
            );
        }
    }
}

    $.each(document.getElementById('lstate' + this.state.lesson_id + this.state.name), function (index, element) {
        // create new props object with element's data-attributes
        // result: {tsId: "1241"}
        const props = Object.assign({}, element.dataset);

        // render element with props (using spread)
        ReactDOM.render(<BlipdButtons {...props}/>, element);
    })
    // find element by id
    // const element = document.getElementById('progressbar')