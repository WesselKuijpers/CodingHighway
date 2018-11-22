import React, {Component} from 'react'

class StartExamQuestion extends Component {
  constructor() {
    super()
    this.state = {
      question: {},
      answers: [],
      load: false,
      handler: function () {},
    }

    // this.handleChange = this.handleChange.bind(this);
  }

  componentDidMount() {
    const shuffle = require('shuffle-array');

    this.setState({
      question: this.props.question,
      answers: shuffle(this.props.question.answers, {'copy': true}),
      load: true,
      handler: this.props.clicklistener
    });
  }

  render() {
    if (!this.state.load) {
      return <div>loading</div>
    } else {
      if (this.state.question.content != '') {
        return (
          <div>
            <div className="card">
              <div className="card-header">
                {this.state.question.content}
              </div>
              <ul className="list-group list-group-flush">
                <li className="list-group-item">
                  <a href="#" onClick={this.state.handler}
                     data-id={this.state.answers[0].id}
                     data-question={this.state.question.id}
                     className="btn btn-primary btn-organisation"
                  >
                    {this.state.answers[0].content}
                  </a>
                </li>
                <li className="list-group-item">
                  <a href="#" onClick={this.state.handler}
                     data-id={this.state.answers[1].id}
                     data-question={this.state.question.id}
                     className="btn btn-primary btn-organisation"
                  >
                    {this.state.answers[1].content}
                  </a>
                </li>
                <li className="list-group-item">
                  <a href="#" onClick={this.state.handler}
                     data-id={this.state.answers[2].id}
                     data-question={this.state.question.id}
                     className="btn btn-primary btn-organisation"
                  >
                    {this.state.answers[2].content}
                  </a>
                </li>
                <li className="list-group-item">
                  <a href="#" onClick={this.state.handler}
                     data-id={this.state.answers[3].id}
                     data-question={this.state.question.id}
                     className="btn btn-primary btn-organisation"
                  >
                    {this.state.answers[3].content}
                  </a>
                </li>
              </ul>
            </div>
            <br/><br/>
          </div>

        )
      }
    }
  }
}

export default StartExamQuestion
