<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Procedure;
use App\Models\UserType;
use App\Models\Operation;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // Retorna todas as notices com as notifications relacionadas
    public function index()
    {
        return response()->json(['data' => Notice::all()]);
    }

    // Armazena uma nova notice
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'operation_id' => 'required|integer|exists:operations,id',
            'title' => 'required|string',
            'user_type_id' => 'required|integer|exists:user_types,id',
            'procedure_id' => 'required|integer|exists:procedures,id',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'popup' => 'nullable|boolean',
            'deadline' => 'nullable|date',
        ]);

        if (!UserType::find($request->user_type_id)) {
            return response()->json(['error' => 'Tipo de usuário inválido'], 400);
        }

        if (!Procedure::find($request->procedure_id)) {
            return response()->json(['error' => 'Procedimento inválido'], 400);
        }

        if (!Operation::find($request->operation_id)) {
            return response()->json(['error' => 'Operação inválida'], 400);
        }

        // Gera dinamicamente o campo 'author'
        $validatedData['author'] = 'Criado em ' . now()->format('d/m/Y H:i');

        $validatedData['publish'] = $validatedData['publish'] ?? 'Sim'; // Garantir valor padrão

        // Salva no banco de dados
        $notice = Notice::create($validatedData);

        return response()->json(['message' => 'Comunicação criada com sucesso!', 'data' => $notice]);
    }




    // Retorna uma notice específica com suas notifications
    public function show($id)
    {
        $notice = Notice::with('notifications')->find($id);

        if ($notice) {
            return response()->json($notice);
        }

        return response()->json(['error' => 'Not Found'], 404);
    }



    // Alterar Status do Comunicado
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $notice = Notice::findOrFail($id);

        // Atualiza o status
        $notice->status = $validated['status'];

        // Define a data de inativação se o status for inativo
        if ($validated['status'] === 'inactive') {
            $notice->inactive_date = now(); // Timestamp atual
        } else {
            $notice->inactive_date = null; // Limpa o timestamp ao reativar
        }

        $notice->save();

        return response()->json([
            'message' => 'Status atualizado com sucesso!',
            'data' => [
                'id' => $notice->id,
                'status' => $notice->status,
                'inactive_date' => $notice->inactive_date,
            ],
        ]);
    }


    // Reutilizar comunicado
    public function duplicate($id)
    {
        $notice = Notice::findOrFail($id);

        $newNotice = $notice->replicate();
        $newNotice->title = $notice->title . ' (Cópia)';
        $newNotice->created_at = now(); // Define a data de criação
        $newNotice->save();

        return response()->json([
            'message' => 'Comunicado duplicado com sucesso!',
            'data' => $newNotice, // Retorna o novo comunicado
        ]);
    }


    // Upload de anexos (não implementado)
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('attachments');

        return response()->json(['message' => 'Arquivo enviado com sucesso!', 'path' => $filePath]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'operation_id' => 'required|integer|exists:operations,id',
            'user_type_id' => 'required|integer|exists:user_types,id',
            'procedure_id' => 'required|integer|exists:procedures,id',
            'popup' => 'nullable|boolean',
        ]);

        $notice = Notice::findOrFail($id);
        $notice->update($validatedData);

        return response()->json([
            'message' => 'Comunicado atualizado com sucesso!',
            'data' => $notice,
        ]);
    }


}

