<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc_documento extends Model
{
    protected $fillable = [
    'doc_nombre',
    'doc_codigo',
    'doc_contenido'];

    use HasFactory;

  
    public function proceso()
    {
        return $this->hasOne('App\Models\Proceso', 'id', 'proceso_id');
    }
    
    public function tip_tipo_doc()
    {
        return $this->hasOne('App\Models\Tip_tipo_doc', 'id', 'tip_tipo_doc_id');
    }
    

}
