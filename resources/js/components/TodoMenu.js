import React, {useContext} from "react";
import {AppContext} from "../contexts/AppContext";

const TodoMenu = (props) => {
  const appContext = useContext(AppContext);
  const {changeAuthStatusLogin, changeAuthStatusSignup, userName, logout} = appContext;
  return (
    <nav className="flex items-center justify-between flex-wrap bg-teal-500 p-6 rounded">
      <div className="flex items-center flex-shrink-0 text-white mr-6">
        <svg className="logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
             width="100" height="100" viewBox="0 0 54 54">
          <g>
            <path d="M16.981,0H2.137C1.731,0,1.401,0.33,1.401,0.736v17.646c0,0.408,0.33,0.736,0.736,0.736h14.843
                c0.406,0,0.736-0.328,0.736-0.736V0.736C17.717,0.329,17.386,0,16.981,0z M16.245,17.646H2.873V1.473h13.371V17.646z"/>
            <path d="M7.64,4.668H4.946v2.693h2.693V4.668H7.64z M7.312,5.562L6.116,6.758
                c-0.031,0.032-0.084,0.032-0.115,0L5.272,6.026c-0.031-0.032-0.031-0.084,0-0.117l0.175-0.172c0.031-0.033,0.083-0.033,0.116,0
                L6.06,6.236l0.963-0.963c0.033-0.032,0.084-0.032,0.117,0l0.173,0.174C7.345,5.478,7.345,5.53,7.312,5.562z"/>
            <rect x="8.202" y="5.274" width="6.161" height="1.481"/>
            <path d="M7.64,8.18H4.946v2.692h2.693V8.18H7.64z M7.312,9.073l-1.196,1.196
                c-0.031,0.032-0.084,0.032-0.115,0L5.272,9.537c-0.031-0.032-0.031-0.084,0-0.116l0.175-0.173c0.031-0.032,0.083-0.032,0.116,0
                L6.06,9.747l0.963-0.963c0.033-0.032,0.084-0.032,0.117,0l0.173,0.173C7.345,8.989,7.345,9.041,7.312,9.073z"/>
            <rect x="8.202" y="8.785" width="6.161" height="1.481"/>
            <rect x="4.947" y="11.769" width="2.693" height="2.693"/>
            <rect x="8.202" y="12.376" width="6.161" height="1.48"/>
          </g>
        </svg>
        <span className="font-semibold text-xl tracking-tight">Todo List</span>
      </div>
      <div className="block lg:hidden">
        <button
          className="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <svg className="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
          </svg>
        </button>
      </div>
      <div className="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div className="text-sm lg:flex-grow">
          <a href="#responsive-header"
             className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Docs
          </a>
          <a href="#responsive-header"
             className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Examples
          </a>
          <a href="#responsive-header" className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
            Blog
          </a>
        </div>
        <div>
          <div>
            <span className="font-inter_thin text-xs text-white-500 mb-32">
              Logged in as {userName}
            </span>
          </div>
          <a href="#"
             onClick={() => logout()}
             className="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Logout</a>
        </div>
      </div>
    </nav>
  );
};

export default TodoMenu;
