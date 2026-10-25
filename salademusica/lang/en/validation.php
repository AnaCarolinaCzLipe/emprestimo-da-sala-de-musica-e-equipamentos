<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo de :attribute precisa ser aceito.',
    'accepted_if' => 'O campo de :attribute precisa ser aceito se :other é :value.',
    'active_url' => 'O campo de :attribute precisa ser uma URL válida',
    'after' => 'O campo de :attribute precisa ser uma data depois de :date.',
    'after_or_equal' => 'O campo de :attribute precisa ser uma data depois ou igual à data :date.',
    'alpha' => 'O campo de :attribute precisa ter somente letras.',
    'alpha_dash' => 'O campo de :attribute precisa conter apenas letras, números, travessões, e sublinhamentos.',
    'alpha_num' => 'O campo de :attribute precisa conter apenas letras e números.',
    'array' => 'O campo de :attribute precisa ser um array',
    'ascii' => 'O campo de :attribute precisa conter um único byte alfanumérica atributo e símbolos.',
    'before' => 'O campo de :attribute precisa ser uma data antes de :date.',
    'before_or_equal' => 'O campo de :attribute precisa ser uma data antes ou igual à :date.',
    'between' => [
        'array' => 'O campo de :attribute precisa ter entre :min e :max itens.',
        'file' => 'O campo de :attribute precisa ter entre :min e :max KB.',
        'numeric' => 'O campo de :attribute precisa ter entre :min e :max.',
        'string' => 'O campo de :attribute precisa ter entre :min e :max caractéres.',
    ],
    'boolean' => 'O campo de :attribute precisa ser verdadeiro ou falso.',
    'can' => 'O campo de :attribute tem um valor não autorizado.',
    'confirmed' => 'O campo de SENHA não corresponde.',
    'current_password' => 'Senha está incorreta.',
    'date' => 'O campo de :attribute precisa ser uma data válida.',
    'date_equals' => 'O campo de :attribute precisa ser uma data igual à :date.',
    'date_format' => 'O campo de :attribute precisa corresponder à :format.',
    'decimal' => 'O campo de :attribute precisa ter :decimal casas decimais.',
    'declined' => 'O campo de :attribute precisa ser rejeitado.',
    'declined_if' => 'O campo de :attribute precisa ser rejeitado quando :other for :value.',
    'different' => 'O campo de :attribute e :other precisam ser diferentes.',
    'digits' => 'O campo de :attribute precisa ser :digits dígitos.',
    'digits_between' => 'O campo de :attribute precisa ser entre :min e :max dígitos.',
    'dimensions' => 'O campo de :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo de :attribute tem um valor duplicado.',
    'doesnt_end_with' => 'O campo de :attribute não pode terminar com os seguintes valores: :values.',
    'doesnt_start_with' => 'O campo de :attribute não pode terminar com os seguintes valores: :values.',
    'email' => 'O campo de :attribute precisa ser uma email válido.',
    'ends_with' => 'O campo de :attribute precisa terminar com os seguintes valores: :values.',
    'enum' => 'O campo selecionado :attribute é inválido.',
    'exists' => 'O campo selecionado :attribute é inválido.',
    'extensions' => 'O campo de :attribute precisa conter uma das seguintes extensões: :values.',
    'file' => 'O campo de :attribute precisa ser um arquivo.',
    'filled' => 'O campo de :attribute precisa ter um valor.',
    'gt' => [
        'array' => 'O campo de :attribute precisa ter mais do que :value itens no array.',
        'file' => 'O campo de :attribute precisa ser maior do que :value KB.',
        'numeric' => 'O campo de :attribute precisa ser maior do que :value.',
        'string' => 'O campo de :attribute precisa ser maior do que :value caractéres.',
    ],
    'gte' => [
        'array' => 'O campo de :attribute precisa ter :value itens ou mais.',
        'file' => 'O campo de :attribute precisa ser maior ou igual à :value KB.',
        'numeric' => 'O campo de :attribute maior ou igual à :value.',
        'string' => 'O campo de :attribute precisa ser maior ou igual à :value caractéres.',
    ],
    'hex_color' => 'O campo de :attribute precisa ser uma cor válida.',
    'image' => 'O campo de :attribute precisa ser uma imagem.',
    'in' => 'O campo selecionado de :attribute é inválido.',
    'in_array' => 'O campo de :attribute precisa existir em :other.',
    'integer' => 'O campo de :attribute precisa ser um integer.',
    'ip' => 'O campo de :attribute precisa ter um endereço de IP inválido.',
    'ipv4' => 'O campo de :attribute precisa ter um endereço de IPV4 inválido',
    'ipv6' => 'O campo de :attribute precisa ter um endereço de IPV6 inválido',
    'json' => 'O campo de :attribute precisa ter uma string JSON válida.',
    'list' => 'O campo de :attribute precisa ser uma lista.',
    'lowercase' => 'O campo de :attribute precisa ser em minúsculo.',
    'lt' => [
        'array' => 'O campo de :attribute precisa ser menor do que :value itens.',
        'file' => 'O campo de :attribute precisa ser menor do que :value KB.',
        'numeric' => 'O campo de :attribute precisa ser menor do que :value.',
        'string' => 'O campo de :attribute precisa ser menor do que :value caractéres.',
    ],
    'lte' => [
        'array' => 'O campo de :attribute não pode ter mais do que :value itens.',
        'file' => 'O campo de :attribute precisa ter menos do que ou igual à :value KB.',
        'numeric' => 'O campo de :attribute precisa ter menos do que ou igual à :value.',
        'string' => 'O campo de :attribute precisa ter menos do que ou igual à :value caractéres.',
    ],
    'mac_address' => 'O campo de :attribute precisa ter um endereço MAC válido.',
    'max' => [
        'array' => 'O campo de :attribute não pode ter mais do que :max itens.',
        'file' => 'O campo de :attribute não pode ter mais do que :max KB.',
        'numeric' => 'O campo de :attribute não pode ser maior do que :max.',
        'string' => 'O campo de :attribute não pode ser maior do que :max caractéres.',
    ],
    'max_digits' => 'O campo de :attribute não pode ser maior do que :max dígitos.',
    'mimes' => 'O campo de :attribute tem que ser um arquivo do tipo: :values.',
    'mimetypes' => 'O campo de :attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'array' => 'O campo de :attribute precisa ter no mínimo :min itens.',
        'file' => 'O campo de :attribute precisa ter no mínimo :min KB.',
        'numeric' => 'O campo de :attribute precisa ter no mínimo :min.',
        'string' => 'O campo de :attribute precisa ter no mínimo :min caractéres.',
    ],
    'min_digits' => 'O campo de :attribute precisa ter no mínimo :min dígitos.',
    'missing' => 'O campo de :attribute precisa estar vazio.',
    'missing_if' => 'O campo de :attribute precisa estar vazio quando :other for :value.',
    'missing_unless' => 'O campo de :attribute precisa estar vazio se :other for :value.',
    'missing_with' => 'O campo de :attribute precisa estar vazio quando :values estiver presente.',
    'missing_with_all' => 'O campo de :attribute precisa estar vazio quando :values está presente.',
    'multiple_of' => 'O campo de :attribute precisa ser múltiplo de :value.',
    'not_in' => 'O campo selecionado :attribute é inválido.',
    'not_regex' => 'O campo de :attribute é um formato inválido.',
    'numeric' => 'O campo de :attribute precisa ser em números.',
    'password' => [
        'letters' => 'O campo de senha precisa conter pelo menos uma letra.',
        'mixed' => 'O campo de senha precisa ter pelo menos uma letra minúscula e uma letra maiúscula.',
        'numbers' => 'O campo de senha precisa ter pelo menos um número.',
        'symbols' => 'O campo de senha precisa ter pelo menos um símbolo.',
        'uncompromised' => 'O campo fornecido de senha já está sendo usado. Por favor, tente escolher novamente um valor para o campo :attribute.',
    ],
    'present' => 'O campo de :attribute precisa estar presente.',
    'present_if' => 'O campo de :attribute precisa estar presente quando :other for :value.',
    'present_unless' => 'O campo de :attribute precisa estar presente a menos que :other for :value.',
    'present_with' => 'O campo de :attribute precisa estar presente quando :values estiver presente.',
    'present_with_all' => 'O campo de :attribute precisa estar presente quando :values estiverem presentes.',
    'prohibited' => 'O campo de :attribute está proibido.',
    'prohibited_if' => 'O campo de :attribute está proibido quando :other for :value.',
    'prohibited_unless' => 'O campo de :attribute está proibido quando :other estiver em :values.',
    'prohibits' => 'Os campos de :attribute estão proibidos quando :other estiverem presentes.',
    'regex' => 'O campo de :attribute é um formato inválido.',
    'required' => 'O campo acima é obrigatório.',
    'required_array_keys' => 'O campo de :attribute precisa conter entradas para: :values.',
    'required_if' => 'O campo de :attribute é obrigatório quando :other for :value.',
    'required_if_accepted' => 'O campo de :attribute é obrigatório quando :other for aceito.',
    'required_unless' => 'O campo de :attribute é obrigatório se :other está presente em :values.',
    'required_with' => 'O campo de :attribute é obrigatório quando :values estiver presente.',
    'required_with_all' => 'Os campos de :attribute são obrigatórios quando :values estiverem presentes.',
    'required_without' => 'O campo de :attribute é obrigatório quando :values não estiver presente.',
    'required_without_all' => 'Os campos de :attribute são obrigatórios quando nenhum :values estiverem presentes.',
    'same' => 'O campo de :attribute precisa ser igual à :other.',
    'size' => [
        'array' => 'O campo de :attribute precisa conter :size itens.',
        'file' => 'O campo de :attribute precisa conter :size KB.',
        'numeric' => 'O campo de :attribute precisa conter :size.',
        'string' => 'O campo de :attribute precisa conter :size characters.',
    ],
    'starts_with' => 'O campo de :attribute precisa começar com um dos seguintes valores: :values.',
    'string' => 'O campo de :attribute precisa ser uma string.',
    'timezone' => 'O campo de :attribute precisa ser uma data válida.',
    'unique' => 'O campo de :attribute já foi registrado.',
    'uploaded' => 'O campo de :attribute falhou ao carregar.',
    'uppercase' => 'O campo de :attribute precisa estar em maiúsculo.',
    'url' => 'O campo de :attribute precisa ser uma URL válida',
    'ulid' => 'O campo de :attribute precisa ser uma ULID.',
    'uuid' => 'O campo de :attribute field precisa ser uma UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
