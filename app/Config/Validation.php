<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
    public $formBelajarLib = [
        'username' => 'required|alpha_numeric|min_length[5]|max_length[20]',
        'pendidikan' => 'required',
    ];

    public $formBelajarLib_errors = [
        'username' => [
            'required' => 'Username wajib diisi',
            'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka',
            'min_length' => 'Username minimal terdiri dari 5 karakter',
            'max_length' => 'Username maksimal terdiri dari 20 karakter'
        ],
        'pendidikan' => [
            'required' => 'Pendidikan terakhir wajib diisi',
        ]
    ];

    public $formCariDosen = [
        'keyword' => 'required'
    ];

    public $formCariDosen_errors = [
        'keyword' => [
            'required' => 'Kata kunci wajib diisi'
        ]
    ];

    public $formSimpanDosen = [
        'nip' => 'required',
        'nama'=> 'required',
        'jumlah_anak' => 'is_natural'
    ];

    public $formSimpanDosen_errors = [
        'nip' => [
            'required' => 'NIP wajib diisi'
        ],
        'nama' => [
            'required' => 'Nama wajib diisi'
        ],
        'jumlah_anak' => [
            'is_natural' => 'Jumlah anak harus diisi dengan bilangan bulat'
        ],
    ];
}
