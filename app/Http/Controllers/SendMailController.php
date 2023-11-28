<?php
namespace App\Http\Controllers;
use App\Mail\OrderSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class SendMailController extends Controller
{
    //
    function sendmail(){
        Mail::to('nguyenmanhhung201102@gmail.com')->send(new OrderSuccess);
    }
}
