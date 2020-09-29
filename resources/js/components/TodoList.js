import React, {useContext} from 'react';
import ReactDOM from 'react-dom';
import apiClient from "../apiClient";
import {AppContext} from "../contexts/AppContext";

const TodoList = (props) => {

    const appContext = useContext(AppContext);
    const {
        handleListSelect,
        selectedList
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
        <li className="my-px">
            <a href="#"
               onClick={(e) => {
                   e.preventDefault();
                   handleListSelect(props);
               }}
               className={`flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 ${selectedList.id === props.id ? 'font-bold bg-gray-100' : ''}`}>
						<span className="flex items-center justify-center text-lg text-gray-400">
							<svg fill="none"
                                 strokeLinecap="round"
                                 strokeLinejoin="round"
                                 strokeWidth="2"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 className="h-6 w-6">
								<path
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
							</svg>
						</span>
                <span className="ml-3">{props.name}</span>
            </a>
        </li>
    );
}

export default TodoList;
