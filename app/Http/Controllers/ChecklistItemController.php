<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    // Método para obtener todos los elementos de la lista de verificación para la fecha actual
    public function index(Request $request)
    {
        // Obtiene la fecha seleccionada de la solicitud
        $selectedDate = $request->input('date', now()->format('Y-m-d'));
    
        // Busca los elementos de la lista de verificación para la fecha seleccionada
        $checklistItems = ChecklistItem::whereDate('fecha', $selectedDate)->get();
    
        // Verifica si no hay elementos para la fecha seleccionada
        if ($checklistItems->isEmpty()) {
            return view('check_list')->with('listaItems', collect())->with('message', 'No hay elementos en la lista de verificación para la fecha seleccionada.');
        }
    
        // Retorna la vista con los elementos de la lista de verificación
        return view('check_list')->with('listaItems', $checklistItems);
    }
    
    

    // Método para crear un nuevo elemento de la lista de verificación
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $newItem = ChecklistItem::create([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'fecha' => now()->toDateString(),
        ]);
        

        return redirect()->route('checklist.index');
    }
    

    // Método para actualizar un elemento existente de la lista de verificación
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $item=ChecklistItem::find($id);

        if(!$item){
            return response()->json(['error'=>'No se ha encontrado el item'],500);
        }
        
        $item->update([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
        ]);

        return redirect()->route('checklist.index')->with('success', 'Item updated successfully');
    }

    // Método para eliminar un elemento de la lista de verificación
    public function destroy($id)
    {
        $item= ChecklistItem::find($id);

        if(!$item){
            return response()->json(['error'=>'No se ha encontrado el item'],500);
        }

        $item->delete();
        return redirect()->route('checklist.index');
    }

    //Metodo para actualizar el estado del ítem
    public function updateState(Request $request, $itemId)
    {

        $validatedData =$request->validate([
            'state'=>'required|integer'
        ]);

        $item = ChecklistItem::find($itemId);
        
        if(!$item){
            return response()->json(['error'=>'No se ha encontrado el item'],500);
        }

        $item->state=$validatedData['state'];
        $item->save();
        
        return response()->json(['message' => 'State updated successfully']);
    }
    
    
    

    }


