import ReactDOM from "react-dom";
import React, { Component } from "react";
import styled from "@emotion/styled";

function array_move(arr, old_index, new_index) {
  if (new_index >= arr.length) {
    var k = new_index - arr.length + 1;
    while (k--) {
      arr.push(undefined);
    }
  }
  arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
  return arr; // for testing
}

const Container = styled.div`
  padding: 0 24px;
`;

const OrderedList = styled.ol`
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  counter-reset: items;
  li {
    counter-increment: items;
    &::before {
      content: counter(items);
      margin: 0 16px;
      font-size: 1.3rem;
    }
  }
`;

const Button = styled.button`
  appearance: none;
  border: none;
  background-color: #fff;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  transition: all 0.25s;
  cursor: pointer;
  &:hover {
    background: #ddd;
  }
`;

const SaveButtonContainer = styled.div`
  display: flex;
  justify-content: flex-end;
  padding: 24px;
  border-top: 2px solid #ddd;
`;

const ListItemStyled = styled.li`
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  input {
    padding: 8px;
    display: block;
    flex: 1;
    margin: 0 8px;
  }
`;

class ListItem extends Component {
  state = {
    value: null
  };

    render() {
    return (
      <ListItemStyled>
        <input
          type="text"
          name="news_item[]"
          value={this.state.value || this.props.text}
          onChange={this.valueChanged}
        />

        <Button
          type="button"
          onClick={() => this.props.moveUp(this.props.index)}
          disabled={this.props.index === 0}
        >
          <span className="dashicons dashicons-arrow-up-alt2" />
        </Button>

        <Button
          type="button"
          onClick={() => this.props.moveDown(this.props.index)}
          disabled={this.props.index === this.props.total - 1}
        >
          <span className="dashicons dashicons-arrow-down-alt2" />
        </Button>

        <Button
          type={"button"}
          onClick={() => this.props.removeItem(this.props.index)}
        >
          <span className="dashicons dashicons-trash" />
        </Button>
      </ListItemStyled>
    );
  }

  valueChanged = e => {
    const value = e.target.value;
    this.setState({ value });
  };
}

class NewsList extends Component {
  state = {
    items: [],
    newValue: ""
  };

    componentWillMount() {
        if(this.props.items && this.props.items.length) {
            this.setState({ items: this.props.items})
        }
    }

  render() {
    return (
      <Container>
        <form
          method="post"
          action={this.props.url}
          className="newsbar-settings-form"
        >
          <input type="hidden" name="action" value="set_newsbar_settings" />

          <OrderedList>
            {this.state.items.map((item, i) => (
              <ListItem
                key={i}
                index={i}
                text={item}
                removeItem={this.removeItem}
                total={this.state.items.length}
                moveUp={this.moveUp}
                moveDown={this.moveDown}
              />
            ))}
          </OrderedList>

          {this.state.items.length ? (
            <>
              <SaveButtonContainer>
                {" "}
                <button
                  className="button button-primary button-large"
                  type="submit"
                >
                  حفظ
                </button>
              </SaveButtonContainer>
              <hr />
            </>
          ) : null}
        </form>

        <h3>أضف خبر للشريط</h3>
        <ListItemStyled>
          <label>نص الخبر</label>
          <input
            type="text"
            name="news-item[]"
            value={this.state.newValue}
            onChange={this.handleChange}
            onKeyDown={this.newValueKeyDown}
          />
          <Button type={"button"} onClick={this.addItem}>
            <span className="dashicons dashicons-plus-alt" />
          </Button>
        </ListItemStyled>
      </Container>
    );
  }

  handleChange = e => {
    this.setState({ newValue: e.target.value });
  };

  newValueKeyDown = e => {
    if (e.key === "Enter") {
      e.preventDefault();
      this.addItem();
    }
  };

  addItem = () => {
    const items = [...this.state.items];
    items.push(this.state.newValue);
    this.setState({ items, newValue: "" });
  };

  removeItem = index => {
    const items = [...this.state.items];
    items.splice(index);
    this.setState({ items });
  };

  moveUp = index => {
    const items = array_move([...this.state.items], index, index - 1);
    this.setState({ items });
  };

  moveDown = index => {
    const items = array_move([...this.state.items], index, index + 1);
    this.setState({ items });
  };
}

const newsbarElem = document.querySelector(".newsbar-app");
const json = newsbarElem.dataset.json ? JSON.parse(newsbarElem.dataset.json) : {};
ReactDOM.render(<NewsList {...json} />, newsbarElem);