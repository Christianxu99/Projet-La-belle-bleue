import React from "react";
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import { HomePage } from './pages/HomePage';
import { BlogPage } from './pages/BlogPage';
import { LoginPage } from './pages/LoginPage';
import { ProfilPage } from './pages/ProfilPage';
import { RegisterPage } from './pages/RegisterPage';  

const App = () => {
  return (
    <Router>
        <Switch>
          <Route exact path="/">
            <HomePage />
          </Route>
          <Route path="/blog">
            <BlogPage />
          </Route>
          <Route path="/connexion">
            <LoginPage />
          </Route>
          <Route path="/profil">
            <ProfilPage />
          </Route>
          <Route path="/register">
            <RegisterPage />
          </Route>
        </Switch>
    </Router>
  );
}


ReactDOM.render(<App/>, document.getElementById('root'));