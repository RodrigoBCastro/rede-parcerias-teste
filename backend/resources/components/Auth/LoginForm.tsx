import { useState } from 'react';
import { toast } from 'react-hot-toast';
import {useNavigate} from "react-router-dom";

export function LoginForm({setCreateAccount}:any) {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    // const handleSubmit = async (e: React.FormEvent) => {
    //     e.preventDefault();
    //     try {
    //       /*const token = await loginRequest(email, password);
    //       login(token.access_token);*/
    //       navigate('/dashboard');
    //     } catch (err) {
    //       toast.error('Login ou senhas Inválidas');
    //     }
    // };

    //const { login } = useAuth();
    const navigate = useNavigate();

    return (
        <form className="w-3/4 sm:w-1/2" >
            <div className='flex flex-col gap-2'>
                <img className='w-3/4 self-center mb-10' src='src/assets/logo.png'></img>
                <h2 className='font-bold text-2xl text-indigo-600 mb-2'>Login</h2>
                <label >Digite seu email:</label>
                <input name='email' className='border-2 rounded-s border-indigo-600 p-2' type="email" placeholder="E-mail" value={email} onChange={(e) => setEmail(e.target.value)} />
                <label >Digite sua senha:</label>
                <input name='password' className='border-2 rounded-s border-indigo-600 p-2 mb-2' type="password" placeholder="Senha" value={password} onChange={(e) => setPassword(e.target.value)} />
                <button className='rounded-s bg-indigo-600 p-2 font-medium text-indigo-50' type="submit">Entrar</button>
                <hr className='mt-2'></hr>
                <span>Primeiro Cadastro ? <a href='#' className='font-medium text-indigo-600' onClick={() => setCreateAccount(true)}>Clique Aqui</a></span>
            </div>
        </form>
    );
}
