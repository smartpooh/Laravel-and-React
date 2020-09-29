import React, {useContext} from "react";
import {AppContext} from "../contexts/AppContext";
import TodoList from "./TodoList";
import {LOGGED_IN} from "../constants/AuthStatus";
import apiClient from "../apiClient";

const AppMenu = (props) => {
    const appContext = useContext(AppContext);
    const {authStatus, changeAuthStatusLogin, changeAuthStatusSignup, userName, logout, handleListSelect, selectedList} = appContext;
    const [lists, setLists] = React.useState([]);

    React.useEffect(() => {

        if (authStatus === LOGGED_IN) {
            apiClient.get('/api/lists')
                .then(response => {
                    setLists(response.data)
                })
                .catch(error => console.error(error));
        }
    }, [authStatus]);

    return (
        <div className="min-h-screen flex bg-transparent">
            <div className="flex w-full max-w-xs p-4 bg-white rounded-l-lg">
                <ul className="flex flex-col w-full">
                    <li className="my-px flex items-center justify-center pb-8">
                        <span className="ml-3">Projects</span>
                        <span
                            className="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">{lists.length}</span>
                    </li>

                    {lists.map((value, index) => {

                        value.tags = typeof value.tags === 'undefined' ? [] : value.tags;

                        return <TodoList key={value.id}
                                         id={value.id}
                                         name={value.name}
                                         detail={value.detail}
                                         tags={value.tags}
                                         created_at={value.created_at}
                                         updated_at={value.updated_at}></TodoList>
                    })}
                </ul>
            </div>
        </div>
    );
};

export default AppMenu;
