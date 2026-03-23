<?php namespace App\Controllers;
use App\Models\UserModel;

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

class UserController extends BaseController {
    // READ: Display all users
    public function index() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return $this->response->setStatusCode(201)->setJSON($data);
    }

    // CREATE: Save a new user
    public function store() {
        $model = new UserModel();
        $model->insert([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return $this->response->setStatusCode(201)->setJSON(['message' => 'User created successfully']);
    }

    public function hello() {
        $name = $this->request->getGet('name') ?? 'World';
        return $this->response->setStatusCode(200)->setJSON(['message' => "Hello, $name!"]);
    }


    // UPDATE: Update existing user data
    public function update($id) {
        $model = new UserModel();
        $model->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return $this->response->setStatusCode(201)->setJSON(['message' => 'User updated successfully']);
    }

    // DELETE: Remove a user
    public function delete($id) {
        $model = new UserModel();
        $model->delete($id);
        return $this->response->setStatusCode(201)->setJSON(['message' => 'User deleted successfully']);
    }
}
