<?php defined('BASEPATH') or exit('No direct script access allowed');
require 'libraries/c45lib/vendor/autoload.php';

class Init extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = NULL;
        if (file_exists("./assets/uploads/dataset.xlsx")) {
            $data['spreadsheet'] = $reader->load("./assets/uploads/dataset.xlsx");
        } else if (file_exists("./assets/uploads/dataset.xls")) {
            $data['spreadsheet'] = $reader->load("./assets/uploads/dataset.xls");
        }
        if ($data['spreadsheet'] != NULL) {
            $data['dataset'] = $data['spreadsheet']->getSheet(0)->toArray();
            $data['index'] = $data['dataset'][0];
            $data['dataset'] = $this->gmodel->mapping($data['dataset']);
        }
        $this->template->load('template', 'modules/init', $data);
    }
}
