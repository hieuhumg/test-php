<?php
class Pages extends CI_Controller {
    protected $conTemplate;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'url',
            'html',
            'form'
        ));

        $this->load->library(array(
           'pagination'
        ));

        $this->load->model('Lottery_model');
        $this->load->config('config_template');
        $this->conTemplate = config_item('template');
    }

    public function index()
    {
        $template = 'pages/home';
        $data['siteTitle'] = 'Dashboard';

        //
        $table = 'mtlog201712';
        $select = 'id, receiver, msgdata, keyword, operator, money, loggingTime';
        $order = array(
            'field' => 'id',
            'order' => 'DESC'
            );
        $limit = 1000;
        $start = 0;
        $result = $this->Lottery_model->getList($table, $select, $limit, $start, $order);
        $data['result'] = $result;
        //

        $this->load->view($this->conTemplate['header'], $data);
        $this->load->view($template, $data);
        $this->load->view($this->conTemplate['footer'], $data);
    }
    public function getData()
    {
        $template = 'pages/list';
        $data['siteTitle'] = 'lấy dữ liệu phân trang';
        $checkFilter = $this->input->get('filter');
        $filterBy = $this->input->get('filter_by');
        $table = 'mtlog201712';
        $total = $this->Lottery_model->countRecord($table);
        $where = array();
        if ($checkFilter == 'true') {
            switch ($filterBy) {
                case 1:
                    $since = date("Y-m-d 00:00:00",strtotime($this->input->get('since')));
                    $todate = date("Y-m-d 23:59:59",strtotime($this->input->get('todate')));
                    $operator = $this->input->get('operator');
                    $money = $this->input->get('money');
                    $id = $this->input->get('id');
                    $phone = $this->input->get('phone');
                    $where = array(
                        array(
                            'field' => 'loggingTime >=',
                            'value' => $since
                        ),
                        array(
                            'field' => 'loggingTime <=',
                            'value' => $todate
                        ),
                        array(
                            'field' => 'operator',
                            'value' => $operator
                        ),
                        array(
                            'field' => 'money',
                            'value' => $money
                        ),
                        array(
                            'field' => 'id',
                            'value' => $id
                        ),
                        array(
                            'field' => 'phone',
                            'value' => $phone
                        )
                    );
                    $total = $this->Lottery_model->countRecord($table, $where);
                    break;
            }
        }

        $select = 'id, receiver, msgdata, keyword, operator, money, loggingTime';

        $order = array(
            'field' => 'id',
            'order' => 'DESC'
        );
        $limit = 100;
        $perPage = $this->input->get('per_page');
        $config['base_url'] = site_url('pages/getData');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $total;
        $config['per_page'] = 100;
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'Đầu';
        $config['last_link'] = 'Cuối';
        $config['prev_link'] = 'Trước';
        $config['next_link'] = 'Sau';
        $config['reuse_query_string'] = TRUE;
        $config['suffix'] = '';

        $config['attributes'] = array('class' => 'page-link');
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';


        $this->pagination->initialize($config);


        if (empty($perPage)) {
            $start = 0;
        } else {
            $start = $perPage;
        }
        $result = $this->Lottery_model->getList($table, $select,$where, $limit, $start, $order);
        $data['result'] = $result;
        $data['pagination'] = $this->pagination->create_links();
        //
        //search date


        //end

        $this->load->view($this->conTemplate['header'], $data);
        $this->load->view($template, $data);
        $this->load->view($this->conTemplate['footer'], $data);
    }
}