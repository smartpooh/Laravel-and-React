import React, { useContext } from "react";
import { AppContext } from "../contexts/AppContext";
import AuthMenu from "./AuthMenu";
import TodoSVG from "../svg/Todo";

const AuthNotLoggedIn = () => {
  const appContext = useContext(AppContext);
  const {
    userEmail,
    userPassword,
    handleUserEmail,
    handleUserPassword,
    login,
  } = appContext;
  return (
    <div className="md:flex w-full rounded justify-center">
      <div className="md:w-1/4 bg-white px-12 rounded-t-lg md:rounded-l-lg  md:rounded-r-none">
        <TodoSVG className="login" />
      </div>
      <div className="md:w-3/4 bg-blue-500 py-48 rounded-b-lg md:rounded-r-lg  md:rounded-l-none">
        <AuthMenu loggedIn={false} />
      </div>
    </div>
  );
};

export default AuthNotLoggedIn;
