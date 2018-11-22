import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import StartExamQuestion from './StartExamQuestion'

export default class StartExam extends Component {
  constructor() {
    super()
    this.state = {
      course_id: 0,
      questions: [],
      answers: [],
      load: false
    }

    this.handleChange = this.handleChange.bind(this);
    this.submit = this.submit.bind(this);
  }

  handleChange(event) {
    let data = event.target.dataset;

    this.state.answers[data.question] = data.id;

    console.log(this.state.answers);
    $.each($("a[data-question='"+data.question+"']"), function (index, element) {
      element.classList.add('disabled');
    })

    event.preventDefault();
  }

  submit(event) {
    let post = {};

    this.state.answers.map(function(item, index){
      post[index] = item;
    })

    console.log(post);
  }

  componentDidMount() {
    this.setState({course_id: this.props.course_id});

    axios.post('/api/startexam', {course_id: this.props.course_id})
      .then(response => {
        this.setState({
          questions: response.data,
          load: true
        })
      }).catch(error => {
      console.log("ERROR: " + error)
    })
  }

  render() {
    if (!this.state.load) {
      return <div>loading</div>
    } else {
      return (
        <div>
          {this.state.questions.map((item, index) => {
            return <StartExamQuestion question={item} clicklistener={this.handleChange}/>
          })}

          <button className="btn btn-primary btn-organisation" onClick={this.submit}>Verzenden</button>
        </div>
      )
    }
  }
}

if (document.getElementsByClassName('startexam')) {
  $.each(document.getElementsByClassName('startexam'), function (index, element) {
    // create new props object with element's data-attributes
    // result: {tsId: "1241"}
    const props = Object.assign({}, element.dataset)

    // render element with props (using spread)
    ReactDOM.render(<StartExam {...props}/>, element);
  })
  // find element by id
  // const element = document.getElementById('progressbar')

}
