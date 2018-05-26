<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    // public function index()
    // {
    //     $data = [];
    //     $total = $this->pegawai_model->getTotal();

    //     if ($total > 0) {
    //         $limit = 2;
    //         $start = $this->uri->segment(3, 0);

    //         $config = [
    //             'base_url' => base_url() . 'pegawai/index',
    //             'total_rows' => $total,
    //             'per_page' => $limit,
    //             'uri_segment' => 3,
    //         ];
    //         $this->pagination->initialize($config);

    //         $data = [
    //             'results' => $this->pegawai_model->list($limit, $start),
    //             'links' => $this->pagination->create_links(),
    //         ];
    //     }

    //     $this->load->view('pegawai/index', $data);
    // }

    public function index()
    {
        if($this->uri->segment(3))
        { $search = $this->uri->segment(3); }
        else
        {
            if($this->input->post('search'))
            { $search = $this->input->post('search'); }
            else
            { $search = 'null'; }
        }

        $data = [];
        $total = $this->Produk_model->getTotal($search);

        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(4, 0);

            $config = [
                'base_url' => base_url() . 'produk/index/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,

                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);

            $data = [
                'results' => $this->Produk_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
            ];
        }

        $this->load->view('produk/produk', $data);
    }

    public function create()
	{
  		$this->load->view('produk/create');
	}

	public function store()
	{
        $data=[
            'nama'=>$this->input->post('nama'),
            'harga'=>$this->input->post('harga'),
            'kode'=>$this->input->post('kode'),
        ];
	    $result = $this->Produk_model->insert($data);
	    if ($result) {
	      redirect('produk');
	    }
	  
	}

	public function show($id)
	{
	  $produk= $this->Produk_model->show($id);
	  $data = [
	    'data' => $produk
	  ];
	  $this->load->view('produk/show', $data);
	}

	public function edit($id)
 	{
    	$produk=$this->Produk_model->show($id);
    	$data=[
    		'data'=>$produk
    	];
    	$this->load->view('produk/edit',$data);
	}
	public function update($id)
    {
    	$id=$this->input->post('id');
    	$data=array('nama'=>$this->input->post('nama'));
    	$this->Produk_model->update($id,$data);
    	redirect('produk');
    }

    public function destroy($id)
    {
    	$this->Produk_model->delete($id);
    	redirect('produk');
    }

}
