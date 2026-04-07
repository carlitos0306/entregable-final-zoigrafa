<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        // Permitimos 'login' y 'add' para que se puedan registrar o iniciar sesión
        $this->Authentication->allowUnauthenticated(['login', 'add']);
    }

    /**
     * Index method
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']); 
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method - CORREGIDO Y BLINDADO
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        
        // 1. Intento con el sistema nativo de CakePHP
        if ($result && $result->isValid()) {
            $this->Flash->success(__('Login successful. Bienvenido a Zoigrafa.'));
            $redirect = $this->Authentication->getLoginRedirect();
            if ($redirect) {
                return $this->redirect($redirect);
            }
            return $this->redirect(['controller' => 'Productos', 'action' => 'index']);
        }

        // 2. Verificación Manual Segura (Esto arregla el problema del correo)
        if ($this->request->is('post')) {
            $correo = (string)$this->request->getData('correo');
            $password = (string)$this->request->getData('password');
            
            // Buscamos al usuario en la base de datos por su correo
            $user = $this->Users->find()->where(['correo' => $correo])->first();
            
            // Comprobamos si el usuario existe Y si la contraseña coincide con el hash
            if ($user && password_verify($password, $user->password)) {
                
                // Autenticamos forzosamente al usuario
                $this->Authentication->setIdentity($user);
                $this->Flash->success(__('Bienvenido a Zoigrafa'));
                
                return $this->redirect(['controller' => 'Productos', 'action' => 'index']);
            } else {
                // Si la clave o el correo fallan, mostramos el error de seguridad
                $this->Flash->error(__('Correo o contraseña incorrectos. Acceso denegado.'));
            }
        }
    }

    /**
     * Logout method
     */
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['action' => 'login']);
        }
    }
}