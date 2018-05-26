<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
        $total = $this->Supplier_model->getTotal($search);

        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(4, 0);

            $config = [
                'base_url' => base_url() . 'supplier/index/' . $search,
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
                'results' => $this->Supplier_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
            ];
        }

        $this->load->view('supplier/supplier', $data);
    }

    public function create()
	{
  		$this->load->view('supplier/create');
	}

	public function store()
	{
        $data=[
            'nama_PT'=>$this->input->post('nama')
        ];
	    $result = $this->Supplier_model->insert($data);
	    if ($result) {
	      redirect('supplier');
	    }
	  
	}

	public function show($kode)
	{
	  $supplier= $this->Supplier_model->show($kode);
	  $data = [
	    'data' => $supplier
	  ];
	  $this->load->view('supplier/show', $data);
	}

	public function edit($kode)
 	{
    	$supplier=$this->Supplier_model->show($kode);
    	$data=[
    		'data'=>$supplier
    	];
    	$this->load->view('supplier/edit',$data);
	}
	public function update($kode)
    {
    	$id=$this->input->post('kode');
    	$data=array('nama'=>$this->input->post('nama'));
    	$this->Supplier_model->update($kode,$data);
    	redirect('supplier');
    }

    public function destroy($kode)
    {
    	$this->Produk_model->delete($kode);
    	redirect('supplier');
    }

}
