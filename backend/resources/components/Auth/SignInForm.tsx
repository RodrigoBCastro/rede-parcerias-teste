import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-hot-toast';
// import { loginRequest } from '../../hooks/auth/services';
// import { useAuth } from '../../auth/AuthContext';
import logo from '../../assets/logo.png'

export function SignInForm({setCreateAccount}:any) {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const [userType, setUserType] = useState('');

    // const handleCreateUser = async (e: React.FormEvent) => {
    //     e.preventDefault();
    //     try {
    //         // const token = await loginRequest(email, password);
    //         // login(token.access_token);
    //         navigate('/dashboard');
    //     } catch (err) {
    //         toast.error('Login ou senhas Inválidas');
    //     }
    // };
    // const { login } = useAuth();
const navigate = useNavigate();

  return (
    <form className="w-3/4 sm:w-1/2" >
      <div className='flex flex-col gap-2'>
        <img className='w-3/4 self-center mb-10' src={logo}></img>
        <h2 className='font-bold text-2xl text-indigo-600 mb-2'>Primeiro Cadastro</h2>
        <label >Digite seu nome:</label>
        <input name='name' className='border-2 rounded-s border-indigo-600 p-2' type="text" placeholder="Nome" value={name} onChange={(e) => setEmail(e.target.value)} />
        <label >Digite seu email:</label>
        <input name='email' className='border-2 rounded-s border-indigo-600 p-2' type="email" placeholder="E-mail" value={email} onChange={(e) => setEmail(e.target.value)} />
        <label >Digite sua senha:</label>
        <input name='password' className='border-2 rounded-s border-indigo-600 p-2 mb-2' type="password" placeholder="Senha" value={password} onChange={(e) => setPassword(e.target.value)} />
        <label >Confirme sua senha:</label>
        <input name='password' className='border-2 rounded-s border-indigo-600 p-2 mb-2' type="password" placeholder="Confirme a Senha" value={confirmPassword} onChange={(e) => setPassword(e.target.value)} />
        <label>Tipo de Usuário:</label>
        <select name="type" className="border-2 rounded-s border-indigo-600 p-2 mb-2" value={userType} onChange={(e) => setUserType(e.target.value)}>
            <option value="">Selecione o tipo</option>
            <option value="admin">Administrador</option>
            <option value="editor">Operador</option>
            <option value="viewer">Visualizador</option>
        </select>
        <button className='rounded-s bg-indigo-600 p-2 font-medium text-indigo-50' type="submit">Criar Usuário</button>
        <hr className='mt-2'></hr>
        <span>Já possui login ? <a href='#' className='font-medium text-indigo-600' onClick={() => setCreateAccount(false)}>Clique Aqui</a></span>
      </div>
    </form>
  );
}
