import React, {useContext} from 'react';
import ReactDOM from 'react-dom';
import apiClient from "../apiClient";
import {AppContext} from "../contexts/AppContext";

const TodoList = (props) => {

    const appContext = useContext(AppContext);
    const {
        handleListSelect
    } = appContext;

    const [itemTags, setTags] = React.useState([]);

    React.useEffect(() => {
        let tags = props.tags.map((tag) =>
            <span key={tag.id}
                  className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{tag.title}</span>
        );
        setTags(tags);
    }, []);

    return (
        <div className="list-item bg-white my-2">
            <a href="#" onClick={(e) => {
                e.preventDefault();
                handleListSelect(props);
            }}>
                <div className="rounded overflow-hidden shadow-lg">
                    <div className="px-6 py-4">
                        <div className="font-bold text-xl mb-2">{props.name}</div>
                        <p className="text-gray-700 text-base">
                            {props.detail}
                        </p>
                    </div>
                    <div className="px-6 py-4">
                        {itemTags}
                    </div>
                </div>
            </a>
        </div>
    );
}

export default TodoList;
