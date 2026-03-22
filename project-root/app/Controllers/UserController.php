<?php namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController {
    // READ: Display all users
    public function index() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user_view', $data);
    }

    // CREATE: Save a new user
    public function store() {
        $model = new UserModel();
        $model->save([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->to('/users');
    }

    // UPDATE: Update existing user data
    public function update($id) {
        $model = new UserModel();
        $model->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->to('/users');
    }

    // DELETE: Remove a user
    public function delete($id) {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users');
    }
}
