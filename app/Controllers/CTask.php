<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MTask;
use CodeIgniter\HTTP\ResponseInterface;

class CTask extends BaseController
{
    public function index(): string
    {
        
        $tasks = new MTask();
        $data['tasks'] = $tasks->getTasks();

        return view('lista_tareas/index', $data);
    }

    public function save(){
        $task = new Mtask();
        $datos = $this->request->getVar();
        
        if(!$task->save($datos)){
            return redirect()->route('AddTask')
                    ->with('msg',[
                    'icon' => 'ban',
                    'type' => 'danger',
                    'body' => 'Algo sucedio no se pudo guardar'
                ]);
        }else{
            return redirect()->route('AddTask')
                    ->with('msg',[
                    'icon' => 'check',
                    'type' => 'success',
                    'body' => 'Tarea Guardada con exito!'
                ]);
        }        


        
    }

    public function delete($id = null){
        $task = new Mtask();

        if($task->delete(['id_task'=>$id])){
            return redirect()->route('AddTask')
                ->with('msg',[
                'icon' => 'check',
                'type' => 'success',
                'body' => 'Eliminado con exito!'
            ]);
        }else{
            return redirect()->route('AddTask')
                    ->with('msg',[
                    'icon' => 'ban',
                    'type' => 'danger',
                    'body' => 'Algo sucedio no se pudo eliminar'
            ]);

        }           
    }

    public function edit($id = null){
        $task = new Mtask();
        $datos['task'] = $task->where('id_task',$id)->first();                
    

        //dd($datos);
        return view('lista_tareas/edit', $datos);  
    }

    public function update(){
        $task = new Mtask();
        
        $datos = $this->request->getVar();

        //dd($datos);
        if(!$task->update($datos['id_task'],$datos)){
            return redirect()->route('AddTask')
                    ->with('msg',[
                    'icon' => 'ban',
                    'type' => 'danger',
                    'body' => 'Algo sucedio no se pudo actualizar'
                ]);
        }else{
            return redirect()->route('AddTask')
                    ->with('msg',[
                    'icon' => 'check',
                    'type' => 'success',
                    'body' => 'Actualizado con exito!'
                ]);
        }
    }


}
