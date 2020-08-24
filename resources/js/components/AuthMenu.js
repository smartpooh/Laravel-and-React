import React, { useContext } from "react";
import { AppContext } from "../contexts/AppContext";
import ItemDisplay from "./ItemDisplay";

const AuthMenu = (props) => {
  const appContext = useContext(AppContext);
  const { changeAuthStatusLogin, changeAuthStatusSignup } = appContext;
  return (
    <div className="">
      <div className="font-inter_extrabold text-4xl text-white text-center">
        Todo List
      </div>
      {props.loggedIn ? (<ItemDisplay selectedList={props.selectedList} />) : (
        <div className="flex flex-col md:flex-row items-center md:justify-center w-full font-inter_bold">
          <button
            className="hover:bg-white text-white hover:text-blue-500 text-center rounded py-2 mx-2 mb-4 w-32 border border-white"
            onClick={() => changeAuthStatusSignup()}
          >
            Signup
          </button>
          <button
            className="hover:bg-white text-white hover:text-blue-500 text-center rounded py-2 mx-2 mb-4 w-32 border border-white"
            onClick={() => changeAuthStatusLogin()}
          >
            Login
          </button>
        </div>
      )}
    </div>
  );
};

export default AuthMenu;
