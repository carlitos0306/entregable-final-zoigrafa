<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{
    /**
     * Index method con Buscador (Lupa)
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Productos->find();
        
        // Capturamos lo que el usuario escribe en la "lupa"
        $buscar = $this->request->getQuery('buscar');
        
        if ($buscar) {
            // Filtramos la base de datos por nombre o categoría
            $query->where(['OR' => [
                'Productos.nombre LIKE' => '%' . $buscar . '%',
                'Productos.categoria LIKE' => '%' . $buscar . '%',
            ]]);
        }

        $productos = $this->paginate($query);

        $this->set(compact('productos'));
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $producto = $this->Productos->get($id, contain: []);
        $this->set(compact('producto'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $producto = $this->Productos->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('El producto se guardó correctamente en Zoigrafa.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el producto. Intente de nuevo.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        $producto = $this->Productos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('El producto se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el producto.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);
        if ($this->Productos->delete($producto)) {
            $this->Flash->success(__('Producto eliminado del catálogo.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el producto.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}