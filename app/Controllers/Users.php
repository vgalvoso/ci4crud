<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Users extends Controller{

    public function index(){
        $model = new UsersModel();
        $data['users_detail'] = $model->orderBy('id','DESC')->findAll();

        echo view("section/header");
        echo view("mainpage",$data);
        echo view("section/footer");
    }

    public function add(){
        helper(['form', 'url']);

        $model = new UsersModel();

        $image = $this->request->getFile("userpic");
        print_r($image);
        $new_name = $image->getRandomName();
        $image->move('.uploads',$new_name);
        //$image->store("./public/uploads/",$new_name);

        $data = [
            'photo' => $new_name,
            'username' => $this->request->getVar('username'),
            'firstname' => $this->request->getVar('firstname'),
            'middlename' => $this->request->getVar('middlename'),
            'lastname' => $this->request->getVar('lastname'),
            'birthday' => $this->request->getVar('birthday'),
            'contactnumber' => $this->request->getVar('contact_number')
        ];

		$model->insert($data);
		
        return redirect()->to(base_url('Users'));
    }

    public function update($id){
        helper(['form','url']);
        $model = new UsersModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'firstname' => $this->request->getVar('firstname'),
            'middlename' => $this->request->getVar('middlename'),
            'lastname' => $this->request->getVar('lastname'),
            'birthday' => $this->request->getVar('birthday'),
            'contactnumber' => $this->request->getVar('contact_number')
        ];

        $model->update($id,$data);

        return redirect()->to(base_url('users'));
    }

    public function delete($id){
        helper(['form','url']);

        $model = new UsersModel();

        $model->where('id',$id)->delete();

        return redirect()->to(base_url('Users'));
    }
}