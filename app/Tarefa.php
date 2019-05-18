<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    public function buscarTipo() {
        $tipoTarefa = TipoTarefa::findOrFail($this->id_tipo);
        return $tipoTarefa->descricao;
    }

    public function buscarUsuario() {
        $usuario = Usuario::findOrFail($this->id_usuario);
        return $usuario->nome;
    }

    public function marcarComoConcluida() {
        $this->data_conclusao = Carbon::now();
        $this->status = 1;

        $this->save();
    }

    public function dataConclusao() {
        return Carbon::parse($this->data_conclusao)->locale('pt_BR')->isoFormat('LLLL');
    }
}
