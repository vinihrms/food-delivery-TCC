<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table            = 'categorias';
    protected $returnType       = 'App\Entities\Categoria';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nome', 'ativo', 'slug'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation

    // Callbacks
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|alpha_numeric_space|min_length[4]|is_unique[categorias.nome]',

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
            'is_unique' => 'Essa categoria já está cadastrada.'
        ],
        
    ];

    //eventos callback
    protected $beforeInsert = ['criaSlug'];
    protected $beforeUpdate = ['criaSlug'];

    protected function criaSlug(array $data) {

        if(isset($data['data']['nome'])){
            $data['data']['slug'] = mb_url_title($data['data']['nome'], '-', true);
            
        }
        return $data;
    }

    public function procurar($term) {
        if($term === null){
            return [];
        };

        return $this->select('id, nome')
                ->like('nome', $term)
                ->withDeleted(true)
                ->get()
                ->getResult();
    }

}
