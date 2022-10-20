<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\Livro;

define('PRAZO_DEVOLUCAO',15);

class Emprestimo extends Model
{
    use HasFactory;

    public function contato() {
        return $this->belongsTo(Contato::class, 'id_contato', 'id');
    }
    public function livro() {
        return $this->belongsTo(Livro::class, 'id_livro', 'id');
    }
    public function getDevolvidoAttribute() {
        $prazodevolucao = \Carbon\Carbon::create($this->DataHora)->addDays(PRAZO_DEVOLUCAO);
        $atrasado = $prazodevolucao < \Carbon\Carbon::now()?" <span class='alert-danger'>Atrasado</span>":"";
        $devolvido = $this->datadevolucao == null?"Previsto: ".$prazodevolucao->format('d/m/Y').$atrasado:\Carbon\Carbon::create($this->datadevolucao)->format('d/m/Y H:i:s');
        return $devolvido;
    }
}
