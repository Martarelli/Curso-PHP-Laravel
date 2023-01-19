<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $todos = Todo::where('user_id', $user->id)->get();
        $todos_ative = Todo::where('is_complete', '=' , 'false')->get();

        return view('dashboard', compact('user', 'todos', 'todos_ative'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            Todo::create([
                'title' => $request -> title,
                'color' => $request -> color,
                'user_id' => $user->id
            ]);

        } catch (\Throwable $th) {
            logger()->error($th);
            return redirect('/todos/create')->with('error', 'Erro ao criar TODO');
        }

        return redirect('/dashboard')->with('success', 'TODO criado com sucesso');
    }

    /**
     * Complete the specified resource in storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function complete(Todo $todo)
    {
        try {
            $user = auth()->user();

            // Verificar se TODO é do usuário
            if ($todo->user_id !== $user->id) {
                return response('', 403);
            }

            $todo->update(['is_complete' => true]);
        } catch (\Throwable $th) {
            logger()->error($th);
            return redirect('/dashboard')->with('error', 'Erro ao completar TODO');
        }

        return redirect('/dashboard')->with('success', 'TODO completado com sucesso');
    }

    public function edit(Todo $todo)
    {
        try {
            $user = auth()->user();

            if ($todo->user_id !== $user->id) {
                return response('', 404);
            }

            return view('edit', compact('todo'));

        } catch (\Throwable $th) {
            logger()->error($th);
            return redirect('/dashboard')->with('error', 'Erro ao completar TODO');
        }
    }

    public function update(Todo $todo, Request $request)
    {
        try {
            $user = auth()->user();

            if ($todo->user_id !== $user->id) {
                return response('', 403);
            }

            $todo -> update([
                'color' => $request -> color,
                'title' => $request -> title
            ]);
            return redirect('/dashboard')->with('success', 'TODO editado com sucesso');
        } catch (\Throwable $th) {
            logger()->error($th);
            return redirect('/dashboard')->with('error', 'Erro ao editar TODO');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try {
            // Verificar se TODO é do usuário
            $user = auth()->user();

            if ($todo->user_id !== $user->id) {
                return response('', 403);
            }

            logger()->info($todo);
            $todo = Todo::find($todo->id);
            $todo->delete();
        } catch (\Throwable $th) {
            logger()->error($th);
            return redirect('/dashboard')->with('error', 'Erro ao deletar TODO');
        }

        return redirect('/dashboard')->with('success', 'TODO deletado com sucesso');
    }
}
