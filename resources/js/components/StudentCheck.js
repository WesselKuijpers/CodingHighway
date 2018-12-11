import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import StudentCheckCourse from './StudentCheckCourse'

export default class StudentCheck extends Component {
  constructor() {
    super()
    this.state = {
      load: false,
      student: {},
      courses: []
    }

  }

  componentDidMount() {
    this.setState({
      student: JSON.parse(this.props.student),
      courses: JSON.parse(this.props.courses),
      load: true
    })
  }

  CourseList(){
    let total = null;
    for (let i = 0; i < this.state.courses.length; i++){
      total += <StudentCheckCourse student={this.state.student} course={this.state.courses[i]} />
    }
    return total;
  }

  render() {
    if (!this.state.load) {
      return <div>loading</div>
    } else {
      return (
        <div className='card'>
          <p><strong>Email: </strong>{this.state.student.email}</p>
          <h4>Voortgang:</h4>
          <ul className="list-group">
            {this.CourseList()}
          </ul>
        </div>
      )
    }
  }
}

if (document.getElementsByClassName('studentcheck')) {
  $.each(document.getElementsByClassName('studentcheck'), function (index, element) {
    // create new props object with element's data-attributes
    // result: {tsId: "1241"}
    const props = Object.assign({}, element.dataset)

    // render element with props (using spread)
    ReactDOM.render(<StudentCheck {...props}/>, element);
  })
  // find element by id
  // const element = document.getElementById('progressbar')

}
