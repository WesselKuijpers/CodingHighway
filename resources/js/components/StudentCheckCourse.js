import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import ProcessBar from './ProgressBars'

export default class StudentCheckCourse extends Component {
  constructor() {
    super()
    this.state = {
      course: {},
      student: {},
    }
  }


  componentDidMount() {
    this.setState({
      course: this.props.course,
      student: this.props.student
    });
  }

  render() {
    return (
      <div>
        <li className="list-group-item">{this.state.course.name}
          {/*@if($student->progress($course->id)->where('exercise_id', null)->count() != 0)*/}
          <i className="fas fa-eye"/>
          {/*@endif*/}
          {/* added id's */}
          <button type="button" className="btn btn-primary btn-organisation float-right" data-toggle="collapse"
                  data-target="#collapseCourse" aria-expanded="false"
                  aria-controls="collapseExample">
            <i className="fas fa-chevron-down"/>
          </button>
        </li>
        <div className="collapse" id="collapseCourse">
          <div className="card card-body">
            <p>Lessen:
              {/*<ProcessBar*/}
              {/*user_id="{{ $student->id }}"*/}
              {/*course_id="{{ $course->id }}"*/}
              {/*lessons="1"*/}
              {/*token="{{ $student->api_token }}"*/}
              {/*/>*/}
            </p>

            <p>Opdrachten:
              {/*<ProcessBar*/}
              {/*user_id="{{ $student->id }}"*/}
              {/*course_id="{{ $course->id }}"*/}
              {/*exercises="1"*/}
              {/*token="{{ $student->api_token }}"*/}
              {/*/>*/}
            </p>
            {/* TODO for each exercise*/}
            <div className="row">
              <div className="col-5">
                <h6>{/* Exercise title */}</h6>
              </div>
              <div className="col-3">
                {/*@if($exercise->solutions->where('user_id', $student->id)->count() == 1)*/}
                <a
                  href="#"
                  className="btn btn-success">Kijk na</a>
                {/*@else*/}
                <a href="#" className="btn btn-danger disabled">Niets ingeleverd</a>
                {/*@endif*/}
              </div>
              {/*@if($exercise->solutions->where('user_id', $student->id)->count() == 1)*/}
              {/*@if($exercise->solutions->where('user_id', $student->id)->first()->reviews()->where('user_id', Auth::id())->count() >= 1)*/}
              <div className="col-4">
                <strong>Je hebt al een beoordeling gegeven.</strong>
              </div>
              {/*@endif*/}
              {/*@endif*/}
            </div>
            <br/>
            {/*@endforeach*/}
          </div>
        </div>
      </div>
    )
  }
}
