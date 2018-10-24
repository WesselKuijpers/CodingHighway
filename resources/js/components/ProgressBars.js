import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class ProgressBars extends Component {
  constructor() {
    super()
    this.state = {
      progress: 0,
      max: 0
    }
  }

  componentDidMount() {
    let lesson = (this.props.lessons) ? this.props.lessons : 0;
    let exercise = (this.props.exercises) ? this.props.exercises : 0;

    let post = {
      user_id: this.props.user_id,
      course_id: this.props.course_id,
      lessons: lesson,
      exercises: exercise
    };

    axios.post('/api/progress?api_token=' + this.props.token, post)
      .then(response => {
        this.setState({
          progress: response.data.progress,
          max: response.data.max
        })
      }).catch(error => {
      console.log("ERROR: " + error)
    })
  }

  render() {
    const bar = this.state.progress / this.state.max * 100;
    const divStyle = {
      width: bar + '%'
    };

    return (
      <div className="progress mb-2">
        <div className="progress-bar" role="progressbar" style={divStyle}
             aria-valuenow={this.state.progress}
             aria-valuemin="0" aria-valuemax={this.state.max}
        >{this.state.progress} / {this.state.max}
        </div>
      </div>
    );
  }
}

if (document.getElementsByClassName('progressbar')) {
  $.each(document.getElementsByClassName('progressbar'), function (index, element) {
    // create new props object with element's data-attributes
    // result: {tsId: "1241"}
    const props = Object.assign({}, element.dataset)

    // render element with props (using spread)
    ReactDOM.render(<ProgressBars {...props}/>, element);
  });
  // find element by id
  // const element = document.getElementById('progressbar')

}
