<?php

namespace App\Controllers;

use App\Models\userModel;
//

//defined('BASEPATH') OR exit('no direct script access allowed'); 

class Auth extends BaseController
{
 public function index()
  {
   return view('login');
}


  public function process()
  {
    $model = new userModel();
    $result = $model->where('email', $this->request->getVar('email'))->first();
    //$pass =  verifyHash($result['password']); 
    //  echo ('<pre>'); 
    // print_r($result); 

    if ($result != null) {
      if ($result['password'] == $this->request->getVar('password')) {
        // echo ('<pre>');
        //  print_r($result); 

        $firstname = $result['firstname'];
        $user_id = $result['id'];


        $lastname = $result['lastname'];
        $email = $result['email'];
        $created_at = $result['created_at'];
        $image = $result['image'];
        $level = $result['level'];
        $sesdata = array(
          'firstname' => $firstname,
          'user_id' => $user_id,
          'lastname'  => $lastname,
          'email'     => $email,
          'created_at' => $created_at,
          'image'    => $image,
          'level'     => $level,
          'logged_in' => TRUE
        );

        $session = \Config\Services::session();
        $session->set($sesdata);
        // access login for admin
        if ($level === 'admin') {

          return redirect()->to(base_url('/'));

          // access login for staff
        } elseif ($level === 'pharmacy') {
          return redirect()->to(base_url('dashboard'));

          // access login for author
        } elseif ($level === 'lab') {
          return redirect()->to(base_url('dashboard'));
        }
      } else {
        $session = \Config\Services::session();
        $session->setFlashdata('password', 'the password is incorrect please try again!');
        return view('login');
      }
    } else {
      $session = \Config\Services::session();
      $session->setFlashdata('email', 'the email is incorrect please try again!');
      return view('login');
    }
  }

  public function logout()
  {

    $session = \Config\Services::session();
    $session->destroy();
    return view('login');
  }
}
