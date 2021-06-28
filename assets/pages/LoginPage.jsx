import React, { useState } from 'react';
import axios from 'axios';
import Cookies from 'universal-cookie';
import { useHistory } from 'react-router-dom'

export const LoginPage = () => {
    const [inputEmail, setInputEmail] = useState('');
    const [password, setPassword] = useState('');
    const history = useHistory();
    const connect = () => {
        axios.post('/loginreact/api/connect', {
            email: inputEmail,
            password: password
        })
        .then(res => {
            const user = res?.data?.user;
            if (user) {
                const cookies = new Cookies();
                cookies.set('userId', user.id, { path: '/' });
                if (user.error) {
                    return alert(user.message);
                }
                return history.push('/');
            }
        }).catch(error => {
            console.log(error.response.data);
        })
    }
    return (
        <div>
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>

            <label for="inputEmail">Email</label>
            <input
                type="email"
                value={inputEmail}
                onChange={(e) => setInputEmail(e.target.value)}
                name="email"
                id="inputEmail"
                className="form-control"
                autocomplete="email"
                required
                autoFocus
            />

            <label for="inputPassword">Password</label>
            <input
                type="password"
                name="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                id="inputPassword"
                className="form-control"
                autocomplete="current-password"
                required
            />

            {/* <input type="hidden" name="_csrf_token"
                value="{{ csrf_token('authenticate') }}"
                /> */}

            <button
                onClick={connect}
                className="btn btn-lg btn-primary"
                type="submit"
            >
                SE CONNECTER
            </button>
        </div>

    )
}