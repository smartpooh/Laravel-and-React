import React, { useContext } from "react";
import { AppContext } from "../contexts/AppContext";
import AuthMenu from "./AuthMenu";
import AppMenu from "./AppMenu";
import ListDisplay from "./ListDisplay";

const AuthLogout = () => {
  const appContext = useContext(AppContext);
  const { userName, logout } = appContext;
  return (
    <div className="flex w-full rounded">
      <AppMenu />
      <div className="w-full bg-blue-500 py-24 px-12 rounded-r-lg">
        <ListDisplay loggedIn={true} />
        <AuthMenu loggedIn={true} />
      </div>
    </div>
  );
};

export default AuthLogout;
