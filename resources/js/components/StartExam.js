import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class RoleCheckBox extends Component {
  constructor() {
    super()
    this.state = {}

    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event) {
  }

  componentDidMount() {
  }

  render() {
    return <div>loading</div>
  }
}

if (document.getElementsByClassName('startexam')) {
  $.each(document.getElementsByClassName('startexam'), function (index, element) {
    // create new props object with element's data-attributes
    // result: {tsId: "1241"}
    const props = Object.assign({}, element.dataset)

    // render element with props (using spread)
    ReactDOM.render(<RoleCheckBox {...props}/>, element);
  });
  // find element by id
  // const element = document.getElementById('progressbar')

}
