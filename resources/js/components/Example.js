import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
  render() {
    return (
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-8">
            <div className="card">
              <div className="card-header">Example Component</div>

              <div className="card-body">
                I'm an example component!
                from {this.props.name}
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

if (document.getElementById('example')) {
  // find element by id
  const element = document.getElementById('example')

  // create new props object with element's data-attributes
  // result: {tsId: "1241"}
  const props = Object.assign({}, element.dataset)

  // render element with props (using spread)
  ReactDOM.render(<Example {...props}/>, element);
}
